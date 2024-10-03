<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

  if(count($_POST)>0){

    $userId = isset($_POST['idempl']) ? $_POST['idempl'] : "";
    $userIdVal = Validar::validarNum($userId);

    $leaveDate = isset($_POST['leaveDate']) ? $_POST['leaveDate'] : "";
    $leaveDateVal = Validar::validarFecha($leaveDate);  

    $reason = isset($_POST['reason']) ? $_POST['reason'] : "";
    $reasonVal = Validar::validarLongitudMax($reason,100);

    $noRehirableReason = isset($_POST['noRehirableReason']) ? $_POST['noRehirableReason'] : "";

    $comments = isset($_POST['comments']) ? $_POST['comments'] : "";

    $commentsVal = Validar::validarLongitudMax($comments,144);  

    $rehirable = isset($_POST['rehirable']) ? $_POST['rehirable'] : "";
    // $rehirableVal = Validar::validarBool($rehirable);    

  
    if($rehirable=="si"){
      $rehirable = 1;
      $noRehirableReasonVal = true;
      $noRehirableReason="";
    }else{
      $noRehirableReasonVal = true;
      $rehirable = 0;
    }


    if($userIdVal && $leaveDateVal && $reasonVal && $noRehirableReasonVal && $commentsVal){
      $sqlSP="CALL disable_user($userId, '$leaveDate', '$reason', $rehirable, '$noRehirableReason', '$comments')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el formato
      $resultado = ["ok"=>true,"message"=>"Usuario deshabilitado exitosamente"];
      }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
      }      
    }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Usuario Id"=>$userIdVal, "Fecha de baja"=>$leaveDateVal, "Motivo"=>$reasonVal, "Recontratable o no"=>$rehirableVal, "Razon de no recontratacion"=>$noRehirableReasonVal, "Comentarios"=>$commentsVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);