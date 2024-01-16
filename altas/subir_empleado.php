<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/generar_pass.php');
require_once('../helpers/validar.php');
require_once('../helpers/enviar_pass.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  //se genera una contraseña automaticamente con 8 caracteres
  $password = generarPassword(8);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : "";
  $fullNameVal = Validar::validarLongitud($fullName,3,60);
    
  //se valida campo que no venga vacio y que cumpla la validacion de email  
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $emailVal = Validar::validarEmail($email);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $levelId = isset($_POST['levelId']) ? $_POST['levelId'] : "";
  $levelIdVal = Validar::validarNum($levelId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  $empNumVal = Validar::validarNum($empNum);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  $positionIdVal = Validar::validarNum($positionId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";
  $paymentVarVal = Validar::validarNum($paymentVar);

  //se valida campo que no venga vacio y que cumpla la validacion de fecha  
  $recDate = isset($_POST['recDate']) ? $_POST['recDate'] : "";
  $recDateVal = Validar::validarFecha($recDate);

  $resultado="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($fullNameVal && $emailVal && $levelIdVal && $empNumVal && $positionIdVal && $paymentVarVal && $recDateVal){    
    //se hace un insert a la bd por medio de un stored procedure, pasando campos como parametros
    $sql="CALL insert_user('$fullName', '$email', '$password', $levelId, '$empNum', $positionId, $paymentVar, '$recDate')";
		$insert=$conn->query($sql);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($insert){
      //variable que almacena el resultado de haber enviado por correo la contraseña
      $isSent=enviarPassword($password, $empNum, $email);

      //se guarda en una variable el resultado de haber agregado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Usuario agregado exitosamente", "emailSent"=>$isSent];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "fullName"=>$fullNameVal, "email"=>$emailVal, "levelId"=>$levelIdVal, "empNum"=>$empNumVal, "positionId"=>$positionIdVal, "paymentVar"=>$paymentVarVal, "recDate"=>$recDateVal];
  }

  //se envia la variable del resultado
  echo json_encode($resultado);
}