<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $sectionId = isset($_POST['sectionId']) ? $_POST['sectionId'] : "";
  $sectionIdVal = Validar::validarNum($sectionId);

    if($sectionIdVal){
      $sqlSP="CALL delete_section($sectionId)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Departamento eliminado exitosamente","Id"=>$sectionId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        
        $resultado = ["ok"=>false,"message"=>"Error en la base de datos. Contacte al administrador."];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id de departamento"=>$sectionIdVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);