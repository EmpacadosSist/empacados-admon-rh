<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/generar_pass.php');
require_once('../helpers/enviar_pass.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  //se almacenan los parametros en variables en caso de que existan
  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";    

  //se genera una contraseña automaticamente con 8 caracteres
  $password = generarPassword(8);

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($userId!=""&&$email!=""&&$empNum!=""){    
    //encriptar contraseña
    $encryptedPassword=password_hash($password, PASSWORD_BCRYPT, ['cost'=> 4]);		

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    $sqlSP="CALL update_user_pass($userId, '$encryptedPassword')";

		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){
      //variable que almacena el resultado de haber enviado por correo la contraseña
      $isSent=enviarPassword($password, $empNum, $email);
      
      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>"Contraseña actualizada", "emailSent"=>$isSent];

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