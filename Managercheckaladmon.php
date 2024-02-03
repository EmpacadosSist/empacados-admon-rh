<?php require 'nav.php'; ?>
<?php require 'sidebarfinal.php';?>

    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .desplante {
      font-weight: bold;
      color: #4CAF50;
    }
  </style>
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS REVISIÓN GENERAL</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<body>

<div class="container mt-4">
  <!-- Pestañas -->
  <ul class="nav nav-tabs" id="pestanas" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Bonos</a>
    </li>
   
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
    

      <div class="table-responsive">
      <table>
    <thead>
      <tr>
        <th>Columna 1</th>
        <th>Columna 2</th>
        <th>Columna 3</th>
        <th>Columna 4</th>
        <th>Columna 5</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="desplante">Fila 1, Celda 1</td>
        <td>Fila 1, Celda 2</td>
        <td>Fila 1, Celda 3</td>
        <td>Fila 1, Celda 4</td>
        <td>Fila 1, Celda 5</td>
      </tr>
      <tr>
        <td>Fila 2, Celda 1</td>
        <td class="desplante">Fila 2, Celda 2</td>
        <td>Fila 2, Celda 3</td>
        <td>Fila 2, Celda 4</td>
        <td>Fila 2, Celda 5</td>
      </tr>
      <tr>
        <td class="desplante">Fila 3, Celda 1</td>
        <td>Fila 3, Celda 2</td>
        <td>Fila 3, Celda 3</td>
        <td>Fila 3, Celda 4</td>
        <td>Fila 3, Celda 5</td>
      </tr>
      <tr>
        <td>Fila 4, Celda 1</td>
        <td class="desplante">Fila 4, Celda 2</td>
        <td>Fila 4, Celda 3</td>
        <td>Fila 4, Celda 4</td>
        <td>Fila 4, Celda 5</td>
      </tr>
      <tr>
        <td class="desplante">Fila 5, Celda 1</td>
        <td>Fila 5, Celda 2</td>
        <td>Fila 5, Celda 3</td>
        <td>Fila 5, Celda 4</td>
        <td>Fila 5, Celda 5</td>
      </tr>
      <tr>
        <td>Fila 6, Celda 1</td>
        <td class="desplante">Fila 6, Celda 2</td>
        <td>Fila 6, Celda 3</td>
        <td>Fila 6, Celda 4</td>
        <td>Fila 6, Celda 5</td>
      </tr>
    </tbody>
  </table>
      </div>

    <!-- Agrega más contenidos de pestañas según sea necesario -->

  </div>
</div>

</div>
 


<script>
  $(document).ready(function() {
    // Configuración común para todas las tablas
    var commonConfig = {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ],
      language: {
        search: '<i class="fas fa-search"></i>',
        searchPlaceholder: 'Buscar...',
        lengthMenu: 'Mostrar _MENU_ registros por página',
        zeroRecords: 'No se encontraron registros',
        info: 'Mostrando página _PAGE_ de _PAGES_',
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtrados de un total de _MAX_ registros)',
        paginate: {
          first: 'Primera',
          previous: 'Anterior',
          next: 'Siguiente',
          last: 'Última'
        }
      }
    };

  });
</script>




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

