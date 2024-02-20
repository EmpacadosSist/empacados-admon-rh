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

    public static function porcCumplimiento($real, $objetivo){
      
      if($objetivo=='0'||$objetivo==0){
        $resultado='0.00';
      }else{
        $resultado=($real/$objetivo)*100;
        $resultado=number_format($resultado, 2);
      }

      return $resultado;
    }

    public static function calcularPorc($indregla, $porcentaje){
      $resultado="0.00";
      for($i=0; $i < count($indregla); $i++){ 
        $rango1="";
        $rango2="";
        
        $rango1=$indregla[$i]['minimo'];
        $rango2=$indregla[$i]['maximo'];
        $bonus=$indregla[$i]['bonus'];
        if($rango1!='T'&&$rango2!='T'){
          if($porcentaje>=$rango1&&$porcentaje<=$rango2){
            if($bonus!='T')
              $resultado=$bonus;
            else
              $resultado=$porcentaje;
          }          
        }

        if($rango1!='T'&&$rango2=='T'){
          if($porcentaje>=$rango1){
            if($bonus!='T')
              $resultado=$bonus;
            else
              $resultado=$porcentaje;            
          }
        }

        if($rango1=='T'&&$rango2!='T'){
          if($porcentaje<=rango2){
            if($bonus!='T')
              $resultado=$bonus;
            else
              $resultado=$porcentaje;
          }
        }        
        
      }
      return $resultado;
    }
  }