<?php 
require_once('../conexion/conexion.php');

if(count($_POST)>0){
  //aqui se codifica
  echo json_encode($_POST);

}