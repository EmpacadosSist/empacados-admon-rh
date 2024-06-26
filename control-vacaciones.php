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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- DataTables Bootstrap 4 JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>CONTROL DE VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->
  <body>

  <div class="container mt-4">
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="pestanas" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Pendientes</a>
      </li>
      <!-- Agrega más pestañas según sea necesario -->
      <li class="nav-item">
        <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2" aria-selected="true">Aprobados</a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" id="pestaña3" data-toggle="tab" href="#contenido3" role="tab" aria-controls="contenido3" aria-selected="true">Ausentes</a>
      </li>             
    </ul>
    <br>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="contenidoPestanas">
      <!-- Contenido de la Pestaña 1 -->
      <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>       
                <th>Rechazar</th>
                <th>Aprobar</th>
              </tr>                
            </thead>
            <tbody>
              <tr>
                <td>105207</td>
                <td>Roberto Carlos Reyes Medrano</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button></td>
                <td class="text-center"><button class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button></td>
              </tr>    
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button></td>
                <td class="text-center"><button class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button></td>
              </tr>                        
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
      <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable2">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>    
                <th>Revertir</th>   
              </tr>                
            </thead>
            <tbody>
              <tr>
                <td>105207</td>
                <td>Roberto Carlos Reyes Medrano</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-arrow-left-circle-fill"></i></button></td>
              </tr>    
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-arrow-left-circle-fill"></i></i></button></td>
              </tr>                        
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido3" role="tabpanel" aria-labelledby="pestaña3">
      <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable3">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>       
              </tr>                
            </thead>
            <tbody>
              <tr>
                <td>105207</td>
                <td>Roberto Carlos Reyes Medrano</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
              </tr>    
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
              </tr>                        
            </tbody>
          </table>
        </div>
      </div>      
    </div>
  </div>






  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $(document).ready(function () {
        let objOptions={
          lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
          language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
          }          
        };

        var table1 = $('#myTable').DataTable(objOptions);
        var table2 = $('#myTable2').DataTable(objOptions);
        var table3 = $('#myTable3').DataTable(objOptions);                  
        
        
      });
    </script>
  </body>

</html>