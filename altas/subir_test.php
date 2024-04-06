<?php 
//importar conexion de base de datos
require_once('../conexion/conexion.php');
//importar utilidades
require_once('../helpers/generar_pass.php');
require_once('../helpers/validar.php');
require_once('../helpers/enviar_pass.php');
$resultado="";
//condicion para verificar si hay parametros enviados por post
if(count($_POST)>0){

  
  //se valida campo que no venga vacio y que cumpla la validacion de longitud
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $nameVal = Validar::validarLongitud($name,3,50);

  $lastName1 = isset($_POST['lastName1']) ? $_POST['lastName1'] : "";
  $lastName1Val = Validar::validarLongitud($lastName1,3,50);
  
  $lastName2 = isset($_POST['lastName2']) ? $_POST['lastName2'] : "";
  $lastName2Val = Validar::validarLongitud($lastName2,3,50);  

  $resultado = ["ok"=>true,"nombre"=>$name, "apellido"=>$lastName1, "apellido 2"=>$lastName2];
}

echo json_encode($resultado);