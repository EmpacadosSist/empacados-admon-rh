<?php
  require_once('../conexion/conexion.php');
  if(count($_POST)>0){

    $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
    $authorizationId = isset($_POST['authorizationId']) ? $_POST['authorizationId'] : "";    
  
    if($userId!="" && $authorizationId!=""){
      $sqlSP="CALL select_one_user_authorization('$userId', '$authorizationId')";
      $resultSP=$conn->query($sqlSP);
      
      if($resultSP){
        //cargar el query haciendo un select con el parametro de salida del sp insert
        $row_cnt=$resultSP->num_rows;
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