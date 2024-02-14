<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){
  
  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $indicatorId = isset($_POST['indicatorId']) ? $_POST['indicatorId'] : "";
  $indicatorIdVal = Validar::validarNum($indicatorId);

  $realValue = isset($_POST['realValue']) ? $_POST['realValue'] : "";  
  $realValueVal = Validar::validarLongitud($realValue,3,100);
  
  $targetValue = isset($_POST['targetValue']) ? $_POST['targetValue'] : "";  
  $targetValueVal = Validar::validarLongitud($targetValue,3,100);
  
  $valueTypeId = isset($_POST['valueTypeId']) ? $_POST['valueTypeId'] : "";
  $valueTypeIdVal = Validar::validarNum($valueTypeId);

    if($indicatorIdVal && $realValueVal && $targetValueVal && $valueTypeIdVal){
      $sqlSP="CALL insert_value_per_month($indicatorId, '$realValue', '$targetValue', $valueTypeId)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el objetivo con usuario
        $resultado = ["ok"=>true,"message"=>"Valor de indicador por mes agregado exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Indicador Id"=>$indicatorIdVal, "Valor real"=>$realValueVal, "Valor objetivo"=>$targetValueVal, "Formato"=>$valueTypeIdVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);