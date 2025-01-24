
<?php require_once('helpers/consultas.php'); ?>
<?php require_once('conexion/conexion.php'); 
$nombreEmpleado=$_SESSION['identity']->name." ".$_SESSION['identity']->lastName1." ".$_SESSION['identity']->lastName2;
$puesto=$_SESSION['identity']->nombrePuesto;
$iduser=$_SESSION['identity']->userId;
$user = Consultas::listOneUsersImage($conn, $iduser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo2024.png" width="245px">
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">          
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <div class="image-container">
              <?php if(!empty($user)){ ?>
                <img src="<?=$user[0]['ruta']?>" alt="Profile" class="rounded-circle si" style="width: 48.5px; height: 48.5px; object-fit: cover; object-position: top; max-height: 100%;">
             <?php }else{ ?>
                <img src="assets/img/profile_placeholder.jpg" alt="Profile" class="rounded-circle">
             <?php } ?>
            </div>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$nombreEmpleado?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$nombreEmpleado?></h6>
              <span><?=$puesto?></span>
            </li>
            <!--
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              -->
              
              <li>
                <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="mis-datos.php?id=<?=$iduser?>">
                <i class="bi bi-card-text"></i>
                <span>Ver mis datos</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="login/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <style>
    .si{
      width: 34px;
      height: 34px;
    }
  </style>


