<?php
require 'nav.php';
?>

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
            <a  class="bi bi-file-bar-graph "  href="Manageraddindicatoradmon.php">
              <i  ></i><span>Añadir Indicador</span>
            </a>
          </li>
      <li >
            <a  class="bi bi-table"  href="Managerrulesadmon.php">
              <i  ></i><span>Tablas-Bonos</span>
            </a>
          </li>
          <li>
            <a  class="bi bi-rulers"  href="Managerrulestableadmon.php">
              <i  ></i><span>Reglas del Bono</span>
            </a>
          </li>

          <li >
            <a  class="bi bi-calendar-minus-fill"  href="Managerscoremensualadmon.php">
              <i  ></i><span>Scorecard Mensual</span>
            </a>
          </li>
           <li >
            <a  class="bi bi-currency-exchange "  href="Managerpayadmon.php">
              <i  ></i><span>Pagos</span>
            </a>
          </li>
           <li >
            <a  class="bi bi-person-arms-up "  href="Managertargetadmon.php">
              <i  ></i><span>Agregar Objetivo
              </span>
            </a>
          </li>
            <li >
            <a  class="bi bi-clipboard2-check-fill active "  href="Managercheckaladmon.php">
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

