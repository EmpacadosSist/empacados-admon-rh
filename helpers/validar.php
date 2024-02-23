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

  public static function validarLongitudMax($valor, $max){
    
    $validar = (strlen($valor) > $max);

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

  public static function validarNum($valor){
    if(is_numeric($valor)){
      return true;
    }else{
      return false;
    }
  }

  public static function validarBool($valor){
    if(($valor=='1'||$valor=='0')||($valor==1||$valor==0)){
      return true;
    }else{
      return false;
    }
  }  

  public static function validarFecha($fecha){
    $recDateDay=substr($fecha, 6, 2);
    $recDateMonth=substr($fecha, 4, 2);
    $recDateYear=substr($fecha, 0, 4);

    if(is_numeric($recDateDay) && is_numeric($recDateMonth) && is_numeric($recDateYear)){
      return true;
    }else{
      return false;
    }
  }
}