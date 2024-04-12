<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $authorizationId = isset($_POST['authorizationId']) ? $_POST['authorizationId'] : "";
  $authorizationIdVal = Validar::validarNum($authorizationId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
  $userIdVal = Validar::validarNum($userId);

  //variable que nos indica si se va a agregar o borrar un permiso
  $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";  

    if($authorizationIdVal && $userIdVal && $tipo!=""){
      if($tipo=="1"){
        $sqlSP="CALL insert_user_authorization($userId, $authorizationId)";
      }else{
        $sqlSP="CALL delete_user_authorization($userId, $authorizationId)";        
      }
      
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Autorización enlazada agregada exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Autorizacion"=>$authorizationIdVal, "Usuario"=>$userIdVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);