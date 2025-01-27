<?php 
session_name('rh_admon');
session_start();
//$pagina = basename($_SERVER['PHP_SELF']);
$pagina = basename($_SERVER['REQUEST_URI']);
if (!isset($_SESSION['identity'])) {
  if($pagina!='conecta-empacados'){
    header('Location: login.php?pag='.$pagina);
  }else{
    header('Location: login.php');    
  }
  //terminar el script
  exit();
}