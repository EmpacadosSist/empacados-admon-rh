<?php 
  require_once('layout/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baja de Empleados Empacados</title>
</head>  <!-- Incluir Bootstrap CSS -->
<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require 'layout/sidebar.php';?>

<style type="text/css">
  .h4, h4 {
    font-size: 2rem;
}
 .container {
    width: 100%;
    padding-right: 13px;
    padding-left: 25px;
    margin-right: 28px;
    margin-left: -2px;
}
.mt-5, .my-5 {
    margin-top: 0rem!important;
}
body {
        font-family: "Open Sans", sans-serif;
        background: #052668;
        color: 'black;';
    }
.card-title {
    padding: -3px 0 19px 0;
    font-size: 34px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
        padding: -4px 0 15px 0;
}
   .title-container img {
            margin: 0 10px; /* Margen entre las imágenes y el texto */
            vertical-align: middle; /* Alineación vertical con el texto */
        }
  .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        /* background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
</style>
<style type="text/css">
  .h4, h4 {
    font-size: 2rem;
}
 .container {
    width: 100%;
    padding-right: 13px;
    padding-left: 25px;
    margin-right: 28px;
    margin-left: -2px;
}
.mt-5, .my-5 {
    margin-top: 0rem!important;
}
body {
        font-family: "Open Sans", sans-serif;
        background: #052668;
        color: 'black;';
    }
.card-title {
    padding: -3px 0 19px 0;
    font-size: 34px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
        padding: -4px 0 15px 0;
}
   .title-container img {
            margin: 0 10px; /* Margen entre las imágenes y el texto */
            vertical-align: middle; /* Alineación vertical con el texto */
        }
  .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        /* background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
</style>
<body> 

   <main id="main" class="main">
    <section class="section"> 
      
      <div class="row">
        <div class="col-lg-12">

          <div class="card">   
                      
            <div class="card-body">
                  <div style="float: right;">
                    <p>
                    <p>
         <div class="corner-container">
    <img src="assets/img/arroz12.png" width="200" height="50" alt="Arroz" id="as">
  </div>
    </div>
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Vacaciones de mis Empleados
                <img style="text-align: center;" src="assets/img/ecluir.gif" width="50" alt=""></h2>
                  <div>
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
          <input type="text" class="form-control" id="dateadmission" name="dateadmission" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
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

    
        <div class="form-group col-md-4">
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
   
        <!-- Agrega más campos según sea necesario -->
      </div>
      
       <h2  align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">
          
          Información de Baja Personal
           <img src="assets/img/cancelar.gif" alt="" width="60">
       </h2> 
        <div class="form-row">
           <div class="form-group col-md-3">
          <label for="datedownpersonal"><i class="fas fa-calendar-alt"></i> Fecha de Baja</label>
          <input type="date" class="form-control" id="datedownpersonal" name="datedownpersonal" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
        </div>

      <div class="form-group col-md-3">
      <label for="datebirthday"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
      <input type="date" class="form-control" id="datebirthday" name="datebirthday">
    </div>

    <div class="form-group col-md-6">
      <label for="motivo_separacion"><i class="fas fa-sign-out-alt"></i> Motivo de Separación</label>
      <input type="text" class="form-control" id="motivo_separacion" name="motivo_separacion">
    </div>

    <div class="form-group col-md-3">
      <label for="recontratable"><i class="fas fa-undo-alt"></i> Recontratable</label>
      <select class="form-control" id="recontratable" name="recontratable">
        <option value="si">Sí</option>
        <option value="no">No</option>
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="rfc"><i class="fas fa-id-badge"></i> RFC</label>
      <input type="text" class="form-control" id="rfc" name="rfc">
    </div>

    <div class="form-group col-md-4">
      <label for="cp_rfc"><i class="fas fa-map-marker-alt"></i> C.P. del RFC</label>
      <input type="text" class="form-control" id="cp_rfc" name="cp_rfc">
    </div>

    <div class="form-group col-md-4">
      <label for="sueldo_base"><i class="fas fa-dollar-sign"></i> Sueldo Base</label>
      <input type="text" class="form-control" id="sueldo_base" name="sueldo_base">
    </div>

    <div class="form-group col-md-4">
      <label for="bonos_despensa"><i class="fas fa-gift"></i> Bonos de Despensa</label>
      <input type="text" class="form-control" id="bonos_despensa" name="bonos_despensa">
    </div>

    <div class="form-group col-md-4">
      <label for="fondo_ahorro"><i class="fas fa-piggy-bank"></i> Fondo de Ahorro (quincenal)</label>
      <input type="text" class="form-control" id="fondo_ahorro" name="fondo_ahorro">
    </div>

    <div class="form-group col-md-12">
      <label for="comentarios"><i class="fas fa-comments"></i> Comentarios</label>
      <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
    </div>


        <div><br><br><br><br><br></div>
    
          </div>

        </div>
      </div>      <button type="submit" class="btn btn-primary">Guardar</button>

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



   <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona tu Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <!-- Area selection -->
            <div class="form-group">
              <label for="areaSelect">Selecciona tu Area:</label>
              <select class="form-control" id="areaSelect">
                <option value="office">Oficina</option>
                <option value="plant">Planta</option>
              </select>
            </div>
            <!-- DataTable to display area-specific information -->
        <!-- DataTable to display area-specific information -->
        <div class="table-responsive" id="officeTable" style="display: none;">
          <table class="table table-bordered table-hover" id="officeDataTable" style="width:100%">
            <thead>
              <tr>
                <th >No. de empleado</th>
                <th >Apellido Paterno</th>
                <th >Apellido Materno</th>
                <th >Nombre</th>
                 <th >Edad</th>
                <th >Fecha Nacimiento</th>
                <th >Lugar de Nacimiento</th>
                <th >Sexo</th>
                <th > Ingreso</th>
                <th>Accion</th> <!-- New column for navigation -->
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="office0">1222</td>
                <td id="ofice1">Blanco</td>
                <td id="ofice2">Blanco</td>
                <td id="ofice3">Kimberly Michel</td>
                <td id="ofice4">24</td>
                <td id="ofice5">11/03/2024</td>
                <td id="ofice6">Monterrey</td>
                <td id="ofice7">F</td>
               <td id="ofice8">11/03/2024</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td>
              </tr>

              <tr>
                <td>1223</td>
                <td>Rodríguez</td>
                <td>López</td>
                <td>Andrea</td>
                <td>28</td>
                <td>05/15/1996</td>
                <td>Guadalajara</td>
                <td>F</td>
                <td>10/20/2023</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td>
            </tr>
            <tr>
                <td>1224</td>
                <td>García</td>
                <td>Martínez</td>
                <td>Juan</td>
                <td>35</td>
                <td>08/20/1989</td>
                <td>Monterrey</td>
                <td>M</td>
                <td>06/10/2022</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td>
            </tr>


              <!-- Additional rows can be added here -->
            </tbody>
          </table>
        </div>
        <div class="table-responsive" id="plantTable" style="display: none;">
          <table class="table table-bordered table-hover" id="plantDataTable" style="width:100%">
            <thead>
              <tr>
                <th >No. de empleado</th>
                <th >Apellido Paterno</th>
                <th >Apellido Materno</th>
                <th >Nombre</th>
                <th >Edad</th>
                <th >Fecha Nacimiento</th>
                <th >Lugar de Nacimiento</th>
                <th >Sexo</th>
                <th > Ingreso</th>
                <th>Ir</th> <!-- New column for navigation -->
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="ofice40">23332</td>
                <td id="ofice41">Diaz</td>
                <td id="ofice42">Salas</td>
                <td id="ofice43">Michel</td>
                <td id="ofice44">45</td>
                <td id="ofice45">11/03/2024</td>
                <td id="ofice46">Monterrey</td>
                <td id="ofice47">F</td>
                <td id="ofice48">11/03/2024</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td> <!-- Link for navigation -->
              </tr>
                      <tr>
            <td>23333</td>
            <td>Hernández</td>
            <td>Gómez</td>
            <td>Laura</td>
            <td>40</td>
            <td>12/05/1984</td>
            <td>Ciudad de México</td>
            <td>F</td>
            <td>03/28/2023</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td>
        </tr>
        <tr>
            <td>23334</td>
            <td>Martínez</td>
            <td>Ruiz</td>
            <td>Pedro</td>
            <td>32</td>
            <td>09/12/1992</td>
            <td>Guadalajara</td>
            <td>M</td>
            <td>11/15/2022</td>
                <td><a href="rhbajaempleadoadmon.php">Selecciona</a></td>
        </tr>

              <!-- Additional rows can be added here -->
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  

<!-- Modal -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Script para llenar el input con los datos de "Go to Plant" -->
<script>
  $(document).ready(function() {
    // Function to handle click event on "Go to Office" link
    $('#officeDataTable').on('click', 'a', function(event) {
      // Prevent default behavior of anchor tag
      event.preventDefault();

      // Get the data from the corresponding row
      var rowData = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
      }).get();

      // Populate the input fields with the retrieved data
      $('#employeeNumber').val(rowData[0]); // Assuming Office Data 1 corresponds to motivo_separacion
      $('#lastName').val(rowData[1]); // Assuming Office Data 2 corresponds to rfc
       $('#secondName').val(rowData[2]);
        $('#name').val(rowData[3]);
         $('#age').val(rowData[4]);
          $('#datebirthday').val(rowData[5]);
           $('#placebirth').val(rowData[6]);
            $('#sex').val(rowData[7]);
             $('#dateadmission').val(rowData[8]);

    });

    // Function to handle click event on "Go to Plant" link
    $('#plantDataTable').on('click', 'a', function(event) {
      // Prevent default behavior of anchor tag
      event.preventDefault();

      // Get the data from the corresponding row
      var rowData = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
      }).get();

          // Populate the input fields with the retrieved data
      $('#employeeNumber').val(rowData[0]); // Assuming Office Data 1 corresponds to motivo_separacion
      $('#lastName').val(rowData[1]); // Assuming Office Data 2 corresponds to rfc
       $('#secondName').val(rowData[2]);
        $('#name').val(rowData[3]);
         $('#age').val(rowData[4]);
          $('#datebirthday').val(rowData[5]);
           $('#placebirth').val(rowData[6]);
            $('#sex').val(rowData[7]);
             $('#dateadmission').val(rowData[8]);

    });
  });
</script>


<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Script para mostrar u ocultar tablas y manejar DataTables -->
<script>
  $(document).ready(function() {
    // Trigger modal display
    $('#exampleModal').modal('show');

    // Initialize DataTables for both tables
    $('#officeDataTable').DataTable();
    $('#plantDataTable').DataTable();

    // Show/hide tables based on area selection
    $('#areaSelect').change(function() {
      var selectedArea = $(this).val();
      if (selectedArea === 'office') {
        $('#officeTable').show();
        $('#plantTable').hide();
      } else if (selectedArea === 'plant') {
        $('#plantTable').show();
        $('#officeTable').hide();
      }
    });

    // Trigger table show/hide on modal open
    $('#exampleModal').on('shown.bs.modal', function() {
      $('#areaSelect').trigger('change');
    });
  });
</script>
<!-- En la página de destino donde quieres mostrar los datos -->
<script>
  // Espera a que el documento esté completamente cargado
  document.addEventListener("DOMContentLoaded", function() {
    // Obtén los datos de las celdas del modal
    var officeData1 = document.getElementById("office0").innerText;
    var officeData2 = document.getElementById("ofice1").innerText;
    var officeData3 = document.getElementById("ofice2").innerText;
    var officeData4 = document.getElementById("ofice3").innerText;
    var officeData5 = document.getElementById("ofice4").innerText;
    var officeData6 = document.getElementById("ofice5").innerText;
    var officeData7 = document.getElementById("ofice6").innerText;
    var officeData8 = document.getElementById("ofice7").innerText;
    var officeData9 = document.getElementById("ofice8").innerText;


    var plantData40 = document.getElementById("office40").innerText;
    var plantData41 = document.getElementById("ofice41").innerText;
    var plantData42 = document.getElementById("ofice42").innerText;
    var plantData43 = document.getElementById("ofice43").innerText;
    var plantData44 = document.getElementById("ofice44").innerText;
    var plantData45 = document.getElementById("ofice45").innerText;
    var plantData46 = document.getElementById("ofice46").innerText;
    var plantData47 = document.getElementById("ofice47").innerText;
    var plantData48 = document.getElementById("ofice48").innerText;

    // Asigna los datos a los campos de entrada en la página
    document.getElementById("employeeNumber").value = officeData1;
    document.getElementById("lastName").value = officeData2;
    // Asigna los datos a los campos de entrada en la página
    document.getElementById("secondName").value = officeData3;
    document.getElementById("name").value = officeData4;
    document.getElementById("age").value = officeData5;
    document.getElementById("datebirthday").value = officeData6;
    document.getElementById("placebirth").value = officeData7;
    document.getElementById("sex").value = officeData8;
    document.getElementById("dateadmission").value = officeData9;



    // Asigna los datos a los campos de entrada en la página
    document.getElementById("employeeNumber").value = plantData40;
    document.getElementById("lastName").value = plantData41;
    // Asigna los datos a los campos de entrada en la página
    document.getElementById("secondName").value = plantData42;
    document.getElementById("name").value = plantData43;
    document.getElementById("age").value = plantData44;
    document.getElementById("datebirthday").value = plantData45;
    document.getElementById("placebirth").value = plantData46;
    document.getElementById("sex").value = plantData47;
    document.getElementById("dateadmission").value = plantData48;


  });
</script>
  <!-- Script para la animación -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        var cornerContainers = document.querySelectorAll('.corner-container');
        var images = document.querySelectorAll('.image-container');

        function animateImages() {
            cornerContainers.forEach(function(container, index) {
                var options = {
                    targets: container,
                    translateY: ['100%', 0],
                    scale: [0, 1], // Efecto de escala
                    rotate: [180, 0], // Efecto de rotación
                    duration: 1000,
                    easing: 'easeInOutQuad',
                    delay: 300 * index,
                    complete: function(anim) {
                        anime({
                            targets: '#as',
                            opacity: [0, 1],
                            duration: 500,
                            easing: 'easeInOutQuad',
                        });
                    }
                };

                anime(options);
            });
        }

        animateImages();
    });
  </script>

</html>
