<?php
  class Utils{
    public static function mostrarReglas($indregla){
      $resultado="";
      for($i=0; $i < count($indregla); $i++){ 
        $mid="-";
        if($indregla[$i]['minimo']=='T'||$indregla[$i]['maximo']=='T'){
          $mid="";
        } 
        if($indregla[$i]['minimo']=='T'){
          $resultado.= "Menor o igual a";
        }else{
          $resultado.= $indregla[$i]['minimo']."% ";
        }
        $resultado.= $mid;
        if($indregla[$i]['maximo']=='T'){
          $resultado.= "o más";
        }else{
          $resultado.= " ".$indregla[$i]['maximo']."%";
        }
        $resultado.= " = ";
        if($indregla[$i]['bonus']=='T'){
          $resultado.= "Proporcional";
        }else{
          $resultado.= $indregla[$i]['bonus']."%";
        } 
        $resultado.= "; ";                       
      }
      $resultado = rtrim($resultado, '; ');
      return $resultado;
    }
  }