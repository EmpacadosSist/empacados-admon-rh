<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";

  $activityName = isset($_POST['activityName']) ? $_POST['activityName'] : "";  
  $activityNameVal = Validar::validarLongitud($activityName,3,100);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  //posicion se refiere al puesto del empleado que crea la actividad
  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  $positionIdVal = Validar::validarNum($positionId);

  $defaultPer = isset($_POST['defaultPer']) ? $_POST['defaultPer'] : "";
  $defaultPerVal = Validar::validarLongitud($defaultPer,3,100);     

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($activityNameVal && $positionIdVal && $defaultPerVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    $sqlSP="CALL insert_activity('$activityName', $positionId, '$defaultPer')";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){
      $message="";
      if($userId==""){
        //cargar el query haciendo un select con el parametro de salida del sp insert
        $last_idq = $conn->query("SELECT @LID as id");
        //se saca el objeto del last id
        $last_id = $last_idq->fetch_object();
        //se guarda el id sacandolo del objeto
        $userId=$last_id->id;
        //variable que almacena el resultado de haber enviado por correo la contraseña
        //$isSent=enviarPassword($password, $empNum, $email);
        $isSent="Prueba sin envio";
        $message="Usuario agregado exitosamente";
      }else{
        $isSent="No aplica";
        $message="Usuario actualizado exitosamente";        
      }


      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>$message, "userId"=>$userId, "emailSent"=>$isSent];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "activityName"=>$activityNameVal, "positionId"=>$positionIdVal, "defaultPer"=>$defaultPerVal];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);