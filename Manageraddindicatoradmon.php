<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>
<style>
  /* Estilos para reducir el tamaño de la tabla */
  .table-sm th,
  .table-sm td {
    padding: 0.4rem;
  }

  .table-responsive {
    max-width: 100%;
    overflow-x: auto;
    margin-bottom: 15px;
  }

  /* Estilos adicionales para hacer la tabla más compacta */
  .table {
    font-size: 12px;
  }

  .table th,
  .table td {
    text-align: center;
  }
</style>


<style>
  .formulario {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .campo-group {
    margin-bottom: 15px;
    width: 48%;
  }

  .formulario label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .formulario input,
  .formulario textarea {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
  }

  .campo-comentarios textarea {
    resize: vertical;
  }

  .formulario select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
    font-size: 14px;
  }

  .formulario select:focus {
    border-color: #4CAF50;
    outline: none;
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
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Indicadores</a>
        </li>

        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->


        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
          <div class="row mt-3">
            <div class="col">
              <label for="campo1">Nombre de indicador:</label>
              <input class="form-control" type="text">
            </div>
            <div class="col">
              <label for="selectCampo">Formato:</label>
              <select id="selectCampo" name="selectCampo" class="form-select" required>
                <option value="opcion1">Moneda</option>
                <option value="opcion2">Fraccion</option>
                <option value="opcion3">Contabilidad</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="campo1">Real:</label>
              <input class="form-control" type="text">
            </div>
            <div class="col">
              <label for="campo1">Objetivo:</label>
              <input class="form-control" type="text">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="comentarios">Comentarios:</label>
              <textarea id="comentarios" name="comentarios" class="form-control" required></textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
              <button class="btn btn-primary form-control">Guardar</button>
            </div>
            <div class="col-3"></div>
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
      $(document).ready(function () {
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

  <!-- Modal para alta empleado -->
  <div class="modal fade" id="modalAltaEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alta Empleado</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Formulario para ingresar los datos del nuevo empleado -->
          <form id="formAltaEmpleado">
            <!-- Agrega aquí los campos del formulario según tus necesidades -->
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <!-- Agrega más campos según tus necesidades -->

            <!-- Botón para guardar el nuevo empleado -->
            <button type="button" class="btn btn-primary" id="btnGuardarAltaEmpleado">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      // Manejar el click en el botón de guardar alta empleado
      $("#btnGuardarAltaEmpleado").click(function () {
        // Obtener los valores del formulario
        var nombre = $("#nombre").val();

        // Validar que el nombre no esté vacío
        if (nombre.trim() === "") {
          alert("Por favor, ingresa el nombre del empleado.");
          return;
        }

        // Agregar una nueva fila a la tabla con los datos ingresados
        var nuevaFila = "<tr>" +
          "<td>Nuevo ID</td>" +
          "<td>" + nombre + "</td>" +
          "<td>Nuevo Nivel</td>" +
          "<td>Nuevo Puesto</td>" +
          "<td>Nueva Fecha</td>" +
          "<td>Nuevo Correo</td>" +
          "<td><input type='number' id='numero' name='numero' min='1' max='100'></td>" +
          "<td>" +
          "<button type='button' class='btn btn-primary'>" +
          "<i class='bi bi-pencil-square'></i>" +
          "</button>" +
          "<button type='button' class='btn btn-danger'>" +
          "<i class='bi bi-trash-fill'></i>" +
          "</button>" +
          "</td>" +
          "</tr>";

        // Agregar la nueva fila al cuerpo de la tabla
        $("#tablaPestana1 tbody").append(nuevaFila);

        // Cerrar el modal
        $("#modalAltaEmpleado").modal("hide");
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>