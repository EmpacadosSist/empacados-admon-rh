<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/generar_pass.php');
require_once('../helpers/validar.php');
require_once('../helpers/enviar_pass.php');


if(count($_POST)>0){
  //aqui se codifica
  //echo json_encode($_POST);
  $password = generarPassword(8);

  $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : "";
  $fullNameVal = Validar::validarLongitud($fullName,3,60);
    
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $emailVal = Validar::validarEmail($email);

  $levelId = isset($_POST['levelId']) ? $_POST['levelId'] : "";
  $levelIdVal = Validar::validarNum($levelId);

  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  $empNumVal = Validar::validarNum($empNum);

  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  $positionIdVal = Validar::validarNum($positionId);

  $paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";
  $paymentVarVal = Validar::validarNum($paymentVar);

  $recDate = isset($_POST['recDate']) ? $_POST['recDate'] : "";
  $recDateVal = Validar::validarFecha($recDate);

  $resultado="";

  if($fullNameVal && $emailVal && $levelIdVal && $empNumVal && $positionIdVal && $paymentVarVal && $recDateVal){    
    $sql="CALL insert_user('$fullName', '$email', '$password', $levelId, '$empNum', $positionId, $paymentVar, '$recDate')";
		$insert=$conn->query($sql);
    
    if($insert){
      $isSent=enviarPassword($password, $empNum, $email);
      $resultado = ["ok"=>true,"message"=>"Usuario agregado exitosamente", "emailSent"=>$isSent];

    }else{
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "fullName"=>$fullNameVal, "email"=>$emailVal, "levelId"=>$levelIdVal, "empNum"=>$empNumVal, "positionId"=>$positionIdVal, "paymentVar"=>$paymentVarVal, "recDate"=>$recDateVal];
  }

  echo json_encode($resultado);
}