<?php 

// Importar conexión de base de datos
require_once('../conexion/conexion.php');
// Importar utilidades
require_once('../helpers/validar.php');

// Verificar si hay parámetros enviados por POST
if(count($_POST) > 0){

  $vacationsPeriodIdsString = isset($_POST['vacationsPeriodIds']) ? $_POST['vacationsPeriodIds'] : ""; // IDs como string
  


  $medioDia = isset($_POST['medioDia']) ? $_POST['medioDia'] : 0;
  $medioDiaVal = Validar::validarNum($medioDia); 

  $tipoMedioDia = isset($_POST['tipoMedioDia']) ? $_POST['tipoMedioDia'] : NULL;


  // Convertir la cadena de IDs en un array (Ej: "2,5,8" → [2,5,8])
  $vacationsPeriodIds = array_filter(array_map('trim', explode(',', $vacationsPeriodIdsString)));


  $resultado = "";

  // Verificar validaciones
  if($vacationsPeriodIdsString!='' && $medioDiaVal){

    // Iniciar una transacción
    $conn->begin_transaction();
    $conn->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
    try {
      // Crear la tabla temporal dentro de la sesión   
      $conn->query("CREATE TEMPORARY TABLE TempVacationsPeriodIds (vacationsPeriodId INT NOT NULL)");

      // Insertar los IDs en la tabla temporal
      $stmt = $conn->prepare("INSERT INTO TempVacationsPeriodIds (vacationsPeriodId) VALUES (?)");

      foreach ($vacationsPeriodIds as $id) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
      }
      $stmt->close();

      // Ejecutar el procedimiento almacenado
      $sqlSP = "CALL update_vacations_period_multiple(?, ?)";
      $stmtSP = $conn->prepare($sqlSP);
      $stmtSP->bind_param("ii", $medioDia, $tipoMedioDia);
      $stmtSP->execute();
      while ($conn->more_results()) {
        $conn->next_result();
      }
      // Comprobar si el procedimiento arrojó un error
      if ($stmtSP->errno) {
        throw new Exception("Error al ejecutar el procedimiento almacenado: " . $stmtSP->error);
      }

      $stmtSP->close();

      // Confirmar la transacción
      $conn->commit();
      flush();
      $resultado = ["ok" => true, "message" => "Info actualizada"];

    } catch (Exception $e) {
      // Si hay error, revertir cambios
      $conn->rollback();
      // Revisar si el error es debido al conflicto con las fechas
      $resultado = ["ok" => false, "message" => "Error al agregar a la base de datos: " . $e->getMessage()];
      
    }
    //$resultado = ["ok" => true, "message" => "Info actualizada"];

  } else {
    $resultado = ["ok" => false, "message" => "Error en la validación de información", "mediodia"=>$medioDiaVal];
  }

} else {
  $resultado = ["ok" => false, "message" => "Sin parámetros"];
}

// Enviar resultado en formato JSON
echo json_encode($resultado);
?>
