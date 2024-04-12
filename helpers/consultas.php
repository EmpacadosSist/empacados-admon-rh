<?php 
  class Consultas{
    public static function listUsers($conn){
      $sqlSP="CALL select_user_position()";
      /*
      alias de los campos
	    'usuarioId',
	    'puestoId',       
      'numEmpleado', 
      'ceco',
	    'nombre', 
  	  'apellido1', 
   	  'apellido2', 
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

    public static function listOneUser($conn, $userId){
      $sqlSP="CALL select_one_user_position($userId)";
      /*
      alias de los campos
	    'usuarioId',
	    'puestoId',       
      'numEmpleado', 
      'ceco',
	    'nombre', 
  	  'apellido1', 
   	  'apellido2', 
      'nivel', 
      'puesto', 
      'fechaIngreso', 
      'correo', 
      'variable',
      'area'
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

    }    

    public static function listIndicatorVPM($conn){
      $sqlSP="CALL select_indicator_vpm()";
      /*
      alias de los campos
	    'id',
	    'nombreIndicador',
	    'comentarios',
	    'real',
	    'objetivo',
	    'formatoId'
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

    public static function listIndicatorVPMIndiv($conn, $indicatorId, $month, $year){
      $sqlSP="CALL select_indicator_vpm_indiv($indicatorId, $month, $year)";
      /*
      alias de los campos
	    'id',
	    'real',
	    'objetivo',
	    'formatoId'
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

    public static function listIndicator($conn){
      $sqlSP="CALL select_indicator()";
      /*
      alias de los campos
	    'id',
	    'nombreIndicador',
	    'comentarios'
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
    
    public static function listBonusRuleByIndicatorId($conn, $indicatorId, $type){
      $sqlSP="CALL select_bonusrule_by_indicator($indicatorId,$type)";
      /*
      alias de los campos
	    'id',
      'minimo',
      'maximo',
      'bonus', 
      'tipo'
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

    public static function listPaymentTypes($conn){
      $sqlSP="CALL select_payment_type()";
      /*
      alias de los campos
      'tipoPagoId', 
	    'nombreTipoPago' 
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

    public static function listAreas($conn){
      $sqlSP="CALL select_area()";
      /*
      alias de los campos
      'areaId', 
	    'nombreArea' 
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

    public static function listSections($conn, $areaId){
      $sqlSP="CALL select_section($areaId)";
      /*
      alias de los campos
	    'departamentoId',
      'areaId',
      'nombreDepartamento'
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
    
    public static function listPositions($conn, $sectionId){
      $sqlSP="CALL select_position($sectionId)";
      /*
      alias de los campos
	    'puestoId',
      'departamentoId',
      'nombrePuesto'
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

    public static function listEstados($conn){
      $sqlSP="CALL select_estados()";
      /*
      alias de los campos
		  'estadoId',
      'nombreEstado'
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

    public static function listMunicipios($conn, $estadoId){
      $sqlSP="CALL select_municipio($estadoId)";
      /*
      alias de los campos
		  'municipioId',
      'nombreMunicipio',
      'estadoId'
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
    
    public static function listColonias($conn, $municipioId){
      $sqlSP="CALL select_colonia($municipioId)";
      /*
      alias de los campos
		  'coloniaId',
      'nombreColonia',
      'municipioId',
      ciudad,
      asentamiento,
      'codigoPostal'
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
    
    public static function listCecos($conn){
      $sqlSP="CALL select_ceco()";
      /*
      alias de los campos
	    'cecoId',
      'nombreCeco'
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

    public static function paymentVar($conn, $positionId, $indicatorId){
      $sqlSP="CALL select_position_indicator($positionId, $indicatorId)";
      /*
      alias de los campos
	    'porcentaje' 
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
    
    public static function listAuthorizations($conn){
      $sqlSP="CALL select_authorization()";
      /*
      alias de los campos
	    'autorizacionId',
      'nombreAutorizacion'
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

    public static function listOneUserAuth($conn,$userId,$authorizationId){
      $sqlSP="CALL select_one_user_authorization()";
      /*
      alias de los campos
	    N/A
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