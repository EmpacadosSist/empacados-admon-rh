<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS PAGOS</h1>
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
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Indicadores</a>
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
             <th>Puesto</th>
              <th>$ Variable</th>
              <th>Area</th>
              <th>Nivel en estructura</th>
              <th>Indicador 1</th>
              <th>Indicador N</th>
              <th>Total</th>
              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>Gerente de Proyecto</td>
                <td>$5000</td>
                <td>Departamento de Ventas</td>
                <td>Nivel 3</td>
                <td>85%</td>
                <td>92%</td>
                <td>177</td>   <!-- Agrega más filas según tus necesidades -->
            </tr>
                  <tr>
    <td>2</td>
    <td>Jane Smith</td>
    <td>Analista de Marketing</td>
    <td>$3500</td>
    <td>Departamento de Marketing</td>
    <td>Nivel 2</td>
    <td>78%</td>
    <td>88%</td>
    <td>166</td>
    <!-- Agrega más celdas según tus necesidades -->
</tr>

<tr>
    <td>3</td>
    <td>Carlos Rodriguez</td>
    <td>Ingeniero de Desarrollo</td>
    <td>$6000</td>
    <td>Departamento de Desarrollo</td>
    <td>Nivel 4</td>
    <td>95%</td>
    <td>75%</td>
    <td>170</td>
    <!-- Agrega más celdas según tus necesidades -->
</tr>

<tr>
    <td>4</td>
    <td>Maria Garcia</td>
    <td>Contadora</td>
    <td>$4500</td>
    <td>Departamento Financiero</td>
    <td>Nivel 3</td>
    <td>82%</td>
    <td>90%</td>
    <td>172</td>
    <!-- Agrega más celdas según tus necesidades -->
</tr>

<tr>
    <td>5</td>
    <td>Luis Hernandez</td>
    <td>Analista de Recursos Humanos</td>
    <td>$3800</td>
    <td>Recursos Humanos</td>
    <td>Nivel 2</td>
    <td>70%</td>
    <td>85%</td>
    <td>155</td>
    <!-- Agrega más celdas según tus necesidades -->
</tr>

<tr>
    <td>6</td>
    <td>Ana Martinez</td>
    <td>Gerente de Ventas</td>
    <td>$5500</td>
    <td>Departamento de Ventas</td>
    <td>Nivel 4</td>
    <td>90%</td>
    <td>88%</td>
    <td>178</td>
    <!-- Agrega más celdas según tus necesidades -->
</tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Agrega más contenidos de pestañas según sea necesario -->

  </div>
</div>

</div>
   <div class="modal fade" id="modalEliminar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<!-- Contenido del modal para eliminar -->
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <p>¿Estás seguro de que deseas eliminar al empleado "Unity Pugh"?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      <button type="button" class="btn btn-danger">Eliminar</button>
    </div>
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
