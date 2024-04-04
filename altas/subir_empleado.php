<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){
    //se valida campo que no venga vacio y que cumpla la validacion de longitud
    $authorizationName = isset($_POST['prueba']) ? $_POST['prueba'] : "";
    $authorizationNameVal = Validar::validarLongitud($authorizationName,3,100);
/*
if($authorizationNameVal){
  $sqlSP="CALL insert_authorization('$authorizationName', @LID)";
  $resultSP=$conn->query($sqlSP);
  
  if($resultSP){
    
    //cargar el query haciendo un select con el parametro de salida del sp insert
    $last_idq = $conn->query("SELECT @LID as id");
    //se saca el objeto del last id
    $last_id = $last_idq->fetch_object();
    //se guarda el id sacandolo del objeto
    $authorizationId=$last_id->id;
    
    //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
    $resultado = ["ok"=>true,"message"=>"Autorización agregada exitosamente", "Id"=>$authorizationId];
    
  }else{
    //se guarda en una variable el resultado de haber un error al agregar a la bd      
    $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
    
  }      
}else{
  //se guarda en una variable el resultado de error de validacion de los campos
  $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre de Autorizacion"=>$authorizationNameVal];
}
*/
  $resultado = ["ok"=>true,"message"=>"funciona", "prueba"=>$authorizationName];
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);