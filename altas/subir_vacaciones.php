<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');
require_once('../helpers/notificar_solicitud_vacaciones.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  $empNumVal = Validar::validarNum($empNum);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $nameVal = Validar::validarLongitud($name,3,50);
  
  $lastName1 = isset($_POST['lastName1']) ? $_POST['lastName1'] : "";
  $lastName1Val = Validar::validarLongitud($lastName1,3,50);
  
  $lastName2 = isset($_POST['lastName2']) ? $_POST['lastName2'] : "";
  $lastName2Val = Validar::validarLongitud($lastName2,3,50); 

  $positionName = isset($_POST['positionName']) ? $_POST['positionName'] : "";  
  $positionNameVal = Validar::validarLongitud($positionName,3,100);

  $sectionName = isset($_POST['sectionName']) ? $_POST['sectionName'] : "";  
  $sectionNameVal = Validar::validarLongitud($sectionName,3,100);

  $requestedDays = isset($_POST['requestedDays']) ? $_POST['requestedDays'] : "";  
  $requestedDaysVal = Validar::validarLongitud($requestedDays,3,100);

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($empNumVal && $nameVal && $lastName1Val && $lastName2Val && $positionNameVal && $sectionNameVal && $requestedDaysVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    //$sqlSP="CALL insert_position($sectionId, '$positionName', $levelId, @LID)";

		//$resultSP=$conn->query($sqlSP);
    /*
    */
    //condicion para verificar si se hizo la insercion en la bd
    //$resultSP
    if(true){

      //cargar el query haciendo un select con el parametro de salida del sp insert
      ////$last_idq = $conn->query("SELECT @LID as id");
      //se saca el objeto del last id
      ////$last_id = $last_idq->fetch_object();
      //se guarda el id sacandolo del objeto
      ////$positionId=$last_id->id;

      $datos = ["numEmpleado"=>$empNum,"nombre"=>$name." ".$lastName1." ".$lastName2,"puesto"=>$positionName,"departamento"=>$sectionName,"dias"=>$requestedDays];

      //variable que almacena el resultado de haber enviado por correo la contraseña
      $isSent=notificarSolicitud($datos);      
      
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Enviado"];

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