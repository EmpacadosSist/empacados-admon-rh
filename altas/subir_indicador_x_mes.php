<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $indicatorName = isset($_POST['indicatorName']) ? $_POST['indicatorName'] : "";  
  $indicatorNameVal = Validar::validarLongitud($indicatorName,3,100);

  $comments = isset($_POST['comments']) ? $_POST['comments'] : "";  
  $commentsVal = Validar::validarLongitudMax($comments, 255);  

  $valueTypeId = isset($_POST['valueTypeId']) ? $_POST['valueTypeId'] : "";
  $valueTypeIdVal = Validar::validarNum($valueTypeId);

  $realValue = isset($_POST['realValue']) ? $_POST['realValue'] : "";  
  $realValueVal = Validar::validarLongitud($realValue,1,100);
  
  $targetValue = isset($_POST['targetValue']) ? $_POST['targetValue'] : "";  
  $targetValueVal = Validar::validarLongitud($targetValue,1,100);  

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($indicatorNameVal && $commentsVal && $valueTypeIdVal && $realValueVal && $targetValueVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    $sqlSP="CALL insert_indicator_per_month('$indicatorName', '$comments', $valueTypeId, '$realValue', '$targetValue', @ind_last_id, @vpm_last_id)";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){

      $last_idq_ind = $conn->query("SELECT @ind_last_id as id");      
      $last_id_ind = $last_idq_ind->fetch_object();
      $indId=$last_id_ind->id;

      $last_idq_vpm = $conn->query("SELECT @vpm_last_id as id");
      $last_id_vpm = $last_idq_vpm->fetch_object();
      $vpmId=$last_id_vpm->id;      
            
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Indicador por mes agregado exitosamente", "indId"=>$indId, "vpmId"=>$vpmId];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Nombre Indicador"=>$indicatorNameVal, "Comentarios"=>$commentsVal, "Id formato"=>$valueTypeIdVal, "Valor real"=>$realValueVal, "Valor objetivo"=>$targetValueVal];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);