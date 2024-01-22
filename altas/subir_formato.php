<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $valueTypeName = isset($_POST['valueTypeName']) ? $_POST['valueTypeName'] : "";
  $valueTypeNameVal = Validar::validarLongitud($valueTypeName,3,60);

  if($valueTypeNameVal){
      $sqlSP="CALL insert_user_authorization($userId, $authorizationId)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Autorización enlazada agregada exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);