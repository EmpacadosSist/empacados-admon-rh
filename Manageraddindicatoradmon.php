<?php
require 'nav.php';
?>

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

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bx bxs-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    <!-- aqui inicia sidebar -->



    
    <!-- aqui inicia sidebar -->


    <!-- aqui inicia sidebar -->



         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-user-follow-fill"></i><span>Manager</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        

        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
         <li>
            <a class="bi bi-person-fill-add"  href="rhaltaempleadoadmon.php">
              <i  ></i><span>Alta Empleados</span>
            </a>
          <li>
          <li >
            <a  class="bi bi-people-fill"  href="tables-data.php">
              <i ></i><span>Empleados</span>
            </a>
          </li>
        </ul>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li >
            <a  class="bi bi-person-vcard-fill"  href="rhposicionesadmon.php">
              <i ></i><span>Posiciones</span>
            </a>
          </li>
           <li>
            <a class="bi bi-diagram-3-fill"  href="rhorganigramaadmon.php">
              <i  ></i><span>Organigrama</span>
            </a>
          </li>
        </ul>  

      </li><!-- End Components Nav -->


       <li class="nav-item">
     <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-bar-chart-grouped-line"></i><span>Mi Scorecard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">      
          
         <li>
            <a class="bi bi-graph-up-arrow"  href="ManagerScoreadmon.php">
              <i  ></i><span>Indicadores</span>
            </a>
          <li>
          <li >
            <a  class="bi bi-bar-chart-line-fill"  href="Managerindicadoresadmon.php">
              <i  ></i><span>Indicadores</span>
            </a>
          </li>
            <li >
            <a  class="bi bi-person-bounding-box "  href="Managerempleadosadmon.php">
              <i  ></i><span>Empleados</span>
            </a>
          </li>
           <li >
            <a  class="bi bi-file-bar-graph active"  href="Manageraddindicatoradmon.php">
              <i  ></i><span>Añadir Indicador</span>
            </a>
          </li>  
          <li >
            <a  class="bi bi-table"  href="Managerrulesadmon.php">
              <i  ></i><span>Tablas-Bonos</span>
            </a>
          </li>
          <li>
            <a  class="bi bi-rulers"  href="rhposicionesadmon.php">
              <i  ></i><span>Reglas del Bono</span>
            </a>
          </li>

          <li >
            <a  class="bi bi-calendar-minus-fill"  href="Managerscoremensualadmon.php">
              <i  ></i><span>Scorecard Mensual</span>
            </a>
          </li>
           <li >
            <a  class="bi bi-currency-exchange"  href="Managerpayadmon.php">
              <i  ></i><span>Pagos</span>
            </a>
          </li>
           <li >
            <a  class="bi bi-person-arms-up"  href="Managertargetadmon.php">
              <i  ></i><span>Agregar Objetivo
              </span>
            </a>
          </li>
            <li >
            <a  class="bi bi-clipboard2-check-fill "  href="Managercheckaladmon.php">
              <i  ></i><span>Revisión General
              </span>
            </a>
          </li>
            <li >
            <a  class="bi bi-geo-alt-fill"  href="Manageraddtargetadmon.php">
              <i  ></i><span>Asignar Objetivos
              </span>
            </a>
          </li>
           <li >
            <a  class="bi bi-speedometer"  href="Managerresultadmon.php">
              <i  ></i><span>Resultados
              </span>
            </a>
          </li>
           <li >
            <a  class="bi bi-file-earmark-post"  href="Managerresultpercentadmon.php">
              <i  ></i><span>Promedios de Resultados
              </span>
            </a>
          </li>
           <li >
            <a  class="bi bi-file-earmark-bar-graph-fill"  href="Manageraverageadmon.php">
              <i  ></i><span>Promedios
              </span>
            </a>
          </li>
          
        </ul>
     

      </li>




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

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
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Indicadores</a>
    </li>
   
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
    

    <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
      <div class="table-responsive">
        <br>
               <table class="table table-striped table-bordered" id="tablaPestana1">
          <!-- Contenido de la tabla -->
      <div class="formulario">
    <div class="campo-group">
        <label for="campo1">Nombre de indicador:</label>
        <input type="text" id="campo1" name="campo1" required>
    </div>

     <div class="campo-group">
        <label for="selectCampo">Formato:</label>
        <select id="selectCampo" name="selectCampo" required>
            <option value="opcion1">Moneda</option>
            <option value="opcion2">Fraccion</option>
            <option value="opcion3">Contabilidad</option>
        </select>
    </div>

    <div class="campo-group">
        <label for="campo3">Real:</label>
        <input type="text" id="campo3" name="campo3" required>
    </div>

    <div class="campo-group">
        <label for="campo4">Objetivo:</label>
        <input type="text" id="campo4" name="campo4" required>
    </div>

      <div class="campo-group" >
        <label for="comentarios">Comentarios:</label>
        <textarea id="comentarios" name="comentarios" required></textarea>
    </div>
    </div>
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
    $(document).ready(function() {
        // Manejar el click en el botón de guardar alta empleado
        $("#btnGuardarAltaEmpleado").click(function() {
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
