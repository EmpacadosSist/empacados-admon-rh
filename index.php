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

  .mission-vision-values .container {
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .mission-vision-values .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: none;
    border-radius: 10px;
    transition: transform 0.3s;
  }

  .mission-vision-values .card:hover {
    transform: translateY(-5px);
  }

  .mission-vision-values .card-title {
    font-size: 1.5rem;
    color:rgb(0, 0, 0);
  }

  .mission-vision-values .card-text {
    font-size: 1rem;
    color: #333;
  }

  .mission-vision-values ul {
    list-style-type: disc;
    padding-left: 20px;
  }  
</style>


  <main id="main" class="main">
    <div class="pagetitle">
      
      <h1>Nuestra cultura</h1>
    </div><!-- End Page Title -->


  <!-- Sección Misión, Visión y Valores -->
  <section class="mission-vision-values">
    <div class="container">
      <div class="row">
        <!-- Misión -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div align="center" class="mt-3">
                <img width="120px;" src="assets/img/mision.png ">
              </div>
              <h3 class="card-title" align="center">Misión</h3>
              <p class="card-text">
                Dar sabor a la vida con el valor de nuestra gente ofreciendo alimentos de calidad que deleiten a nuestros clientes y beneficien a la sociedad.
              </p>
            </div>
          </div>
        </div>
        <!-- Visión -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div align="center" class="mt-3">
                <img width="120px;" src="assets/img/vision.png ">
              </div>              
              <h3 class="card-title" align="center">Visión</h3>
              <p class="card-text">
                Ser una de las 100 empresas mexicanas más grandes, innovadoras y rentables de alimentos, siendo un excelente lugar para trabajar.
              </p>
            </div>
          </div>
        </div>
        <!-- Valores -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div align="center" class="mt-3">
                <img width="120px;" src="assets/img/valores.png ">
              </div>              
              <h3 class="card-title" align="center">Valores</h3>
              <ul class="card-text">
                <li>Trabajo en equipo</li>
                <li>Calidad</li>
                <li>Enfoque a Resultados</li>
                <li>Compromiso</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require 'layout/footer.php';?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
<script>
  new WOW().init();
  document.title = "Inicio";
  // Agregar la clase "animated" para activar la animación cuando la página está completamente cargada
  $(document).ready(function() {
    $('#dashboardText').addClass('animated');
  });

</script>

</body>

</html>