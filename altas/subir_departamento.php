<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $areaId = isset($_POST['areaId']) ? $_POST['areaId'] : "";
  $areaIdVal = Validar::validarNum($areaId);

  $sectionName = isset($_POST['sectionName']) ? $_POST['sectionName'] : "";  
  $sectionNameVal = Validar::validarLongitud($sectionName,3,100);

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($areaIdVal && $sectionNameVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    $sqlSP="CALL insert_section($areaId, '$sectionName', @LID)";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){

      //cargar el query haciendo un select con el parametro de salida del sp insert
      $last_idq = $conn->query("SELECT @LID as id");
      //se saca el objeto del last id
      $last_id = $last_idq->fetch_object();
      //se guarda el id sacandolo del objeto
      $sectionId=$last_id->id;
      
      
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el departamento
      $resultado = ["ok"=>true,"message"=>"Departamento agregado exitosamente", "Id"=>$sectionId];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id area"=>$areaIdVal, "Nombre de departamento"=>$sectionNameVal];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);