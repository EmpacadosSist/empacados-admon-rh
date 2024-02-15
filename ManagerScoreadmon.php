<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>

  <!-- Bootstrap Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">

  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>


  <!-- Bootstrap Slider JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
 <style>
    .table th, .table td {
        text-align: center;
    }

    .table thead th {
        vertical-align: middle;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
        margin-bottom: 15px;
    }

    .table {
        font-size: 14px;
        color: #333;
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 12px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary, .table-primary > th, .table-primary > td {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover > td, .table-hover .table-primary:hover > th {
        background-color: #9fcdff;
    }
</style>

<style>
    /* Estilos de tabla y sidebar (mantenidos desde tu código original) */
    .table th, .table td {
        text-align: center;
    }
    /* Agrega más estilos según sea necesario */

    /* Estilos adicionales para el contenedor de los sliders */
    .slider-container {
        margin-top: 20px;
        margin-bottom: 40px;
    }
  </style>

  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS INDICADORES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<body>


    <section class="section">
        <div class="card">
          <div class="card-body">        
             <h1 class="card-title" align="center">Mi Scorecard</h1>

  <!-- Contenedor del Slider -->
    <div class="container mt-3 text-center slider-container">

      <!-- Slider 1 -->
      <div class="slider-container d-inline-block">
        <label for="slider1">Objetivo 1:</label>
        <input id="slider1" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1, 100]"/>
      </div>

      <!-- Slider 2 -->
      <div class="slider-container d-inline-block">
        <label for="slider2">Objetivo 2:</label>
        <input id="slider2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1, 100]"/>
      </div>

      <!-- Slider 3 -->
      <div class="slider-container d-inline-block">
        <label for="slider3">Objetivo 3:</label>
        <input id="slider3" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1, 100]"/>
      </div>

      <!-- Labels para mostrar el rango seleccionado -->
      <div>
        <label for="selectedRange1">Rango Seleccionado Objetivo 1:</label>
        <span id="selectedRange1">1 - 100</span>
      </div>

      <div>
        <label for="selectedRange2">Rango Seleccionado Objetivo 2:</label>
        <span id="selectedRange2">1 - 100</span>
      </div>

      <div>
        <label for="selectedRange3">Rango Seleccionado Objetivo 3:</label>
        <span id="selectedRange3">1 - 100</span>
      </div>
    </div>
        </div>
      </div>
    <!-- Más contenido principal o cierre de etiquetas según sea necesario -->


<style type="text/css">
  .slider-container {
    margin-left: -35px; /* Ajusta el margen izquierdo según sea necesario */
  }

  /* Estilo para el Slider 1 */
  #slider1 .slider-selection {
    background: red; /* Cambia el color de la selección a verde para el Slider 1 */
  }

  /* Estilo para el Slider 2 */
  #slider2 .slider-selection {
    background: red; /* Cambia el color de la selección a azul para el Slider 2 */
  }

  /* Estilo para el Slider 3 */
  #slider3 .slider-selection {
    background: red; /* Cambia el color de la selección a naranja para el Slider 3 */
  }

  /* Estilo para las pistas de los sliders */
  #slider1 .slider-track-low, #slider1 .slider-track-high,
  #slider2 .slider-track-low, #slider2 .slider-track-high,
  #slider3 .slider-track-low, #slider3 .slider-track-high {
    background: Green; /* Cambia el color de las pistas a un tono claro de verde para todos los sliders */
  }
  .card-title {
    padding: 9px 0 4px 0;
    font-size: 22px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
}
</style>

<script>
  // Initialize the sliders
  var slider1 = new Slider("#slider1", {
    id: "slider1",
    min: 1,
    max: 100,
    range: true,
    value: [1, 100]
  });

  var slider2 = new Slider("#slider2", {
    id: "slider2",
    min: 1,
    max: 100,
    range: true,
    value: [1, 100]
  });

  var slider3 = new Slider("#slider3", {
    id: "slider3",
    min: 1,
    max: 100,
    range: true,
    value: [1, 100]
  });

  // Function to update the label with the selected range for each slider
  function updateSelectedRangeLabel(slider, labelElement) {
    var selectedRange = slider.getValue()[0] + " - " + slider.getValue()[1];
    labelElement.text(selectedRange);
  }

  // Update the labels when sliding
  slider1.on("slide", function() {
    updateSelectedRangeLabel(slider1, $("#selectedRange1"));
  });

  slider2.on("slide", function() {
    updateSelectedRangeLabel(slider2, $("#selectedRange2"));
  });

  slider3.on("slide", function() {
    updateSelectedRangeLabel(slider3, $("#selectedRange3"));
  });
</script>

<style type="text/css">
  #mySlider .slider-selection {
    background: red; /* Set selection color to red */
  }

  .slider.slider-horizontal {
    width: 595px;
    height: 22px;
}
  #mySlider .slider-track-low,
  #mySlider .slider-track-high {
    background: green; /* Set track color to green */
  }

  #sliderContainer {
    margin-bottom: 20px; /* Adjust margin as needed */
  }
  .slider.slider-horizontal .slider-tick, .slider.slider-horizontal .slider-handle {
    margin-left: -15px;
}

  #sliderContainer {
    margin-bottom: 40px; /* Ajusta el margen inferior según sea necesario */
  }

  /* Agrega un estilo para el contenedor del slider */
  .slider-container {
    margin-left: -35px; /* Ajusta el margen izquierdo según sea necesario */
  }
</style>

<style type="text/css">
  #mySlider .slider-selection {
    background: red; /* Set selection color to red */
  }

  #mySlider .slider-track-low,
  #mySlider .slider-track-high {
    background: green; /* Set track color to green */
  }

  #sliderContainer {
    margin-bottom: 40px; /* Ajusta el margen inferior según sea necesario */
  }

  /* Agrega un estilo para el contenedor del slider */
  .slider-container {
    margin-left: -35px; /* Ajusta el margen izquierdo según sea necesario */
  }
</style>


</body>
</html>


 <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

