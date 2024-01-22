<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){
    //se valida campo que no venga vacio y que cumpla la validacion de longitud
    $authorizationName = isset($_POST['authorizationName']) ? $_POST['authorizationName'] : "";
    $authorizationNameVal = Validar::validarLongitud($authorizationName,3,60);

    if($authorizationNameVal){
      $sqlSP="CALL insert_authorization('$authorizationName')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
          
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Autorización agregada exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);