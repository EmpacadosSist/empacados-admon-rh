<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $jefePuesto = isset($_POST['jefedirecto']) ? $_POST['jefedirecto'] : "";

  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $positionName = isset($_POST['positionName']) ? $_POST['positionName'] : "";
  $positionNameVal = Validar::validarLongitud($positionName,1,100);

  $levelId = isset($_POST['levelId']) ? $_POST['levelId'] : "";
  $levelIdVal = Validar::validarNum($levelId);

    if($positionNameVal && $levelIdVal){
      $sqlSP="CALL update_position($positionId, '$positionName', $levelId, $jefePuesto)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Puesto actualizado exitosamente","Id"=>$positionId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre area"=>$positionNameVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);