<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $minPer = isset($_POST['minPer']) ? $_POST['minPer'] : "";
  $minPerVal = Validar::validarLongitud($minPer,1,100);

  $maxPer = isset($_POST['maxPer']) ? $_POST['maxPer'] : "";
  $maxPerVal = Validar::validarLongitud($maxPer,1,100);
  
  $bonusPer = isset($_POST['bonusPer']) ? $_POST['bonusPer'] : "";
  $bonusPerVal = Validar::validarLongitud($bonusPer,1,100);  

  $calculationType = isset($_POST['calculationType']) ? $_POST['calculationType'] : "";
  $calculationTypeVal = Validar::validarBool($calculationType);    

    if($minPerVal && $maxPerVal && $bonusPerVal && $calculationTypeVal){
      $sqlSP="CALL insert_bonus_rule('$minPer', '$maxPer', '$bonusPer', $calculationType, @LID)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //cargar el query haciendo un select con el parametro de salida del sp insert
        $last_idq = $conn->query("SELECT @LID as id");
        //se saca el objeto del last id
        $last_id = $last_idq->fetch_object();
        //se guarda el id sacandolo del objeto
        $bonusRuleId=$last_id->id;

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Regla de bono agregada exitosamente","Id"=>$bonusRuleId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Porcentaje minimo"=>$minPerVal, "Porcentaje maximo"=>$maxPerVal, "Porcentaje bono"=>$bonusPerVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);