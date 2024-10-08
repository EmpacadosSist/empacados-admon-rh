<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');
require_once('../helpers/consultas.php');

if(count($_POST)>0){

  $userAuthorizationId = isset($_POST['userAuthorizationId']) ? $_POST['userAuthorizationId'] : "";
  $userAuthorizationIdVal = Validar::validarNum($userAuthorizationId);

  $authorizationId = isset($_POST['authorizationId']) ? $_POST['authorizationId'] : "";
  $authorizationIdVal = Validar::validarNum($authorizationId);  
  
  $month = isset($_POST['month']) ? $_POST['month'] : "";
  $monthVal = Validar::validarNum($month);
  
  $year = isset($_POST['year']) ? $_POST['year'] : "";
  $yearVal = Validar::validarNum($year);  

  if($userAuthorizationIdVal && $monthVal && $yearVal && $authorizationIdVal){

    $validado=Consultas::isValidated($conn, $month, $year, $authorizationId);
    //$resp="Si";
    if($validado[0]['cantValidados']==0 && $authorizationId=='11'){ 
      //$resp="No";
      $sqlSP="CALL insert_validation('$month', '$year', $userAuthorizationId)";
      $resultSP=$conn->query($sqlSP);
      
      if($resultSP){
        
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Pagos validados exitosamente"];
      
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
      
      }      
    }else if($validado[0]['cantValidados']>0 && $authorizationId=='10'){ 
      //$resp="No";
      $sqlSP="CALL insert_validation('$month', '$year', $userAuthorizationId)";
      $resultSP=$conn->query($sqlSP);
      
      if($resultSP){
        
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Pagos validados exitosamente"];
      
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
      
      }      
    }else{
      //se guarda en una variable el resultado de tener ya la autorizacion       
      $resultado = ["ok"=>false,"message"=>"No se realizó validación/autorización","validacion hecha"=>$authorizationId,"cant validados"=>$validado[0]['cantValidados']];      
    }
  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "EnlaceId"=>$userAuthorizationIdVal, "Month"=>$monthVal, "Year"=>$yearVal];
  }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);