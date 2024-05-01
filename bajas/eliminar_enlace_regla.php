<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $indicatorId = isset($_POST['indicatorId']) ? $_POST['indicatorId'] : "";
  $indicatorIdVal = Validar::validarNum($indicatorId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $bonusRuleId = isset($_POST['bonusRuleId']) ? $_POST['bonusRuleId'] : "";
  $bonusRuleIdVal = Validar::validarNum($bonusRuleId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  //el type indica si la union del indicador y la regla es para directores y gerentes (valor 0) o lideres y staff (valor 1)
  $type = isset($_POST['type']) ? $_POST['type'] : "";
  $typeVal = Validar::validarLongitudMax($type,3);  

    if($indicatorIdVal && $bonusRuleIdVal && $typeVal){
      if($type=="gyd"){
        $typeBool='0';
      }else{
        $typeBool='1';
      }

      $sqlSP="CALL delete_indicator_bonus_rule($indicatorId, $bonusRuleId, $typeBool)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){
        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Regla de bono enlazada eliminada exitosamente"];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al eliminar de la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id de indicador"=>$indicatorIdVal, "Id de regla"=>$bonusRuleIdVal, "Tipo"=>$typeVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);