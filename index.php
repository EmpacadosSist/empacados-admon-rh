<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  require_once('layout/libreriasdatatable.php');
  require_once('nav.php'); 
  require_once('layout/sidebar.php'); 
  
?>

<style type="text/css">
        
  .dashboard-paragraph.animated {
    animation: fadeInUp 1.5s ease-out; /* Animación fadeInUp de animate.css */
    animation-fill-mode: forwards; /* Mantiene el último estado de la animación */
  }
          
  /* Estilos adicionales */
  .dashboard-paragraph a {
    color: #007bff;
    text-decoration: none;
    font-weight: normal;
  }
      
  .dashboard-paragraph a:hover {
    text-decoration: underline;
  }
</style>


  <main id="main" class="main">
    <div class="pagetitle">
      <nav>

        <ol class="breadcrumb"> <img width="60px;" src="assets/img/house.png ">
          <a href="index.php">  </a></li>
          <li class="breadcrumb-item active">
            <p class="dashboard-paragraph animated" id="dashboardText">
              Página principal
            </p>
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <h1>
      Página principal en construcción
    </h1>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require 'layout/footer.php';?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
  new WOW().init();

  // Agregar la clase "animated" para activar la animación cuando la página está completamente cargada
  $(document).ready(function() {
    $('#dashboardText').addClass('animated');
  });
</script>

</body>

</html>