<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');
require_once('../helpers/notificar_solicitud_vacaciones.php');

if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $vacationsPeriodId = isset($_POST['vacationsPeriodId']) ? $_POST['vacationsPeriodId'] : "";
  $vacationsPeriodIdVal = Validar::validarNum($vacationsPeriodId);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud  
  $estatusLetra = isset($_POST['estatusLetra']) ? $_POST['estatusLetra'] : "";
  $estatusLetraVal = Validar::validarLongitud($estatusLetra,1,1); 

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  //a correo
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

  $numDias = isset($_POST['numDias']) ? $_POST['numDias'] : "";  
  $numDiasVal = Validar::validarNum($numDias);

  //se valida campo que no venga vacio y que cumpla la validacion de email  
  $correoJefe = isset($_POST['correoJefe']) ? $_POST['correoJefe'] : "";
  $correoJefeVal = Validar::validarEmail($correoJefe);

    if($vacationsPeriodIdVal && $estatusLetraVal && $empNumVal && $nameVal && $lastName1Val && $lastName2Val && $positionNameVal && $sectionNameVal && $requestedDaysVal && $numDiasVal && $correoJefeVal){
      $sqlSP="CALL update_vacations_period_cancel($vacationsPeriodId)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //si la solicitud de vacaciones ya estaba aprobada, 
        if($estatusLetra=="A"){
          $datos = ["numEmpleado"=>$empNum,"nombre"=>$name." ".$lastName1." ".$lastName2,"puesto"=>$positionName,"departamento"=>$sectionName, "correoJefe"=>$correoJefe, "requestedDays"=>$requestedDays, "numDias"=>$numDias, "cancelacion"=>true];

          //variable que almacena el resultado de haber enviado por correo la contraseña
          $isSent=notificarSolicitud($datos);  
        }

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Cancelacion solicitada","Id"=>$vacationsPeriodId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información"];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);