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
      $resultSP=$conn->query($sqlSP);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          array_push($resultado, $row);
        }
      }
      return $resultado;
    }
  }