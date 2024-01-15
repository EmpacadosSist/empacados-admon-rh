<?php
$conn=new mysqli('localhost:3306','root','Ssystem#32','rh_admon');

//la siguiente linea de codigo es para ver los acentos y las ñ
$conn->set_charset('utf8');
if ($conn->connect_errno) {
  echo "Error al conectarse con My SQL debido al error".$conn->connect_error;
} 

