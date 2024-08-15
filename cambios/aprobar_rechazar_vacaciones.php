<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');
require_once('../helpers/notificar_respuesta_vacaciones.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $vacationsPeriodId = isset($_POST['vacationsPeriodId']) ? $_POST['vacationsPeriodId'] : "";
  $vacationsPeriodIdVal = Validar::validarNum($vacationsPeriodId);  

  $estatusLetra = isset($_POST['estatusLetra']) ? $_POST['estatusLetra'] : "";
  $estatusLetraVal = Validar::validarLongitud($estatusLetra,1,1); 

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  $empNumVal = Validar::validarNum($empNum);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
  $nombreVal = Validar::validarLongitud($nombre,3,250);

  $requestedDays = isset($_POST['requestedDays']) ? $_POST['requestedDays'] : "";  
  $requestedDaysVal = Validar::validarLongitud($requestedDays,3,100);

  $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
  $correoVal = Validar::validarEmail($correo);  

  $reason = isset($_POST['reason']) ? $_POST['reason'] : "";  
  $reasonVal = Validar::validarLongitudMax($reason, 144);    

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($vacationsPeriodIdVal && $estatusLetraVal && $empNumVal && $nombreVal && $requestedDaysVal && $correoVal && $reasonVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado

    if($reason!=""){
      $reasonMail=$reason;
      $reason="'$reason'";
    }else{
      $reason="null";
      $reasonMail=$reason;
    }
    
    $sqlSP="CALL update_vacations_period_status($vacationsPeriodId, $reason, '$estatusLetra')";

		$resultSP=$conn->query($sqlSP);
    /*
    */
    //condicion para verificar si se hizo la insercion en la bd
    //$resultSP
    if($resultSP){

      //cargar el query haciendo un select con el parametro de salida del sp insert
      ////$last_idq = $conn->query("SELECT @LID as id");
      //se saca el objeto del last id
      ////$last_id = $last_idq->fetch_object();
      //se guarda el id sacandolo del objeto
      ////$positionId=$last_id->id;

      $datos = ["numEmpleado"=>$empNum,"nombre"=>$nombre,"correo"=>$correo,"dias"=>$requestedDays, "estatus"=>$estatusLetra, "motivo"=>$reasonMail];

      //variable que almacena el resultado de haber enviado por correo la contraseña
      //$isSent=notificarRespuesta($datos);      
      
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Enviado","datos"=>$datos,"querySP"=>$sqlSP];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id departamento"=>$sectionIdVal, "Nombre de puesto"=>$positionNameVal, "Nivel"=>$levelIdVal];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);