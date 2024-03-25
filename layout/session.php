<?php 
session_name('rh_admon');
session_start();

if (!isset($_SESSION['identity'])) {
  header('Location: login.php');
}