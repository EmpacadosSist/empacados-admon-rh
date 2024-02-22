<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  $positionIdVal = Validar::validarNum($positionId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $indicatorId = isset($_POST['indicatorId']) ? $_POST['indicatorId'] : "";
  $indicatorIdVal = Validar::validarNum($indicatorId);

  $paymentPer = isset($_POST['paymentPer']) ? $_POST['paymentPer'] : "";
  $paymentPerVal = Validar::validarLongitud($paymentPer,1,100);   

    if($indicatorIdVal && $positionIdVal && $paymentPerVal){
      $sqlSP="CALL insert_position_indicator($positionId, $indicatorId, '$paymentPer')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Porcentaje de indicador enlazado exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id de indicador"=>$indicatorIdVal, "Id de puesto"=>$positionIdVal, "Porcentaje"=>$paymentPerVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);