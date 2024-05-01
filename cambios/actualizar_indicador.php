<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  $indicatorId = isset($_POST['indicatorId']) ? $_POST['indicatorId'] : "";
  
  $indicatorName = isset($_POST['indicatorName']) ? $_POST['indicatorName'] : "";  
  $indicatorNameVal = Validar::validarLongitud($indicatorName,3,100);

  $comments = isset($_POST['comments']) ? $_POST['comments'] : "";  
  $commentsVal = Validar::validarLongitudMax($comments, 255);  

    if($indicatorNameVal && $commentsVal){
      $sqlSP="CALL update_indicator($indicatorId, '$indicatorName', '$comments')";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Indicador actualizado exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Porcentaje minimo"=>"", "Porcentaje maximo"=>"", "Porcentaje bono"=>""];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);