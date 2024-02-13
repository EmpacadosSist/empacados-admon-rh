<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $valueTypeName = isset($_POST['valueTypeName']) ? $_POST['valueTypeName'] : "";
  $valueTypeNameVal = Validar::validarLongitud($valueTypeName,3,60);

  if($valueTypeNameVal){
    $sqlSP="CALL insert_value_type('$valueTypeName', @LID)";
    $resultSP=$conn->query($sqlSP);

    if($resultSP){
      //cargar el query haciendo un select con el parametro de salida del sp insert
      $last_idq = $conn->query("SELECT @LID as id");
      //se saca el objeto del last id
      $last_id = $last_idq->fetch_object();
      //se guarda el id sacandolo del objeto
      $valueTypeId=$last_id->id;

      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el formato
      $resultado = ["ok"=>true,"message"=>"Formato agregado exitosamente","Id"=>$valueTypeId];
    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
    }      
  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre de Formato"=>$valueTypeNameVal];
  }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);