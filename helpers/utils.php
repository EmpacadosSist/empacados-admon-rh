<?php
  class Utils{
    public static function mostrarReglas($indregla){

      $resultado="";
      for($i=0; $i < count($indregla); $i++){ 

        if($indregla[$i]['calculo']=='0'){
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

        }else{
          $mid="a";
          if($indregla[$i]['minimo']=='T'||$indregla[$i]['maximo']=='T'){
            $mid="";
          } 
          if($indregla[$i]['minimo']=='T'){
            $resultado.= "Menor o igual a";
          }else{
            $resultado.= $indregla[$i]['minimo']." ";
          }
          $resultado.= $mid;
          if($indregla[$i]['maximo']=='T'){
            $resultado.= "o más";
          }else{
            $resultado.= " ".$indregla[$i]['maximo'];
          }
          $resultado.= " = ";
          if($indregla[$i]['bonus']=='T'){
            $resultado.= "Proporcional";
          }else{
            $resultado.= $indregla[$i]['bonus']."%";
          } 
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

    public static function calcularPorc($indregla, $porcentaje, $tipocalc, $real){
      $resultado="0.00";
      for($i=0; $i < count($indregla); $i++){ 
        $rango1="";
        $rango2="";
        
        $rango1=$indregla[$i]['minimo'];
        $rango2=$indregla[$i]['maximo'];
        $bonus=$indregla[$i]['bonus'];
        if($rango1!='T'&&$rango2!='T'){
          if($tipocalc=='0'){
            if($porcentaje>=$rango1&&$porcentaje<=$rango2){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$porcentaje;
            }    

          }else{
            if($real>=$rango1&&$real<=$rango2){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$real;
            }  
          }

        }

        if($rango1!='T'&&$rango2=='T'){

          if($tipocalc=='0'){
            if($porcentaje>=$rango1){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$porcentaje;            
            }

          }else{
            if($real>=$rango1){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$real;            
            }
          }

        }

        if($rango1=='T'&&$rango2!='T'){
          if($tipocalc=='0'){
            if($porcentaje<=$rango2){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$porcentaje;
            }

          }else{
            if($real<=$rango2){
              if($bonus!='T')
                $resultado=$bonus;
              else
                $resultado=$real;
            }
          }

        }        
        
      }
      return number_format($resultado,2);
    }

    public static function deleteSession($name){
      if(isset($_SESSION[$name])){
        $_SESSION[$name]=null;
        unset($_SESSION[$name]);
      }
  
      return $name;
    }

    public static function buscarPermiso($numPerm){
      $resultado=false;
      if(isset($_SESSION['permisos'])){
  
        for ($i=0; $i < count($_SESSION['permisos']); $i++) { 
          # code...
          $permisoSesion=$_SESSION['permisos'][$i]['autorizacionId'];
          if($numPerm==$permisoSesion){
            $resultado=true;
          }
        }
      }
      return $resultado;
    }

    public static function redirectSinPermiso($numPerm){
      $resultado=false;
      if(isset($_SESSION['permisos'])){
  
        for ($i=0; $i < count($_SESSION['permisos']); $i++) { 
          # code...
          $permisoSesion=$_SESSION['permisos'][$i]['autorizacionId'];
          if($numPerm==$permisoSesion){
            $resultado=true;
          }
        }
      }
      if(!$resultado){
        header('Location: index.php'); 
      }
      return false;
    }
    
    public static function redirectSinParametro($resParam){
      //recibe parametro boolean que indica si se tuvieron parametros
      if(!$resParam){
        header('Location: index.php'); 
      }
      return false;
    }       
  }