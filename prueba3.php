
<?php
require 'nav.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

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




         <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-user-follow-fill"></i><span>Manager</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">      
           <li>
            <a class="bi bi-person-fill-add"  href="rhaltaempleadoadmon.php">
              <i  ></i><span>Alta Empleados</span>
            </a>
          <li>
          <li>
              <a class="bi bi-people-fill active"  href="tables-data.php">
              <i  ></i><span>Empleados</span>
            </a>

          </li>
           <li>
            <a class="bi bi-person-vcard-fill"  href="rhposicionesadmon.php">
              <i  ></i><span>Posiciones</span>
            </a>
          </li>
           <li>
            <a class="bi bi-diagram-3-fill"  href="rhorganigramaadmon.php">
              <i  ></i><span>Organigrama</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->



    
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Trabajador</title>
  <!-- Incluir Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

</head>
<style type="text/css">
  .container {
    width: 98%;
    padding-right: -26px;
    padding-left: 86px;
    margin-right: auto;
    margin-left: auto;
}
.mt-5, .my-5 {
    margin-top: 7rem!important;
}
</style>
<body> 


  <main id="main" class="main">
     <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

<div class="container mt-5" align="left">
  <h2 class="mb-4">Formulario de Trabajador</h2>
<form method="post" action="pdfpuesto.php"  target="_blank">
      <!-- Sección 1: Información Personal -->
      <h4>Información Laboral</h4>
      <div class="form-row  ">
        <div class="form-group col-md-3">
           <label for="employeeNumber"><i class="fas fa-id-card"></i> No. de empleado</label>
            <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" inputmode="numeric" pattern="[0-9]+" >
        </div>
        <div class="form-group col-md-3">
           <label for="lastName"><i class="fas fa-user"></i> Apellido Paterno</label>
              <input type="text" class="form-control" id="lastName" name="lastName" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
         <div class="form-group col-md-3">
           <label for="secondName"><i class="fas fa-user"></i> Apellido Materno</label>
              <input type="text" class="form-control" id="secondName" name="secondName" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
        <div class="form-group col-md-3">
          <label for="name"><i class="fas fa-user"></i> Nombre(s)</label>
          <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
        <div class="form-group col-md-3">
          <label for="age"><i class="fas fa-birthday-cake"></i> Edad</label>
          <input type="text" class="form-control" id="age" name="age" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
         <div class="form-group col-md-3">
          <label for="datebirthday"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
          <input type="text" class="form-control" id="datebirthday" name="datebirthday" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
            </div>
          <div class="form-group col-md-3">
              <label for="placebirth"><i class="fas fa-map-marker-alt"></i> Lugar de nacimiento</label>
              <input type="text" class="form-control" id="placebirth" name="placebirth" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
          </div>
          <div class="form-group col-md-3">
              <label for="sex"><i class="fas fa-venus-mars"></i> Sexo</label>
              <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
          </div>
        <!-- Agrega más campos según sea necesario -->
      </div>
      <div class="form-row">
      <div class="form-group col-md-3">
          <label for="dateadmission"><i class="fas fa-calendar-alt"></i> Fecha de Ingreso</label>
          <input type="date" class="form-control" id="dateadmission" name="dateadmission" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>



      

        <div class="form-group col-md-6">
          <label for="work_area"><i class="fas fa-building"></i> Área</label>
          <select class="form-control" id="work_area" name="work_area" onchange="updateDepartments()">
            <option value="Operaciones" id="Operaciones">Operaciones</option>
            <option value="Admón">Administración</option>
            <option value="Comercial">Comercial</option>
          </select>
        </div>

        <div class="form-group col-md-3">
         <label for="department"><i class="fas fa-building"></i> Departamento</label>
            <select class="form-control" id="department" name="department" onchange="updatePositions()">
              <option value="Admon">Administración</option>
              <option value="Almacen">Almacén</option>
              <option value="Autoservicios">Autoservicios</option>
              <option  id="Operaciones" value="Calidad">Calidad</option>
              <option value="Comercial">Comercial</option>
              <option value="Compras">Compras</option>
              <option value="Contabilidad">Contabilidad</option>
              <option value="Desarrollo">Desarrollo</option>
              <option  id="Operaciones" value="Distribuccion">Distribución</option>
              <option value="Industrial">Industrial</option>
              <option value="Institucional">Institucional</option>
              <option value="Mercadotecnia">Mercadotecnia</option>
              <option value="Produccion">Producción</option>
              <option value="RH">Recursos Humanos</option>
              <option value="Sistemas">Sistemas</option>
              <option value="Ventas">Ventas</option>
            </select>        
        </div>

        <div class="form-group col-md-5">
        <label for="position"><i class="fas fa-user-tie"></i> Puesto</label>
        <select class="form-control" id="position" name="position">
          <option value="analista_capacitacion">Analista de Capacitación</option>
          <option value="analista_compras_internacionales">Analista de Compras Internacionales</option>
          <option value="analista_contable">Analista Contable</option>
          <option value="analista_creditos">Analista de Créditos</option>
          <option value="analista_facturacion">Analista de Facturación</option>
          <option value="analista_fiscal">Analista Fiscal</option>
          <option value="analista_inventarios">Analista de Inventarios</option>
          <option value="analista_microbiologia">Analista de Microbiología</option>
          <option value="analista_reclutamiento">Analista de Reclutamiento</option>
          <option value="analista_rh">Analista de Recursos Humanos</option>
          <option value="analista_tesoreria">Analista Tesorería y Contabilidad</option>
          <option value="analista_inteligencia_mercados">Analista de Inteligencia de Mercados</option>
          <option value="auditor_fiscal">Auditor Fiscal</option>
          <option value="auditor_inventarios">Auditor de Inventarios</option>
          <option value="auxiliar_contable">Auxiliar Contable</option>
          <option value="auxiliar_satisfaccion_cliente_mty">Auxiliar Satisfacción al Cliente Monterrey</option>
          <option value="coordinacion_seguridad_higiene">Coordinación Seguridad de Higiene</option>
          <option value="coordinador_amp">Coordinador AMP</option>
          <option value="coordinador_apt">Coordinador APT</option>
          <option value="cordinadora_nacional">Cordinadora Nacional</option>
          <option value="director_administrativo">Director Administrativo</option>
          <option value="director_comercial">Director Comercial</option>
          <option value="director_industria">Director Industrial</option>
          <option value="director_operaciones">Director de Operaciones</option>
          <option value="disenador">Diseñador</option>
          <option value="digital_content_manager">Digital Content Manager</option>
          <option value="ingeniero_sistemas">Ingeniero Sistemas</option>
          <option value="gerentenacionaretail">Gerente Nacional Retail</option>
          <option value="ingeniero_innovacion_desarrollo">Ingeniero de Innovación & Desarrollo</option>
          <option value="ingeniero_jr_innovacion_desarrollo">Ingeniero Jr de Innovación & Desarrollo</option>
          <option value="inspector_calidad_materia_prima">Inspector de Calidad en Materia Prima</option>
          <option value="inspector_calidad_procesos">Inspector de Calidad en Procesos</option>
          <option value="kae_Centro">KAE Centro</option>
          <option value="kae_Norte">KAE Norte</option>
          <option value="kae_cadenas_regionales">KAE Cadenas Regionales</option>
          <option value="kae_industrial_cdmx">KAE Industrial CDMX</option>
          <option value="kae_industrial_guadalajara">KAE Industrial Guadalajara</option>
          <option value="kae_industrial_norte">KAE Industrial Norte</option>
          <option value="kae_institucional">KAE Institucional</option>
          <option value="lider_desarrollo">Líder Innovación y Desarrollo</option>
          <option value="lider_calidad_inocuidad">Líder de Calidad e Inocuidad</option>
          <option value="lider_contabilidad">Líder de Contabilidad</option>
          <option value="lider_cyc">Líder de Crédito y Cobranza</option>
          <option value="lider_export">Líder Export y Conveniencia</option>
          <option value="lider_experiencia_cliente">Líder Experiencia del Cliente</option>
          <option value="lider_fiscal">Líder Fiscal</option>
          <option value="lider_Compras_Nacional_Planeación">Líder de Compras Nacional y Planeación</option>
          <option value="lider_inmobiliaria">Líder de Inmobiliaria</option>
          <option value="lider_mantenimiento_ingenieria">Líder de Mantenimiento e Ingeniería</option>
          <option value="supervisormantenimiento">Supervisor de Mantenimiento</option>
          <option value="staffmantenimiento_ingenieria">Staff de Mantenimiento e Ingeniería</option>
          <option value="lider_marketing">Líder Marketing</option>
           <option value="supervisor_produccion">Supervisor de Producción</option>
          <option value="lider_produccion">Líder de Producción</option>
          <option value="lider_ventas_mayoreo">Líder Ventas Mayoreo</option>
          <option value="lider_trade_marketing">Trade Marketing</option>
          <option value="lider_trade">Líder Trade</option>
          <option value="lider_staff_contabilidad">Staff de Contabilidad</option>
           <option value="lider_staff_servicio">Líder Coordinación de Servicio</option>
          <option value="lider_staff_facturacion">Líder Staff de Facturación</option>
          <option value="master_planner_produccion">Master Planner Producción</option>
          <option value="staff_calidad_inocuidad_mip">Staff de Calidad e Inocuidad MIP</option>
          <option value="staff_calidad_inocuidad_sgc">Staff de Calidad e Inocuidad SGC</option>
          <option value="staff_distribucion_general">Staff de Distribución General</option>
          <option value="staff_distribucion_institucional">Staff de Distribución Institucional</option>
          <option value="staff_distribucion_mayoreo">Staff de Distribución Mayoreo</option>
          <option value="staff_industrial">Staff de Industrial</option>
          <option value="staff_produccion">Staff de Producción</option>
          <option value="planner_comercial">Planner Comercial</option>
          <option value="lídertrademarketing">Líder Trade Marketing</option>
          <option value="staff_retail_distribucion">Staff de Retail Distribución</option>
          <option value="staff_servicio">Staff de Servicio</option>
          <option value="supervisor_cdmx_jalisco_quintana_roo_san_luis">Supervisor CDMX,Jalisco, Quintana Roo y San Luis</option>
          <option value="lider_almacenes">Lider de Almacenes</option>
          <option value="supervisor_cdmx_puebla_queretaro_tabasco">Supervisor CDMX, Puebla, Queretaro y Tabasco</option>
          <option value="supervisor_guadalajara_culiacan_bcnorte_bcsur">Supervisor Guadalajara, Culiacan y BC Norte y Sur</option>
          <option value="supervisor_mty_coahuila_tampico">Supervisor MTY, Coahuila y Tampico</option>
          <option value="supervisor_mty_linares_carbonifera">Supervisor MTY, Linares y Carbonífera</option>
          <option value="vendedor_centro">Vendedor Centro</option>
          <option value="vendedor_chihuahua">Vendedor Chihuahua</option>
          <option value="vendedor_guadalajara">Vendedor Guadalajara</option>
          <option value="vendedor_monterrey_carbonifera">Vendedor Monterrey-Carbonífera</option>
          <option value="vendedor_monterrey_la_costa">Vendedor Monterrey La Costa</option>
          <option value="analista_calidad">Analista de Calidad</option>
          <option value="lidercalidadinocuidad">Lider Calidad e Inocuidad</option>
          <option value="liderdedistribuccion">Lider de Distribución</option>
    </select>    
          </div>

    
        <div class="form-group col-md-3">
         <label for="Costs"><i class="fas fa-dollar-sign"></i> Centro de Costos</label>
          <select class="form-control" id="Costs" name="Costs" on>
                <option value="ONLINE">ON LINE</option>
                <option value="MTRY1">MTRY 1</option>
                <option value="MAYORISTAS">MAYORISTAS</option>
                <option value="KAEDF">KAE DF</option>
                <option value="INDNTE">INDNTE</option>
                <option value="INACTIVOS">INACTIVOS</option>
                <option value="H2H">H2H</option>
                <option value="FLETISTA">FLETISTA</option>
                <option value="FILIALES">FILIALES</option>
                <option value="EMPES">EMPES</option>
                <option value="EMINSTIT">EMINSTIT</option>
                <option value="COWEX">COWEX</option>
                <option value="COVDM">COVDM</option>
                <option value="COTAMP">COTAMP</option>
                <option value="COSAN">COSAN</option>
                <option value="COSAM">COSAM</option>
                <option value="COSAL">COSAL</option>
                <option value="CORIB">CORIB</option>
                <option value="CORBI">CORBI</option>
                <option value="CONPR">CONPR</option>
                <option value="CONLA">CONLA</option>
                <option value="COMMY">COMMY</option>
                <option value="COMMT">COMMT</option>
                <option value="COMABAST">COMABAST</option>
                <option value="COLCO">COLCO</option>
                <option value="COLAG">COLAG</option>
                <option value="COKAM">COKAM</option>
                <option value="COINDUST">COINDUST</option>
                <option value="COGDL">COGDL</option>
                <option value="CODUR">CODUR</option>
                <option value="COCVI">COCVI</option>
                <option value="COCONVE">COCONVE</option>
                <option value="COCHI">COCHI</option>
                <option value="COCCH">COCCH</option>
                <option value="COCAS">COCAS</option>
                <option value="COCAR">COCAR</option>
                <option value="COASR">COASR</option>
                <option value="COASN">COASN</option>
                <option value="COASM">COASM</option>
                <option value="CENTRALA">CENTRALA</option>
                <option value="CARBONIFERA">CARBONIFERA</option>
                <option value="CADENAS">CADENAS</option>
                <option value="AMALI">AMALI</option>
                <option value="ALMPT">ALM PT</option>
                <option value="ADDIR">ADDIR</option>
                <option value="ADCOR">ADCOR</option>
        </select>
         </div>
     <style>
       .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
    </style>
      <div class="form-group col-md-3">
           <label for="work_contract"> Contrato
                <!-- Your HTML with the button and icon -->
                <button type="submit" id="work_contract" name="generate_contract" class="medium-button"><i class="fa-solid fa-file-pdf"></i>  Generar Contrato PDF</button>          
            </label> 
      </div>
        <!-- Agrega más campos según sea necesario -->
      </div>
      <div> <br></div>
      <!-- Sección 2: Información de personal -->
      <h4>Información de Personal</h4>
        <div class="form-row">
          <div class="form-group col-md-3">
          <label for="age"><i class="fas fa-birthday-cake"></i> Edad</label>
          <input type="text" class="form-control" id="age" name="age" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
        <div class="form-group col-md-3">
          <label for="datebirthday"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
          <input type="text" class="form-control" id="datebirthday" name="datebirthday" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
        <div class="form-group col-md-3">
          <label for="placebirth"><i class="fas fa-globe"></i> Lugar de Nacimiento</label>
          <input type="text" class="form-control" id="placebirth" name="placebirth" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>
        <div class="form-group col-md-3">
          <label for="sex"><i class="fas fa-venus-mars"></i> Sexo</label>
          <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

           <div class="form-group col-md-3">
          <label for="">Estado civil</label>
        <select class="form-control" id="" name="">
              <option value="" id="">Union Libre</option>
              <option value="">Casado(a)</option>
          </select>
          </div>
        <!-- Agrega más campos según sea necesario -->
        <div class="form-group col-md-3">
          <label for="hasChildren">¿Tiene hijos?</label>
          <input type="checkbox" class="form-check-input" id="hasChildren" name="hasChildren">
        </div>


        <div class="form-group col-md-3">
            <label for="children">Número de hijos</label>
            <input type="text" class="form-control" id="children" name="children" pattern="[0-9]+" title="Solo se permiten números">
        </div> 

          <div class="form-group col-md-3">
          <label for="socialSecurityNumber"><i class="fas fa-venus-mars"></i> Número de seguridad social</label>
          <input type="text" class="form-control" id="socialSecurityNumber" name="socialSecurityNumber" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="curp"><i class="fas fa-id-card"></i> CURP</label>
          <input type="text" class="form-control" id="curp" name="curp" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="rfc"><i class="fa-solid fa-id-card-clip"></i></i> RFC</label>
          <input type="text" class="form-control" id="rfc" name="rfc" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="rfcPostalCode"><i class="fa-solid fa-passport"></i> Código postal del RFC</label>
          <input type="text" class="form-control" id="rfcPostalCode" name="rfcPostalCode" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="streetAndNumber"><i class="fas fa-map"></i> Domicilio calle y número</label>
          <input type="text" class="form-control" id="streetAndNumber" name="streetAndNumber" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="colony"><i class="fa-solid fa-map-location"></i></i> Colonia</label>
          <input type="text" class="form-control" id="colony" name="colony" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="municipality"><i class="fa-solid fa-magnifying-glass-location"></i> Municipio</label>
          <input type="text" class="form-control" id="municipality" name="municipality" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

        <div class="form-group col-md-3">
          <label for="state"><i class="fas fa-map-marker-alt"></i> Estado</label>
          <input type="text" class="form-control" id="state" name="state" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>


        <div><br><br><br><br><br></div>
          <h4>Información de Empresa</h4>
                                        <!-- Sección 3: datos de empresa -->
     <div class="form-row">
        <div class="form-group col-md-3">
         <label for="age"><i class="fas fa-tshirt"></i> Talla de Camisa</label>
          <input type="text" class="form-control" id="age" name="age" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
          </div>
      <div class="form-group col-md-3">
        <label for="datebirthday"><img src="assets/img/pantalones.png" width="20px"> Talla de Pantalón</label>
        <input type="text" class="form-control" id="datebirthday" name="datebirthday" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for="placebirth"><i class="fas fa-shoe-prints"></i> Talla de Calzado</label>
        <input type="text" class="form-control" id="placebirth" name="placebirth" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for=""><i class="fas fa-heartbeat"></i> Enfermedades Crónicas</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for=""><i class="fas fa-allergies"></i> Alergias</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for=""><i class="fas fa-pills"></i> Toma algún medicamento</label>
          <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
          <label for="emergencyContact"><i class="fas fa-phone-alt"></i> Contacto de emergencia</label>
          <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for="emergencyContact2"><i class="fas fa-phone-alt"></i> Contacto de emergencia 2</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>     
      <div class="form-group col-md-2">
        <label for=""><i class="fas fa-money-bill-wave"></i> Sueldo base</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-3">
        <label for="paymentType"><i class="fa-solid fa-coins"></i> Tipo de Pago</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
       </div>
      <div class="form-group col-md-3">
        <label for="foodAllowance"><i class="fa-solid fa-utensils"></i> Bonos de despensa</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-4">
        <label for=""><i class="fa-solid fa-piggy-bank"></i> Fondo de ahorro (Quincenales)</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
      <div class="form-group col-md-6">
        <label for=""><i class="fas fa-money-check"></i> Banco</label>
        <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
      </div>
    <div class="form-group col-md-6">
        <label for=""><i class="fa-solid fa-money-check-dollar"></i> Cuenta bancaria</label>
         <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
     </div>
        <!-- Agrega más campos según sea necesario -->
          </div>
          </div>

        </div>
      </div>
    </section>


<script>
    // JavaScript para habilitar o deshabilitar el campo de texto según el estado del checkbox
    document.getElementById('hasChildren').addEventListener('change', function() {
        var childrenInput = document.getElementById('children');
        childrenInput.disabled = !this.checked;
        if (!this.checked) {
            childrenInput.value = '';  // Limpiar el campo si el checkbox no está marcado
        }
    });
</script>

      </div>

     

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  <script>
    // Datos de ejemplo para departamentos y puestos
    var departmentsByArea = {
      'Operaciones': ['Almacen','Calidad', 'Distribución', 'Producción','Desarrollo','Mantenimiento'],
      'Admón': ['Facturación','Inventarios', 'Compras', 'Contabilidad', 'RH','Sistemas'],
      'Comercial': ['Industrial','Ventas', 'Marketing','Autoservicios','Comercial','Líder Trade Marketing','Industrial','Institucional','Mayoreo']
    };

   var positionsByDepartment = {
      'Almacen': ['Lider de Almacenes'],
      'Inventarios': ['Lider de Inventarios y Costos','Auditor de Inventarios','Analista de Inventarios'],

    
      'Sistemas': ['Ingeniero Sistemas'],

      'Desarrollo': ['Líder Innovación y Desarrollo','Ingeniero de Innovación & Desarrollo','Ingeniero Jr de Innovación & Desarrollo'],

      'Contabilidad': ['Auxiliar Contable','Auditor Fiscal','Analista Tesorería y Contabilidad','Analista Fiscal','Analista Contable', 'Líder de Contabilidad', 'Staff de Contabilidad'],

      'RH': ['Lider de Recursos Humanos','Analista de Reclutamiento','Analista de Capacitación',  'Analista de Recursos Humanos','Coordinación Seguridad de Higiene'],
      
      'Mantenimiento': ['Líder de Mantenimiento e Ingeniería','Supervisor de Mantenimiento','Staff de Mantenimiento e Ingeniería'],


      'Facturación': ['Lider Credito y Cobranza','Analista de Facturación','Analista de Créditos','Staff de Facturación'],
      'Compras':['Líder de Compras Nacional y Planeación','Analista de Compras Internacionales','Líder de Compras Internacionales','Asistente de Compras'],

      'Comercial': ['Líder Export y Conveniencia'],

      'Autoservicios': ['KAE Norte','KAE Cadenas Regionales','Gerente Nacional Retail'],

      'Mayoreo': ['Líder Ventas Mayoreo','Vendedor Monterrey La Costa','Vendedor Chihuahua','Vendedor Centro','Vendedor Guadalajara'],

      'Marketing': ['Analista de Inteligencia de Mercados','Digital Content Manager','Líder Marketing','Líder Experiencia del Cliente','Diseñador'],

      'Líder Trade Marketing': ['Líder Trade Marketing'],

      'Ventas': ['Director Comercial','Líder Coordinación de Servicio','Staff de Servicio','KAE Centro','Planner Comercial'],
      'Industrial': ['Director Industrial','KAE Industrial CDMX','KAE Industrial Guadalajara','KAE Industrial Norte','Staff de Industrial'],

       'Institucional': ['KAE Institucional'],

      'Calidad': ['Lider Calidad e Inocuidad','Staff de Calidad e Inocuidad MIP','Staff de Calidad e Inocuidad SGC','Analista de Microbiología', 'Inspector de Calidad en Procesos','Inspector de Calidad en Materia Prima'],

      'Distribución': ['Lider de Distribución', 'Staff de Distribución General', 'Staff de Distribución Institucional','Staff de Distribución Mayoreo','Staff de Retail Distribución'],

      'Producción': ['Líder de Producción','Master Planner Producción','Staff de Producción','Supervisor de Producción'],
     

};

    function updateDepartments() {
      var area = document.getElementById('work_area').value;
      var departmentSelect = document.getElementById('department');
      var positionsSelect = document.getElementById('position');

      // Limpiar opciones actuales
      departmentSelect.innerHTML = '';
      positionsSelect.innerHTML = '';

      // Agregar nuevas opciones para el departamento
      departmentsByArea[area].forEach(function (department) {
        var option = document.createElement('option');
        option.value = department;
        option.text = department;
        departmentSelect.add(option);
      });

      // Llamar a la función de actualización de puestos para inicializar los puestos
      updatePositions();
    }

    function updatePositions() {
      var department = document.getElementById('department').value;
      var positionsSelect = document.getElementById('position');

      // Limpiar opciones actuales
      positionsSelect.innerHTML = '';

      // Agregar nuevas opciones para el puesto
      positionsByDepartment[department].forEach(function (position) {
        var option = document.createElement('option');
        option.value = position;
        option.text = position;
        positionsSelect.add(option);
      });
    }

    // Llamar a la función de actualización de departamentos al cargar la página
    updateDepartments();
  </script>



  <!-- Incluir Bootstrap JS y dependencias de Popper.js y jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



</body>
</html>
