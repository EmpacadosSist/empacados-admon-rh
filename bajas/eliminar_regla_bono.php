<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $bonusId = isset($_POST['bonusId']) ? $_POST['bonusId'] : "";
  $bonusIdVal = Validar::validarNum($bonusId);

    if($bonusIdVal){
      $sqlSP="CALL delete_bonus_rule($bonusId)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Regla de bono eliminada exitosamente","Id"=>$bonusId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        
        $resultado = ["ok"=>false,"message"=>"Error en la base de datos. Contacte al administrador."];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id de bonus rule"=>$bonusIdVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);