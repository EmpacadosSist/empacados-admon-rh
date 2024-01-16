<?php
class Validar{
  public static function validarLongitud($valor, $min, $max){
    
    $validar = (strlen($valor) > $max || strlen($valor) < $min || empty($valor));

    if(!$validar){
      return true;
    }else{
      return false;      
    }
  }

  public static function validarEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;
    }else{
      return false;
    }
  }
}