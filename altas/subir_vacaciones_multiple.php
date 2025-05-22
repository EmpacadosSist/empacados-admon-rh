<?php 
// Importar conexión de base de datos
require_once('../conexion/conexion.php');
// Importar utilidades
require_once('../helpers/validar.php');

// Verificar si hay parámetros enviados por POST
if(count($_POST) > 0){

  $userIdsString = isset($_POST['userIds']) ? $_POST['userIds'] : ""; // IDs como string

  $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : "";
  $fechaInicioVal = Validar::validarFecha($fechaInicio);
  
  $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : "";
  $fechaFinVal = Validar::validarFecha($fechaFin); 

  $tipoHorario = isset($_POST['tipoHorario']) ? $_POST['tipoHorario'] : "";
  $tipoHorarioVal = Validar::validarLongitud($tipoHorario,1,1);  

  $medioDia = isset($_POST['medioDia']) ? $_POST['medioDia'] : 0;
  $medioDiaVal = Validar::validarNum($medioDia); 

  $tipoMedioDia = isset($_POST['tipoMedioDia']) ? $_POST['tipoMedioDia'] : NULL;

  $vacationsType = isset($_POST['vacationsType']) ? $_POST['vacationsType'] : "";
  $vacationsTypeVal = Validar::validarLongitud($vacationsType,1,1); 

  //si se hace una solicitud nueva, el status es P de pendiente de aprobar o rechazar

  $vacationsStatus = isset($_POST['vacationsStatus']) ? $_POST['vacationsStatus'] : "";
  $vacationsStatusVal = Validar::validarLongitud($vacationsStatus,1,1);   


  // Convertir la cadena de IDs en un array (Ej: "2,5,8" → [2,5,8])
  $userIds = array_filter(array_map('trim', explode(',', $userIdsString)));


  $resultado = "";

  // Verificar validaciones
  if($userIdsString!='' && $fechaInicioVal && $fechaFinVal && $tipoHorarioVal && $medioDiaVal && $vacationsTypeVal && $vacationsStatusVal){

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // Iniciar una transacción
    $conn->begin_transaction();
    try {
      // Crear la tabla temporal dentro de la sesión   
      $conn->query("CREATE TEMPORARY TABLE TempUserIds (userId INT NOT NULL)");

      // Insertar los IDs en la tabla temporal
      $stmt = $conn->prepare("INSERT INTO TempUserIds (userId) VALUES (?)");

      foreach ($userIds as $id) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
      }
      $stmt->close();

      // Ejecutar el procedimiento almacenado
      $sqlSP = "CALL insert_vacations_period_multiple(?, ?, ?, ?, ?, ?, ?)";
      $stmtSP = $conn->prepare($sqlSP);
      $stmtSP->bind_param("sssiiss", $vacationsType, $vacationsStatus, $tipoHorario, $medioDia, $tipoMedioDia, $fechaInicio, $fechaFin);
      $stmtSP->execute();

      // Comprobar si el procedimiento arrojó un error
      if ($stmtSP->errno) {
        throw new Exception("Error al ejecutar el procedimiento almacenado: " . $stmtSP->error);
      }

      $stmtSP->close();

      // Confirmar la transacción
      $conn->commit();

      $resultado = ["ok" => true, "message" => "Info subida a base de datos"];

    } catch (Exception $e) {
      // Si hay error, revertir cambios
      $conn->rollback();
      // Revisar si el error es debido al conflicto con las fechas
      if (strpos($e->getMessage(), 'Conflicto de fechas') !== false) {
        $resultado = ["ok" => false, "message" => "Error: Conflicto de fechas, la inserción no se realizará."];
      } else {
        $resultado = ["ok" => false, "message" => "Error al agregar a la base de datos: " . $e->getMessage()];
      }
    }

  } else {
    $resultado = ["ok" => false, "message" => "Error en la validación de información", "finicio"=>$fechaInicioVal, "ffin"=>$fechaFinVal, "tipohorario"=>$tipoHorarioVal, "mediodia"=>$medioDiaVal, "vacationstype"=>$vacationsTypeVal, "fvacationsstatus"=>$vacationsStatusVal];
  }

} else {
  $resultado = ["ok" => false, "message" => "Sin parámetros"];
}

// Enviar resultado en formato JSON
echo json_encode($resultado);
?>
