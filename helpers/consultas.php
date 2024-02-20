<?php 
  class Consultas{
    public static function listUsers($conn){
      $sqlSP="CALL select_user_position()";
      /*
      alias de los campos
      'numEmpleado', 
	    'nombreCompleto', 
      'nivel', 
      'puesto', 
      'fechaIngreso', 
      'correo', 
      'variable' 
      */
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          array_push($resultado, $row);
        }
      }
      $conn->next_result();      
      return $resultado;
    }

    public static function listBonusRules($conn){
      $sqlSP="CALL select_bonus_rule()";
      /*
      alias de los campos
      'id', 
	    'minimo', 
      'maximo', 
      'bonus'
      */
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          array_push($resultado, $row);
        }
      }
      $conn->next_result();
      return $resultado;


      /*
		//consulta de mysql
		$sql="CALL procAnexoCount('$oferta', '$sociedad')";
		
		$query=$mysqli->query($sql, MYSQLI_STORE_RESULT);
		$row=$query->fetch_object(); 
		$resultado=$row->resultado;
		$mysqli->next_result();
		return $resultado;      
      */
    }    

    public static function listValueTypes($conn){
      $sqlSP="CALL select_value_type()";
      /*
      alias de los campos
      'id', 
	    'nombreFormato' 
      */   
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          array_push($resultado, $row);
        }
      }
      $conn->next_result();
      return $resultado;               
    }
  }