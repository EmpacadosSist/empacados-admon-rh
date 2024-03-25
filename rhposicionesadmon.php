<?php 
  require_once('layout/session.php');
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebar.php';?>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="./imagenes/iconos/Capturalog.ico">
  <link rel="apple-touch-icon" href="./imagenes/iconos/Capturalog.ico">

 


  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>


  <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
<style type="text/css">
  /* Estilos para las pestañas */
.nav-tabs .nav-link {
  color: #000; /* Cambiar el color del texto de las pestañas */
  background-color: #f8f9fa; /* Cambiar el color de fondo de las pestañas */
  border: 1px solid #dee2e6; /* Cambiar el borde de las pestañas */
}

.nav-tabs .nav-link.active {
  color: #fff; /* Cambiar el color del texto de la pestaña activa */
  background-color: #007bff; /* Cambiar el color de fondo de la pestaña activa */
  border-color: #007bff; /* Cambiar el color del borde de la pestaña activa */
}

/* Estilos para las tablas */
.table {
  width: 100%; /* Hacer que la tabla ocupe todo el ancho disponible */
}

.table th,
.table td {
  border: 1px solid #dee2e6; /* Añadir bordes a las celdas de la tabla */
  padding: .75rem; /* Añadir espaciado interno a las celdas de la tabla */
  vertical-align: top; /* Alinear verticalmente el contenido de las celdas */
}

.table th {
  background-color: #f8f9fa; /* Cambiar el color de fondo de las celdas de encabezado */
}
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Lista Empleados Empacados</title>
</head>


  <main id="main" class="main">

<!-- Modal -->
<div id="modalEmpleado" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Empleado Semanal o Quincenal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->
        <div class="mb-3">
          <label for="tipoEmpleado" class="form-label">Tipo de Empleado:</label>
          <select class="form-select" id="tipoEmpleado">
            <option value="semanal">Empleado Semanal</option>
            <option value="quincenal">Empleado Quincenal</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


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
  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Script para inicializar DataTables -->
<script>
  $(document).ready(function () {
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
    // Datos de ejemplo de empleados
    var datosEmpleados = [
      { nombre: 'Juan', posicion: 'Gerente', salario: '$5000', estado: 'Alta' },
      { nombre: 'María', posicion: 'Asistente', salario: '$3000', estado: 'Alta' },
      { nombre: 'Pedro', posicion: 'Técnico', salario: '$4000', estado: 'Baja' },
      { nombre: 'Ana', posicion: 'Contador', salario: '$4500', estado: 'No contratado' },
      { nombre: 'Luis', posicion: 'Desarrollador', salario: '$4500', estado: 'Alta' },
      { nombre: 'Laura', posicion: 'Recursos Humanos', salario: '$3800', estado: 'Baja' }
    ];

    // Iterar sobre los datos de los empleados y agregar filas a la tabla
    $.each(datosEmpleados, function (i, empleado) {
      $('#tablaEmpleados tbody').append('<tr>' +
        '<td>' + empleado.nombre + '</td>' +
        '<td>' + empleado.posicion + '</td>' +
        '<td>' + empleado.salario + '</td>' +
        '<td>' + empleado.estado + '</td>' +
        '</tr>');
    });

    // Inicializar DataTables
    $('#tablaEmpleados').DataTable();
  });
</script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
