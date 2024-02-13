<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/generar_pass.php');
require_once('../helpers/validar.php');
require_once('../helpers/enviar_pass.php');

//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  $userId = isset($_POST['userId']) ? $_POST['userId'] : "";

  $superUserId = isset($_POST['superUserId']) ? $_POST['superUserId'] : "";  
  $superUserIdVal = Validar::validarNum($superUserId);

  //se genera una contraseña automaticamente con 8 caracteres
  $password = generarPassword(8);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $nameVal = Validar::validarLongitud($name,3,50);

  $lastName1 = isset($_POST['lastName1']) ? $_POST['lastName1'] : "";
  $lastName1Val = Validar::validarLongitud($lastName1,3,50);
  
  $lastName2 = isset($_POST['lastName2']) ? $_POST['lastName2'] : "";
  $lastName2Val = Validar::validarLongitud($lastName2,3,50);  
    
  //se valida campo que no venga vacio y que cumpla la validacion de email  
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $emailVal = Validar::validarEmail($email);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $empNum = isset($_POST['empNum']) ? $_POST['empNum'] : "";
  $empNumVal = Validar::validarNum($empNum);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $positionId = isset($_POST['positionId']) ? $_POST['positionId'] : "";
  $positionIdVal = Validar::validarNum($positionId);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";
  $paymentVarVal = Validar::validarNum($paymentVar);

  //se valida campo que no venga vacio y que cumpla la validacion de fecha  
  $recDate = isset($_POST['recDate']) ? $_POST['recDate'] : "";
  $recDateVal = Validar::validarFecha($recDate);

  $contract = isset($_POST['contract']) ? $_POST['contract'] : "";
  $contractVal = Validar::validarLongitud($contract,3,100);    

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $cecoId = isset($_POST['cecoId']) ? $_POST['cecoId'] : "";
  $cecoIdVal = Validar::validarNum($cecoId);  

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $age = isset($_POST['age']) ? $_POST['age'] : "";
  $ageVal = Validar::validarNum($age);  

  //se valida campo que no venga vacio y que cumpla la validacion de fecha
  $dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : "";
  $dateOfBirthVal = Validar::validarFecha($dateOfBirth);

  //se valida campo que no venga vacio y que cumpla la validacion de fecha
  $placeOfBirth = isset($_POST['placeOfBirth']) ? $_POST['placeOfBirth'] : "";
  $placeOfBirthVal = Validar::validarFecha($placeOfBirth);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud  
  $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
  $genderVal = Validar::validarLongitud($gender,1,1);   
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $maritalStatus = isset($_POST['maritalStatus']) ? $_POST['maritalStatus'] : "";
  $maritalStatusVal = Validar::validarLongitud($maritalStatus,3,45);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $spouseName = isset($_POST['spouseName']) ? $_POST['spouseName'] : "";
  $spouseNameVal = Validar::validarLongitud($spouseName,3,100);
  
  //se valida campo que no venga vacio y que cumpla la validacion de fecha
  $spouseDob = isset($_POST['spouseDob']) ? $_POST['spouseDob'] : "";
  $spouseDobVal = Validar::validarFecha($spouseDob);  
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $nss = isset($_POST['nss']) ? $_POST['nss'] : "";
  $nssVal = Validar::validarLongitud($nss,3,45);  

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $curp = isset($_POST['curp']) ? $_POST['curp'] : "";
  $curpVal = Validar::validarLongitud($curp,3,100);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $rfc = isset($_POST['rfc']) ? $_POST['rfc'] : "";
  $rfcVal = Validar::validarLongitud($rfc,3,100);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $rfcZipCode = isset($_POST['rfcZipCode']) ? $_POST['rfcZipCode'] : "";
  $rfcZipCodeVal = Validar::validarLongitud($rfcZipCode,3,100);  

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $address = isset($_POST['address']) ? $_POST['address'] : "";
  $addressVal = Validar::validarLongitud($address,3,100);    

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $coloniaId = isset($_POST['coloniaId']) ? $_POST['coloniaId'] : "";
  $coloniaIdVal = Validar::validarNum($coloniaId);   
    
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $education = isset($_POST['education']) ? $_POST['education'] : "";
  $educationVal = Validar::validarLongitud($education,3,45);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
  $phoneVal = Validar::validarLongitud($phone,3,20);  

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $shirtSize = isset($_POST['shirtSize']) ? $_POST['shirtSize'] : "";
  $shirtSizeVal = Validar::validarLongitud($shirtSize,3,10);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $pantsSize = isset($_POST['pantsSize']) ? $_POST['pantsSize'] : "";
  $pantsSizeVal = Validar::validarLongitud($pantsSize,3,10);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $shoeSize = isset($_POST['shoeSize']) ? $_POST['shoeSize'] : "";
  $shoeSizeVal = Validar::validarLongitud($shoeSize,3,10);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $paymentTypeId = isset($_POST['paymentTypeId']) ? $_POST['paymentTypeId'] : "";
  $paymentTypeIdVal = Validar::validarNum($paymentTypeId);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $emerPhone1 = isset($_POST['emerPhone1']) ? $_POST['emerPhone1'] : "";
  $emerPhone1Val = Validar::validarLongitud($emerPhone1,3,20);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $emerPhone2 = isset($_POST['emerPhone2']) ? $_POST['emerPhone2'] : "";
  $emerPhone2Val = Validar::validarLongitud($emerPhone2,3,20);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $allergies = isset($_POST['allergies']) ? $_POST['allergies'] : "";
  $allergiesVal = Validar::validarLongitud($allergies,3,100);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $illnesses = isset($_POST['illnesses']) ? $_POST['illnesses'] : "";
  $illnessesVal = Validar::validarLongitud($illnesses,3,100);
  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $medication = isset($_POST['medication']) ? $_POST['medication'] : "";
  $medicationVal = Validar::validarLongitud($medication,3,100);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $baseSalary = isset($_POST['baseSalary']) ? $_POST['baseSalary'] : "";
  $baseSalaryVal = Validar::validarNum($baseSalary);

  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $foodBonus = isset($_POST['foodBonus']) ? $_POST['foodBonus'] : "";
  $foodBonusVal = Validar::validarNum($foodBonus);
  
  //se valida campo que no venga vacio y que cumpla la validacion de tipo numerico  
  $savingFund = isset($_POST['savingFund']) ? $_POST['savingFund'] : "";
  $savingFundVal = Validar::validarNum($savingFund);  

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $bankAcc = isset($_POST['bankAcc']) ? $_POST['bankAcc'] : "";
  $bankAccVal = Validar::validarLongitud($bankAcc,3,100);

  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $bank = isset($_POST['bank']) ? $_POST['bank'] : "";
  $bankVal = Validar::validarLongitud($bank,3,100);  

  $resultado="";
  $sqlSP="";

  //condicion para verificar que todos los campos cumplan con su validacion
  if($superUserIdVal && $nameVal && $lastName1Val && $lastName2Val && $emailVal && $empNumVal && $positionIdVal && $paymentVarVal && $recDateVal && $contractVal && $cecoIdVal && $ageVal && $dateOfBirthVal && $placeOfBirthVal && $genderVal && $maritalStatusVal && $spouseNameVal && $spouseDobVal && $nssVal && $curpVal && $rfcVal && $rfcZipCodeVal && $addressVal && $coloniaIdVal && $educationVal && $phoneVal && $shirtSizeVal && $pantsSizeVal && $shoeSizeVal && $paymentTypeIdVal && $emerPhone1Val && $emerPhone2Val && $allergiesVal && $illnessesVal && $medicationVal && $baseSalaryVal && $foodBonusVal && $savingFundVal && $bankAccVal && $bankVal){    
    //encriptar contraseña
    $encryptedPassword=password_hash($password, PASSWORD_BCRYPT, ['cost'=> 4]);		

    //se hace un insert o update a la bd por medio de un stored procedure, pasando campos como parametros
    //el ultimo parametro del sp de insert es un parametro de salida, que mostrara el ultimo id insertado
    $sqlSP="CALL insert_user($superUserId, '$name', '$lastName1', '$lastName2', '', '$email', '$encryptedPassword', '$empNum', $positionId, $paymentVar, '$recDate', '$contract', $cecoId, $age, '$dateOfBirth', '$placeOfBirth', '$gender', '$maritalStatus', '$spouseName', '$spouseDob', '$nss', '$curp', '$rfc', '$rfcZipCode', '$address', $coloniaId, '$education', '$phone', '$shirtSize', '$pantsSize', '$shoeSize', $paymentTypeId, '$emerPhone1', '$emerPhone2', '$allergies', '$illnesses', '$medication', $baseSalary, $foodBonus, $savingFund, '$bankAcc', '$bank', @LID)";
    if($userId!=""){
      $sqlSP="CALL update_user($userId, $superUserId, '$name', '$lastName1', '$lastName2', '', '$email', '$empNum', $positionId, $paymentVar, '$recDate', '$contract', $cecoId, $age, '$dateOfBirth', '$placeOfBirth', '$gender', '$maritalStatus', '$spouseName', '$spouseDob', '$nss', '$curp', '$rfc', '$rfcZipCode', '$address', $coloniaId, '$education', '$phone', '$shirtSize', '$pantsSize', '$shoeSize', $paymentTypeId, '$emerPhone1', '$emerPhone2', '$allergies', '$illnesses', '$medication', $baseSalary, $foodBonus, $savingFund, '$bankAcc', '$bank')";
    }
		$resultSP=$conn->query($sqlSP);
    
    //condicion para verificar si se hizo la insercion en la bd
    if($resultSP){
      $message="";
      if($userId==""){
        //cargar el query haciendo un select con el parametro de salida del sp insert
        $last_idq = $conn->query("SELECT @LID as id");
        //se saca el objeto del last id
        $last_id = $last_idq->fetch_object();
        //se guarda el id sacandolo del objeto
        $userId=$last_id->id;
        //variable que almacena el resultado de haber enviado por correo la contraseña
        //$isSent=enviarPassword($password, $empNum, $email);
        $isSent="Prueba sin envio";
        $message="Usuario agregado exitosamente";
      }else{
        $isSent="No aplica";
        $message="Usuario actualizado exitosamente";        
      }


      //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
      $resultado = ["ok"=>true,"message"=>$message, "Id"=>$userId, "emailSent"=>$isSent];

    }else{
      //se guarda en una variable el resultado de haber un error al agregar a la bd      
      $resultado = ["ok"=>false,"message"=>"Error al agregar a la base de datos"];

    }

  }else{
    //se guarda en una variable el resultado de error de validacion de los campos
    $valoresValidacion=["JefeDirecto"=>$superUserIdVal, "Nombre"=>$nameVal, "Apellido1"=>$lastName1Val, "Apellido2"=>$lastName2Val, "correo"=>$emailVal, "NumeroEmp"=>$empNumVal, "Puesto"=>$positionIdVal, "Variable"=>$paymentVarVal, "FechaRec"=>$recDateVal, "Contrato"=>$contractVal, "CentroCostos"=>$cecoIdVal, "Edad"=>$ageVal, "FechaNac"=>$dateOfBirthVal, "LugarNac"=>$placeOfBirthVal, "Genero"=>$genderVal, "EstadoCivil"=>$maritalStatusVal, "ConyugeNom"=>$spouseNameVal, "ConyugeFechaNac"=>$spouseDobVal, "NSS"=>$nssVal, "CURP"=>$curpVal, "RFC"=>$rfcVal, "RFCCP"=>$rfcZipCodeVal, "Direccion"=>$addressVal, "Colonia"=>$coloniaIdVal, "Escolaridad"=>$educationVal, "Telefono"=>$phoneVal, "TallaCamisa"=>$shirtSizeVal, "TallaPantalon"=>$pantsSizeVal, "TallaZapato"=>$shoeSizeVal, "TipoPago"=>$paymentTypeIdVal, "TelEmergencia1"=>$emerPhone1Val, "TelEmergencia2"=>$emerPhone2Val, "Alergias"=>$allergiesVal, "Padecimientos"=>$illnessesVal, "Medicamentos"=>$medicationVal, "Salario"=>$baseSalaryVal, "BonoDespensa"=>$foodBonusVal, "FondoAhorro"=>$savingFundVal, "CuentaBanco"=>$bankAccVal, "Banco"=>$bankVal];

    $resultado = ["ok"=>false,"message"=>"Error en la validación de información", "validations"=>$valoresValidacion];
  }

}else{
  $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}
//se envia la variable del resultado
echo json_encode($resultado);