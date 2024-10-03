<?php
  require_once('../conexion/conexion.php');
  if(count($_POST)>0){

    $month = isset($_POST['month']) ? $_POST['month'] : "";
    $year = isset($_POST['year']) ? $_POST['year'] : "";
    $authorization_id = isset($_POST['authorizationId']) ? $_POST['authorizationId'] : "";            
  
    if($month!="" && $year!="" && $authorization_id!=""){
      $sqlSP="CALL is_validated('$month', '$year', $authorization_id)";
      $resultSP=$conn->query($sqlSP);
      
      if($resultSP){
        //cargar el query haciendo un select con el parametro de salida del sp insert
        //$row_cnt=$resultSP->num_rows;
        $resultFetch = $resultSP->fetch_object();
        $row_cnt=$resultFetch->cantValidados;   
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el formato
        $resultado = ["ok"=>true,"message"=>"consulta correcta","rows"=>$row_cnt];
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"error en consulta","rows"=>0];
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"parametros vacios","rows"=>0];
    }
  }else{
    $resultado = ["ok"=>false,"message"=>"Sin parametros","rows"=>0];
  }
  
  echo json_encode($resultado);