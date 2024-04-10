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


    <?php if(Utils::buscarPermiso(3)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-user-follow-fill"></i><span>Manager</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a class="bi bi-person-fill-add" href="rhaltaempleadoadmon.php">
            <i></i><span>Alta Empleados</span>
          </a>
        </li>
        <li>
          <a class="bi bi-person-fill-down" href="rhbajaempleadoadmon.php">
            <i></i><span>Baja Empleados</span>
          </a>
        </li>
        <li>
          <a class="bi bi-people-fill" href="empleados.php">
            <i></i><span>Empleados</span>
          </a>
        </li>
        <li>
               <a href="rhvacations.php">
                <img src="assets/img/beach.png" alt="" width="18">
                   <i></i>
                   <span>Vacaciones</span>
             </a>
          </li>
        <li>
          <a class="bi bi-person-vcard-fill" href="rhposicionesadmon.php">
            <i></i><span>Posiciones</span>
          </a>
        </li>
        <li>
          <a class="bi bi-diagram-3-fill" href="rhorganigramaadmon.php">
            <i></i><span>Organigrama</span>
          </a>
        </li>
      </ul>

    </li><!-- End Components Nav -->
    <?php endif; ?>

    <li class="nav-item">
      <a class="nav-link collapsed" href="Miscorecard.php">
        <i class="bi bi-graph-up-arrow"></i><span>Mi Scorecard</span>
      </a>
    </li>

    <?php if(Utils::buscarPermiso(1)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="Managerindicadoresadmon.php">
        <i class="bi bi-bar-chart-line-fill"></i>
        <span>Indicadores</span>
      </a>
    </li>
    <?php endif; ?>

    <?php if(Utils::buscarPermiso(6)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-obj" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bullseye"></i><span>Objetivos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-obj" class="nav-content collapse" data-bs-parent="#sidebar-nav">

        <li>
          <a class="bi bi-person-arms-up " href="Managertargetadmon.php">
            <i></i><span>Agregar Objetivo
            </span>
          </a>
        </li>
        <li>
          <a class="bi bi-clipboard2-check-fill  " href="Managercheckaladmon.php">
            <i></i><span>Revisión General
            </span>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>

    <?php if(Utils::buscarPermiso(2)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="Managerrulestableadmon.php">
        <i class="bi bi-rulers"></i><span>Reglas de Bono</span>
      </a>
    </li>
    <?php endif; ?>    

    <li class="nav-item">
      <a class="nav-link collapsed" href="Managerscoremensualadmon.php">
        <i class="bi bi-calendar-minus-fill"></i><span>Scorecard Mensual</span>
      </a>
    </li>

    <?php if(Utils::buscarPermiso(5)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="Managerpayadmon.php">
        <i class="bi bi-currency-exchange"></i><span>Pagos</span>
      </a>
    </li>
    <?php endif; ?>    

    <?php if(Utils::buscarPermiso(7)): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-res" data-bs-toggle="collapse" href="Managerresultadmon.php">
        <i class="bi bi-speedometer" ></i><span>Resultados</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-res" class="nav-content collapse" data-bs-parent="#sidebar-nav">

        <li>
          <a class="bi bi-person-arms-up " href="#">
            <i></i><span>Area 1
            </span>
          </a>
        </li>
        <li>
          <a class="bi bi-person-arms-up " href="#">
            <i></i><span>Area 2
            </span>
          </a>
        </li>
        <li>
          <a class="bi bi-person-arms-up " href="#">
            <i></i><span>Area 3
            </span>
          </a>
        </li>    
        <li>
          <a class="bi bi-person-arms-up " href="#">
            <i></i><span>Promedios
            </span>
          </a>
        </li>            
      </ul>      
    </li>
    <?php endif; ?>
    <!--
    <li class="nav-item">
      <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-bar-chart-grouped-line"></i><span>Otros</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

        <li>
          <a class="bi bi-file-earmark-bar-graph-fill" href="Managergraphicsadmon.php">
            <i></i><span>Mis Graficas</span>
          </a>
        </li>

        
       <li>
            <a class="bi bi-graph-up-arrow"  href="ManagerScoreadmon.php">
              <i  ></i><span>Mi Scorecard</span>
            </a>
        </li>

            <li >
              <a  class="bi bi-bar-chart-line-fill"  href="Managerindicadoresadmon.php">
                <i  ></i><span>Indicadores</span>
              </a>
            </li>
          

        <li>
          <a class="bi bi-person-bounding-box " href="Managerempleadosadmon.php">
            <i></i><span>Empleados</span>
          </a>
        </li>
        <li>
          <a class="bi bi-file-bar-graph " href="Manageraddindicatoradmon.php">
            <i></i><span>Añadir Indicador</span>
          </a>
        </li>
        
          <li >
            <a class="bi bi-table"  href="Managerrulesadmon.php">
          <i></i><span>Tablas-Bonos</span>
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
          <li>
            <a class="bi bi-person-arms-up " href="Managertargetadmon.php">
              <i></i><span>Agregar Objetivo
              </span>
            </a>
          </li>
          <li>
            <a class="bi bi-clipboard2-check-fill  " href="Managercheckaladmon.php">
              <i></i><span>Revisión General
              </span>
            </a>
          </li>
        
        <li>
          <a class="bi bi-geo-alt-fill" href="Manageraddtargetadmon.php">
            <i></i><span>Asignar Objetivos
            </span>
          </a>
        </li>
        

          <li>
            <a class="bi bi-speedometer" href="Managerresultadmon.php">
              <i></i><span>Resultados
              </span>
            </a>
          </li>
        

        <li>
          <a class="bi bi-file-earmark-post" href="Managerresultpercentadmon.php">
            <i></i><span>Promedios de Resultados
            </span>
          </a>
        </li>
        <li>
          <a class="bi bi-file-earmark-bar-graph-fill" href="Manageraverageadmon.php">
            <i></i><span>Promedios
            </span>
          </a>
        </li>
      </ul>


    </li>
    -->


    <!--

      <li class="nav-heading">Pages</li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> End Profile Page Nav 
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li> End F.A.Q Page Nav 

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> End Contact Page Nav 
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> End Register Page Nav 
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li> End Login Page Nav 
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> End Error 404 Page Nav 
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li> End Blank Page Nav 
    -->      

  </ul>

</aside><!-- End Sidebar-->



<!-- PRUEBA JAVASCRIPT-->
<script>
  // Definir una variable
  var texto = window.location.pathname;
  // Recortar los primeros 5 caracteres
  var resultado = texto.substring(20);
  console.log(resultado); // Salida: "Hola,"
  // Obtener la ruta de la página actual
  // Obtener todos los elementos de la lista
  var sidebarLinks = document.querySelectorAll('#sidebar-nav a');
  // Iterar sobre los elementos y agregar la clase 'active' si coincide con la página actual
  console.log(sidebarLinks);
  sidebarLinks.forEach(function (link) {
    if (link.getAttribute('href') === resultado) {
      link.classList.add('active');
    }
  });
</script>