<?php 
  class Consultas{
    public static function listUsers($conn){
      $sqlSP="CALL select_user_position()";
      /*
      alias de los campos
	    'usuarioId',
	    'superuserId',
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

    public static function listUsersImage($conn){
      $sqlSP="CALL select_user_image()";
      /*
      alias de los campos
	    'usuarioId',
      'funciones',
	    'superuserId',
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
      }else{
        echo "Error en la consulta: " . $conn->error;
      }
      $conn->next_result();      
      return $resultado;
    }

    public static function listTasks($conn){
      $sqlSP="CALL select_tasks()";
      /*
      id_task
      name_task
      */
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd

      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          array_push($resultado, $row);
        }
      }else{
        echo "Error en la consulta: " . $conn->error;
      }
      $conn->next_result();      
      return $resultado;
    }

    public static function listOneUsersImage($conn, $userId){
      $sqlSP="CALL select_one_user_image($userId)";
      /*
      alias de los campos
	    'usuarioId',
	    'superuserId',
      'superuserId',
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
      'bonus',
      'tipoCalculo'
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
	    'formatoId',
      'areaId',
      'areaNombre'      
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
	    'comentarios',
      'calculo',
      'areaId'
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

    public static function listIndicatorByArea($conn, $areaId){
      $sqlSP="CALL select_indicator_by_area_id($areaId)";
      /*
      alias de los campos
	    'id',
	    'nombreIndicador',
	    'comentarios',
      'calculo',
      'areaId'
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
    
    public static function listBonusRuleByIndicatorId($conn, $indicatorId, $type){
      $sqlSP="CALL select_bonusrule_by_indicator($indicatorId,$type)";
      /*
      alias de los campos
	    'id',
      'minimo',
      'maximo',
      'bonus',
      'calculo', 
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
      'nivelId',
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

    public static function listFunctions($conn, $positionid){
      $sqlSP = "CALL select_tasks_by_position($positionid)";

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

    public static function listOneRawUser($conn,$userId){
      $sqlSP="CALL select_one_user($userId)";
      /*
      alias de los campos
	    *como viene en la bd
      */
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          unset($row['password']);
          array_push($resultado, $row);
        }
      }
      $conn->next_result();
      return $resultado;

    }
    
    public static function listAreaSectionPosition($conn, $positionId){
      $sqlSP="CALL select_area_section_position($positionId)";
      /*
      alias de los campos
        'areaId',
        'nombreArea',
        'departamentoId',
        'nombreDepartamento',
        'puestoId',        
        'puesto'
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

    public static function listEstadoMunicipioColonia($conn, $coloniaId){
      $sqlSP="CALL select_estado_municipio_colonia($coloniaId)";
      /*
      alias de los campos
        'estadoId',
        'nombreEstado',
        'municipioId',
        'nombreMunicipio',
        'coloniaId',        
        'coloniaNombre',
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
    
    public static function listChildren($conn, $userId){
      $sqlSP="CALL select_children($userId)";
      /*
      alias de los campos
        'id',
		    'usuarioId',
        'nombre',
        'fechaNacimiento'
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

    public static function listLevels($conn){
      $sqlSP="CALL select_level()";
      /*
      alias de los campos
        'Id',
        'nombreNivel'
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

    public static function listAllBonusRulesByInd($conn, $indicatorId){
      $sqlSP="CALL select_all_bonusrules_by_indicator($indicatorId)";
      /*
      alias de los campos
        'id',
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

    public static function listUsersBySupervisor($conn, $userIds){
      $sqlSP="CALL select_user_position_by_supervisor('$userIds')";
      /*
      alias de los campos
        'usuarioId',
        'puestoId',       
        'numEmpleado', 
        'ceco',
        'nombre', 
        'apellido1', 
        'apellido2', 
        'fechaNacimiento',
        'genero',
        'estadoCivil',
        'telefono',
        'nivel', 
        'puesto', 
        'fechaIngreso', 
        'correo', 
        'variable', 
        'departamento',
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

    public static function listVacationsDays($conn, $userId){
      $sqlSP="CALL select_vacation_days($userId)";
      /*
      alias de los campos
		    'diasVacacionesId',
		    'numDias'
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

    public static function listVacationsPeriods($conn, $userId, $vacationsType, $vacationsStatus){
      $sqlSP="CALL select_vacations_periods_by_supervisor($userId, '$vacationsType', '$vacationsStatus')";
      /*
      alias de los campos
		    'numEmpleado', 
		    'nombre',
        'periodoId',
		    'usuarioId',
		    'tipoSolicitud',
		    'estatusSolicitud',
        'descripcion',
		    'tipoHorario',
        'fechaInicio',
        'fechaFinal'
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

    public static function listVacationsPeriodsByUser($conn, $userId, $vacationsType){
      $sqlSP="CALL select_vacations_periods_by_user($userId, '$vacationsType')";
      /*
      alias de los campos
		  'numEmpleado', 
		  'nombre',
      'periodoId',
		  'usuarioId',
		  'tipoSolicitud',
		  'estatusSolicitudLetra',
      'descripcion',
      'estatusSolicitud',
		  'tipoHorario',
      'numDias',
      'fechaInicio',
      'fechaFinal'
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
    
    public static function listVacationsUsers($conn){
      $sqlSP="CALL select_vacations_users()";
      /*
    		'numEmpleado',
		    'nombre',
		    'departamento',
		    'area',
		    'fechaIngreso',
        'ultimoAniv',
        'siguienteAniv',
        'diasTomados',
        'diasPendientes'
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

    public static function isValidated($conn, $month, $year, $authorizationId){
      $sqlSP="CALL is_validated('$month', '$year', $authorizationId)";
      /*
    		'cantValidados'
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