<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/validar.php');

if(count($_POST)>0){
  //comentario de prueba
  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";
  $userIdVal = Validar::validarNum($userId);  

  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $nameVal = Validar::validarLongitud($name,3,100);   

  $age = isset($_POST['age']) ? $_POST['age'] : "";
  $ageVal = Validar::validarNum($age); 

  $dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : "";
  $dateOfBirthVal = Validar::validarFecha($dateOfBirth);  

    if($userIdVal && $nameVal && $ageVal && $dateOfBirthVal){
      $sqlSP="CALL insert_child($userId, '$name', $age, '$dateOfBirth', @LID)";
      $resultSP=$conn->query($sqlSP);

      if($resultSP){

        //cargar el query haciendo un select con el parametro de salida del sp insert
        $last_idq = $conn->query("SELECT @LID as id");
        //se saca el objeto del last id
        $last_id = $last_idq->fetch_object();
        //se guarda el id sacandolo del objeto
        $childId=$last_id->id;

        //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
        $resultado = ["ok"=>true,"message"=>"Hijo agregado exitosamente","Id"=>$childId];
  
      }else{
        //se guarda en una variable el resultado de haber un error al agregar a la bd      
        $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];
  
      }      
    }else{
      //se guarda en una variable el resultado de error de validacion de los campos
      $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "Id empleado"=>$userIdVal, "Nombre hijo"=>$nameVal, "Edad hijo"=>$ageVal, "Fecha nacimiento hijo"=>$dateOfBirthVal];
    }
}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);