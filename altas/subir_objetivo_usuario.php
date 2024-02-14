<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){
  
  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
  $userIdVal = Validar::validarNum($userId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $activityId = isset($_POST['activityId']) ? $_POST['activityId'] : "";
  $activityIdVal = Validar::validarNum($activityId);

  $lowVal = isset($_POST['lowVal']) ? $_POST['lowVal'] : "";  
  $lowValVal = Validar::validarLongitud($lowVal,3,100);
  
  $medVal = isset($_POST['medVal']) ? $_POST['medVal'] : "";  
  $medValVal = Validar::validarLongitud($medVal,3,100);  

    if($userIdVal && $activityIdVal && $lowValVal && $medValVal){
      $sqlSP="CALL insert_user_activity($userId, $activityId, '$lowVal', '$medVal', @user_activity_last_id)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el objetivo con usuario
        $resultado = ["ok"=>true,"message"=>"Autorización enlazada agregada exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Usuario Id"=>$userIdVal, "Objetivo"=>$activityIdVal, "Valor inferior"=>$lowValVal, "Valor medio"=>$medValVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);