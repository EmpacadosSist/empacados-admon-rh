<?php require 'nav.php'; ?>
<?php require 'sidebarfinal.php';?>

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
       
          
    <table class="table table-bordered">
        <thead>
            <tr>    
                <th>Regla bono</th>
                <th>Agregar</th>
                <th>GyD</th>
                <th>SyL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>95% - 99% = 50%</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>100% o más = proporcional</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>100% o más = 100%</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
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

