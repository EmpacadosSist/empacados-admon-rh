<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $sectionId = isset($_POST['sectionId']) ? $_POST['sectionId'] : "";

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $sectionName = isset($_POST['sectionName']) ? $_POST['sectionName'] : "";
  $sectionNameVal = Validar::validarLongitud($sectionName,1,100);


    if($sectionNameVal){
      $sqlSP="CALL update_section($sectionId, '$sectionName')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Departamento actualizada exitosamente","Id"=>$sectionId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre area"=>$sectionNameVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);