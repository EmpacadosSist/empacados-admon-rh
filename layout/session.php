<?php 
session_name('rh_admon');
session_start();
$pagina = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['identity'])) {
  header('Location: login.php?pag='.$pagina);
  //terminar el script
  exit();
}