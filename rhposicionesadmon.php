<?php require 'nav.php'; ?>
<?php require 'sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS EMPLEADOS</h1>
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
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Ocupadas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2" aria-selected="false">Vacantes</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña3" data-toggle="tab" href="#contenido3" role="tab" aria-controls="contenido3"
       aria-selected="false">Bajas</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña4" data-toggle="tab" href="#contenido4" role="tab" aria-controls="contenido4"
       aria-selected="false">Cambios</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña5" data-toggle="tab" href="#contenido5" role="tab" aria-controls="contenido5"
       aria-selected="false">Canceladas</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña6" data-toggle="tab" href="#contenido6" role="tab" aria-controls="contenido6"
       aria-selected="false">Solicitadas</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña7" data-toggle="tab" href="#contenido7" role="tab" aria-controls="contenido7"
       aria-selected="false">Rechazadas</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="pestaña8" data-toggle="tab" href="#contenido8" role="tab" aria-controls="contenido8"
       aria-selected="false">En Pausa</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" id="pestaña9" data-toggle="tab" href="#contenido9" role="tab" aria-controls="contenido9"
       aria-selected="false">Programada para baja</a>
    </li>
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
    <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana1">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>John</td>
              <td>Doe</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Contenido de la Pestaña 2 -->
    <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana2">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <!-- Contenido de la Pestaña 3 -->
    <div class="tab-pane fade" id="contenido3" role="tabpanel" aria-labelledby="pestaña3">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana3">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

   <!-- Contenido de la Pestaña 4 -->
    <div class="tab-pane fade" id="contenido4" role="tabpanel" aria-labelledby="pestaña4">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana4">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <!-- Contenido de la Pestaña 5 -->
    <div class="tab-pane fade" id="contenido5" role="tabpanel" aria-labelledby="pestaña5">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana5">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <!-- Contenido de la Pestaña 6 -->
    <div class="tab-pane fade" id="contenido6" role="tabpanel" aria-labelledby="pestaña6">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana6">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <!-- Contenido de la Pestaña 3 -->
    <div class="tab-pane fade" id="contenido7" role="tabpanel" aria-labelledby="pestaña7">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana7">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <!-- Contenido de la Pestaña 3 -->
    <div class="tab-pane fade" id="contenido8" role="tabpanel" aria-labelledby="pestaña8">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana8">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

       <!-- Contenido de la Pestaña 3 -->
    <div class="tab-pane fade" id="contenido9" role="tabpanel" aria-labelledby="pestaña9">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana9">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Teléfono</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>john.doe@example.com</td>
              <td>(555) 123-4567</td>
              <!-- Agrega más filas según tus necesidades -->
            </tr>
          </tbody>
        </table>
      </div>
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

    // Tabla Pestaña 1
    $('#tablaPestana1').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana2').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana3').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana4').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana5').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana6').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana7').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana8').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana9').DataTable(commonConfig);

   
    // Inicializar más tablas según sea necesario
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
