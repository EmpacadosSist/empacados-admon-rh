<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
require_once('../helpers/validar.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  //se almacenan los parametros en variables en caso de que existan
  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
  $paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";    
  $paymentVarVal = Validar::validarNum($paymentVar);
  
  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($userId!=""&&$paymentVar!=""&&$paymentVarVal){    

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    $sqlSP="CALL update_user_var($userId, $paymentVar)";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){
      
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Variable actualizada"];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de haber un error en los campos vacios          
    $resultado = ["ok"=>false,"message"=>"Campos vacios"];
  }

}else{
  //se guarda en una variable el resultado de haber un error sin parametros  
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);