<?php 
require_once('../conexion/conexion.php');
require_once('../helpers/generar_pass.php');
require_once('../helpers/validar.php');

if(count($_POST)>0){
  //aqui se codifica
  //echo json_encode($_POST);
  //echo generarPassword(8);

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
    $resultado = ["ok"=>"true"];

  }else{
    $resultado = ["ok"=>"false", "fullName"=>$fullName, "fullName"=>$email, "fullName"=>$levelId, "fullName"=>$empNum, "fullName"=>$positionId, "fullName"=>$paymentVar, "fullName"=>$recDate];
  }


  echo json_encode($resultado);


  
}