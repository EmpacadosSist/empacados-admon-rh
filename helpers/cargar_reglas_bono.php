<?php
  require_once('../conexion/conexion.php');
  if(count($_GET)>0){
    $indicatorId = isset($_GET['indicatorId']) ? $_GET['indicatorId'] : "";    
  
    if($indicatorId!=""){
      $sqlSP="CALL select_all_bonusrules_by_indicator($indicatorId)";
      $resultSP=$conn->query($sqlSP);
      
      $resultado_consulta=[];
      
      if($resultSP){

        while($row = $resultSP->fetch_assoc()){
          array_push($resultado_consulta, $row);
        }

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el formato
        $resultado = ["ok"=>true,"message"=>"consulta correcta","reglas"=>$resultado_consulta];
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"error en consulta","reglas"=>$resultado_consulta];
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"parametros vacios","reglas"=>$resultado_consulta];
    }
  }else{
    $resultado = ["ok"=>false,"message"=>"Sin parametros","reglas"=>$resultado_consulta];
  }
  
  echo json_encode($resultado);