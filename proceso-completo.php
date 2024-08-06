<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Solicitar vacaciones</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php 
  $opcion=isset($_GET['op']) ? $_GET['op'] : "";
  $titulo="";
  $redireccion="#";
  $texto_boton="Volver a la página anterior";
  switch ($opcion) {
    case 'v':
      # code...
      $titulo="SOLICITUD ENVIADA EXITOSAMENTE";
      $redireccion="historial-vacaciones.php";
      $texto_boton="Ver historial de vacaciones";
      break;
    
    default:
      # code...
      break;
  }

?>

<style>
  .card-header-vac,
  .card-footer-vac {
    border-color: #ebeef4;
    background-color: #fff;
    color: #000000;
    padding: 15px;
  }
</style>

  <body>
    <main id="main" class="main">
    <div class="pagetitle">
    <h1><?=$titulo?></h1>
    <hr>
    </div><!-- End Page Title -->
    
    <div class="row">
      <div class="col"></div>
      <div class="col" style="text-align:center;">
      <a class="btn btn-primary" href="<?=$redireccion?>"><?=$texto_boton?></a>
      </div>
      <div class="col"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    </main>
    <?php require 'layout/footer.php';?>
  </body>
</html>