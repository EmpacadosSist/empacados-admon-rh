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
  //$levelIdVal

  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  //$empNumVal

  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  //$positionIdVal

  $paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";
  //$paymentVarVal

  $recDate = isset($_POST['recDate']) ? $_POST['recDate'] : "";
  //$recDateVal

  echo $emailVal;




  
}