<?php 
  session_name('rh_admon');
  session_start();
	if(isset($_SESSION['identity'])){
		unset($_SESSION['identity']);
	}
	if(isset($_SESSION['permisos'])){
		unset($_SESSION['permisos']);
	}		

	header("Location: ../login.php");