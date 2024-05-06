<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $areaId = isset($_POST['areaId']) ? $_POST['areaId'] : "";

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $areaName = isset($_POST['areaName']) ? $_POST['areaName'] : "";
  $areaNameVal = Validar::validarLongitud($areaName,1,100);


    if($areaNameVal){
      $sqlSP="CALL update_area($areaId, '$areaName')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Area actualizada exitosamente","Id"=>$areaId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre area"=>$areaNameVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);