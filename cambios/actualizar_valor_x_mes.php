<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $indicatorId = isset($_POST['indicatorId']) ? $_POST['indicatorId'] : "";
  $indicatorIdVal = Validar::validarNum($indicatorId);
  
  $realValue = isset($_POST['realValue']) ? $_POST['realValue'] : "";  
  $realValueVal = Validar::validarLongitud($realValue,1,100);
  
  $targetValue = isset($_POST['targetValue']) ? $_POST['targetValue'] : "";  
  $targetValueVal = Validar::validarLongitud($targetValue,1,100);

  $valueTypeId = isset($_POST['valueTypeId']) ? $_POST['valueTypeId'] : "";
  $valueTypeIdVal = Validar::validarNum($valueTypeId);

  $month = isset($_POST['month']) ? $_POST['month'] : "";
  $monthVal = Validar::validarNum($month);
  
  $year = isset($_POST['year']) ? $_POST['year'] : "";
  $yearVal = Validar::validarNum($year);  


  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($indicatorIdVal && $realValueVal && $targetValueVal && $valueTypeIdVal && $monthVal && $yearVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    $sqlSP="CALL update_value_per_month($indicatorId, '$realValue', '$targetValue', $valueTypeId, $month, $year)";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){
          
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Indicador por mes actualizado exitosamente", "indId"=>$indicatorId];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id Indicador"=>$indicatorIdVal, "Id formato"=>$valueTypeIdVal, "Valor real"=>$realValueVal, "Valor objetivo"=>$targetValueVal, "Mes"=>$monthVal, "Año"=>$yearVal];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);