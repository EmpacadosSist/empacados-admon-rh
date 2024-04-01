
<?php 
  require_once('layout/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alta Empleados Empacados</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require_once('layout/sidebar.php'); ?>
<?php require 'nav.php'; ?>
<?php $areas = Consultas::listAreas($conn); ?>
<?php $cecos = Consultas::listCecos($conn); ?>
<?php $estados = Consultas::listEstados($conn); ?>

<style type="text/css">
  .h4,
  h4 {
    font-size: 2rem;
  }

  .container {
    width: 100%;
    padding-right: 13px;
    padding-left: 25px;
    margin-right: 28px;
    margin-left: -2px;
  }

  .mt-5,
  .my-5 {
    margin-top: 0rem !important;
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
    margin: 0 10px;
    /* Margen entre las imágenes y el texto */
    vertical-align: middle;
    /* Alineación vertical con el texto */
  }

  .medium-button {
    font-size: 10px;
    padding: 11px 21px;
    /* background-color: #e61d1dbf; /* Replace with your desired color code */
    font-weight: bold;

  }
</style>



<main id="main" class="main">
  <section class="section">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="container mt-5" align="left">
            <div class="row">
              <h2 id="title" class="animate__animated animate__bounceInDown card-title">
                Datos de Empleado
                <img src="assets/img/empleadoempacados.png" alt="" width="60">
              </h2>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="empNum">
                  <i class="fas fa-id-card"></i>
                  No. de empleado
                </label>
                <input type="number" class="form-control" id="empNum" name="empNum" inputmode="numeric" pattern="[0-9]+">
                <span id="error_empNum" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="lastName1">
                  <i class="fas fa-user"></i> Apellido Paterno
                </label>
                <input type="text" class="form-control" id="lastName1" name="lastName1" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
                <span id="error_lastName1" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="lastName2">
                  <i class="fas fa-user"></i> Apellido Materno
                </label>
                <input type="text" class="form-control" id="lastName2" name="lastName2" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
                  <span id="error_lastName2" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="name">
                  <i class="fas fa-user"></i> Nombre(s)
                </label>
                <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
                  <span id="error_name" class="text-danger"></span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="recDate">
                  <i class="fas fa-calendar-alt"></i> Fecha de Ingreso
                </label>
                <input type="date" class="form-control" id="recDate" name="recDate" pattern="\d{4}-\d{2}-\d{2}"
                  title="Solo se permiten caracteres">
                <span id="error_recDate" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="area">
                  <i class="fas fa-building"></i> Área
                </label>
                <select class="form-control" id="area" name="area">
                  <option value="">- Seleccione -</option>
                  <?php 
                    for ($i=0; $i < count($areas); $i++) { ?>
                  <option value="<?=$areas[$i]['areaId']?>">
                    <?=$areas[$i]['nombreArea']?>
                  </option>
                  <?php 
                    }
                    ?>
                </select>
                <span id="error_area" class="text-danger"></span>
              </div>

              <div class="form-group col-md-3">
                <label for="section"><i class="fas fa-building"></i> Departamento</label>
                <select class="form-control" id="section" name="section" onchange="updatePositions()">
                  <option value="">- Seleccione -</option>
                </select>
                <span id="error_section" class="text-danger"></span>
              </div>

              <div class="form-group col-md-3">
                <label for="position"><i class="fas fa-user-tie"></i> Puesto</label>
                <select class="form-control" id="position" name="position">
                  <option value="">- Seleccione -</option>
                </select>
                <span id="error_position" class="text-danger"></span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="ceco"><i class="fas fa-dollar-sign"></i> Centro de Costos</label>
                <select class="form-control" id="ceco" name="ceco" on>
                  <option value="">- Seleccione -</option>
                  <?php 
                   for ($i=0; $i < count($cecos); $i++) { ?>
                  <option value="<?=$cecos[$i]['cecoId']?>">
                    <?=$cecos[$i]['nombreCeco']?>
                  </option>
                  <?php 
                   }
                   ?>
                </select>
                <span id="error_ceco" class="text-danger"></span>
              </div>
            </div>

            <div class="row">
              <h2 id="title" class="animate__animated animate__bounceInDown card-title">
                Información de personal
                <img src="assets/img/empleadoempacados.png" alt="" width="60">
              </h2>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="dateOfBirth"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                  placeholder="Fecha de Nacimiento">
                <span id="error_dateOfBirth" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="placeOfBirth"><i class="fas fa-globe"></i> Lugar de Nacimiento</label>
                <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth"
                  placeholder="Lugar de Nacimiento">
                <span id="error_placeOfBirth" class="text-danger"></span>
              </div>

              <div class="form-group col-md-3">
                <label for="gender"><i class="fas fa-venus-mars"></i> Sexo</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="">- Seleccione -</option>
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
                  <option value="X">No Definido</option>
                </select>
                <span id="error_gender" class="text-danger"></span>
              </div>


              <div class="form-group col-md-3">
                <label for="maritalStatus"><i class="fas fa-heart"></i> Estado civil</label>
                <select class="form-control" id="maritalStatus" name="maritalStatus">
                  <option value="">- Seleccione -</option>
                  <option value="Soltero(a)">Soltero(a)</option>
                  <option value="Casado(a)">Casado(a)</option>
                  <option value="Unión Libre">Unión Libre</option>
                </select>
                <span id="error_maritalStatus" class="text-danger"></span>                
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="nss"><i class="fas fa-venus-mars"></i> NSS</label>
                <input type="text" class="form-control" id="nss" name="nss" pattern="[0-9]+"
                  title="Solo se permiten números" placeholder="Número de seguro social">
                  <span id="error_nss" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="curp"><i class="fas fa-id-card"></i> CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su CURP">
                  <span id="error_curp" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="rfc"><i class="fas fa-id-card"></i> RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su RFC">
                  <span id="error_rfc" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="education"><i class="fa-solid fa-magnifying-glass-location"></i> Escolaridad</label>
                <input type="text" class="form-control" id="education" name="education" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su nivel de escolaridad">
                <span id="error_education" class="text-danger"></span>  
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="estado"><i class="fas fa-map-marker-alt"></i> Estado</label>
                <select class="form-control" id="estado" name="estado">
                  <option value="">- Seleccione -</option>
                  <?php 
                    for ($i=0; $i < count($estados); $i++) { ?>
                  <option value="<?=$estados[$i]['estadoId']?>">
                    <?=$estados[$i]['nombreEstado']?>
                  </option>
                  <?php 
                    }
                    ?>
                </select>
                <span id="error_estado" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="municipio"><i class="fas fa-map-marker-alt"></i> Municipio</label>
                <select class="form-control" id="municipio" name="municipio">
                  <option value="">- Seleccione -</option>
                </select>
                <!--
                  <input type="text" class="form-control" id="municipio" name="municipio" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su municipio">
                -->
                <span id="error_municipio" class="text-danger"></span>                
              </div>
              <div class="form-group col-md-3">
                <label for="colonia"><i class="fas fa-map-marker-alt"></i> Colonia</label>
                <select class="form-control" id="colonia" name="colonia">
                  <option value="">- Seleccione -</option>
                </select>
                <!--
                  <input type="text" class="form-control" id="colonia" name="colonia" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su colonia">
                -->
                  <span id="error_colonia" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="postalcode"><i class="fas fa-map-marker-alt"></i> C.P. (actual)</label>
                <input type="text" class="form-control" id="postalcode" name="postalcode" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" disabled>
                  <span id="error_postalcode" class="text-danger"></span>                
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label for="address"><i class="fas fa-map"></i> Domicilio calle y Num.</label>
                <input type="text" class="form-control" id="address" name="address" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres" placeholder="Ingrese su domicilio">
                  <span id="error_address" class="text-danger"></span>                 
                
              </div>
              <div class="form-group col-md-4">
                <label for="email"><i class="fas fa-envelope"></i> Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                  placeholder="Ingrese su correo electrónico">
                  <span id="error_email" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-4">
                <label for="phone"><i class="fas fa-phone"></i> Teléfono actual</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+"
                  title="Solo se permiten números" placeholder="Ingrese su número de teléfono actual">
                  <span id="error_phone" class="text-danger"></span>                  
              </div>
            </div>

            <div class="row">
              <h2 id="title" class="animate__animated animate__bounceInDown card-title">
                Información de Empresa
                <img src="assets/img/reclutamiento.png" alt="" width="60">
              </h2>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="shirtSize"><i class="fas fa-tshirt"></i> Talla de Camisa</label>
                <input type="text" class="form-control" id="shirtSize" name="shirtSize" placeholder="Ingrese talla de camisa">
                <!--

                  <select class="form-control" id="shirtSize" name="shirtSize">
                    <option value="">- Seleccione -</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                  </select>                
                -->
              
              </div>
              <div class="form-group col-md-3">
                <label for="pantsSize"><img src="assets/img/pantalones.png" width="20px"> Talla de Pantalón</label>
                <input type="text" class="form-control" id="pantsSize" name="pantsSize" placeholder="Ingrese talla de pantalón">
                <!--

                  <select class="form-control" id="pantsSize" name="pantsSize">
                    <option value="">- Seleccione -</option>
                    <option value="28">28</option>
                    <option value="30">30</option>
                    <option value="32">32</option>
                  </select>              
                -->
              
              </div>
              <div class="form-group col-md-3">
                <label for="shoeSize"><i class="fas fa-shoe-prints"></i> Talla de Calzado</label>
                <input type="text" class="form-control" id="shoeSize" name="shoeSize" placeholder="Ingrese talla de calzado">
                <!--

                  <select class="form-control" id="shoeSize" name="shoeSize">
                    <option value="">- Seleccione -</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>
                -->
              
              </div>
              <div class="form-group col-md-3">
                <label for="illnesses"><i class="fas fa-heartbeat"></i> Enfermedades Crónicas</label>
                <input type="text" class="form-control" id="illnesses" name="illnesses" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Enfermedades Crónicas">                  
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="allergies"><i class="fas fa-allergies"></i> Alergias</label>
                <input type="text" class="form-control" id="allergies" name="allergies" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Alergias">
              </div>
              <div class="form-group col-md-3">
                <label for="medication"><i class="fas fa-pills"></i> Medicamentos</label>
                <input type="text" class="form-control" id="medication" name="medication" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Toma algún medicamento">
              </div>
              <div class="form-group col-md-3">
                <label for="emerPhone1"><i class="fas fa-phone"></i> Num emergencia</label>
                <input type="text" class="form-control" id="emerPhone1" name="emerPhone1" pattern="[0-9]+"
                  title="Solo se permiten caracteres numéricos" placeholder="Contacto de emergencia">
              </div>
              <div class="form-group col-md-3">
                <label for="emerPhone2"><i class="fas fa-phone"></i> Num emergencia 2</label>
                <input type="text" class="form-control" id="emerPhone2" name="emerPhone2" pattern="[0-9]+"
                  title="Solo se permiten caracteres numéricos" placeholder="Contacto de emergencia 2">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="baseSalary"><i class="fas fa-money-bill-wave"></i> Sueldo base</label>
                <input type="text" class="form-control" id="baseSalary" name="baseSalary" pattern="[0-9]+"
                  title="Solo se permiten caracteres" placeholder="Sueldo base">
                <span id="error_baseSalary" class="text-danger"></span>                  
              </div>
              <div class="form-group col-md-3">
                <label for="paymentType"><i class="fa-solid fa-mobile-screen-button"></i>Tipo de Pago</label>
                <select class="form-control" id="paymentType" name="paymentType">
                  <option value="">- Seleccione -</option>
                  <option value="efectivo">Efectivo</option>
                  <option value="transferencia">Transferencia bancaria</option>
                  <option value="cheque">Cheque</option>
                  <option value="tarjeta">Tarjeta de crédito/débito</option>
                  <option value="paypal">PayPal</option>
                </select>
                <span id="error_paymentType" class="text-danger"></span>                
              </div>
              <div class="form-group col-md-3">
                <label for="foodBonus"><i class="fas fa-utensils"></i> Bonos de despensa</label>
                <input type="text" class="form-control" id="foodBonus" name="foodBonus" pattern="[0-9]+"
                  title="Solo se permiten números" placeholder="Bonos de despensa">
                  <span id="error_foodBonus" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="savingFund"><i class="fas fa-piggy-bank"></i> Fondo de ahorro</label>
                <input type="text" class="form-control" id="savingFund" name="savingFund" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Fondo de ahorro">
                  <span id="error_savingFund" class="text-danger"></span>                  
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="bank"><i class="fas fa-money-check"></i> Banco</label>
                <select class="form-control" id="bank" name="bank">
                  <option value="">- Seleccione -</option>
                  <option value="Bancomer">Bancomer</option>
                  <option value="Santander">Santander</option>
                  <option value="HSBC">HSBC</option>
                  <option value="Banorte">Banorte</option>
                  <option value="BBVA" selected>BBVA</option>
                  <option value="Scotiabank">Scotiabank</option>
                  <option value="Inbursa">Inbursa</option>
                  <!-- Agrega más opciones según sea necesario -->
                </select>
                <span id="error_bank" class="text-danger"></span>    
              </div>
              <div class="form-group col-md-6">
                <label for="bankAcc"><i class="fa-solid fa-money-check-dollar"></i> Cuenta bancaria</label>
                <input type="text" class="form-control" id="bankAcc" name="bankAcc" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres" placeholder="Cuenta bancaria">
                <span id="error_bankAcc" class="text-danger"></span>                  
              </div>
            </div>

            <div class="row">

              <div class="form-group col-md-3">
                <!--

                  <button type="submit" id="work_contract" name="generate_contract" class="medium-button">
                    <i class="fa-solid fa-file-pdf"></i> Generar Contrato PDF
                  </button>
                -->
              
              </div>
              <div class="form-group col-md-6">

              </div>
              <div class="form-group col-md-3">
                <button class="btn btn-primary" id="btnGuardarEmpleado">Guardar</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>
</main>

</html>


<style type="text/css">
  .medium-button {
    font-size: 10px;
    padding: 11px 21px;
    background-color: #e61d1dbf;
    /* Replace with your desired color code */
    font-weight: bold;

  }
</style>
 <script>
    // Datos de ejemplo para departamentos y puestos
    var departmentsByArea = {
      'Operaciones': ['Almacen','Calidad', 'Distribución', 'Producción','Desarrollo','Mantenimiento'],
      'Admón': ['Facturación','Inventarios', 'Compras', 'Contabilidad', 'RH','Sistemas'],
      'Comercial': ['Industrial','Marketing','Autoservicios','Comercial','Líder Trade Marketing','Institucional','Mayoreo']
    };

  var positionsByDepartment = {
    'Almacen': ['Lider de Almacenes'],
    'Inventarios': ['Lider de Inventarios y Costos', 'Auditor de Inventarios', 'Analista de Inventarios'],

    
      'Sistemas': ['Ingeniero Sistemas'],

    'Desarrollo': ['Líder Innovación y Desarrollo', 'Ingeniero de Innovación & Desarrollo', 'Ingeniero Jr de Innovación & Desarrollo'],

    'Contabilidad': ['Auxiliar Contable', 'Auditor Fiscal', 'Analista Tesorería y Contabilidad', 'Analista Fiscal', 'Analista Contable', 'Líder de Contabilidad', 'Staff de Contabilidad'],

    'RH': ['Lider de Recursos Humanos', 'Analista de Reclutamiento', 'Analista de Capacitación', 'Analista de Recursos Humanos', 'Coordinación Seguridad de Higiene'],

    'Mantenimiento': ['Líder de Mantenimiento e Ingeniería', 'Supervisor de Mantenimiento', 'Staff de Mantenimiento e Ingeniería'],


    'Facturación': ['Lider Credito y Cobranza', 'Analista de Facturación', 'Analista de Créditos', 'Staff de Facturación'],
    'Compras': ['Líder de Compras Nacional y Planeación', 'Analista de Compras Internacionales', 'Líder de Compras Internacionales', 'Asistente de Compras'],

    'Comercial': ['Líder Export y Conveniencia'],

    'Autoservicios': ['KAE Norte', 'KAE Cadenas Regionales', 'Gerente Nacional Retail'],

    'Mayoreo': ['Líder Ventas Mayoreo', 'Vendedor Monterrey La Costa', 'Vendedor Chihuahua', 'Vendedor Centro', 'Vendedor Guadalajara'],

    'Marketing': ['Analista de Inteligencia de Mercados', 'Digital Content Manager', 'Líder Marketing', 'Líder Experiencia del Cliente', 'Diseñador'],

    'Líder Trade Marketing': ['Líder Trade Marketing'],

    'Ventas': ['Director Comercial', 'Líder Coordinación de Servicio', 'Staff de Servicio', 'KAE Centro', 'Planner Comercial'],
    'Industrial': ['Director Industrial', 'KAE Industrial CDMX', 'KAE Industrial Guadalajara', 'KAE Industrial Norte', 'Staff de Industrial'],

    'Institucional': ['KAE Institucional'],

    'Calidad': ['Lider Calidad e Inocuidad', 'Staff de Calidad e Inocuidad MIP', 'Staff de Calidad e Inocuidad SGC', 'Analista de Microbiología', 'Inspector de Calidad en Procesos', 'Inspector de Calidad en Materia Prima'],

    'Distribución': ['Lider de Distribución', 'Staff de Distribución General', 'Staff de Distribución Institucional', 'Staff de Distribución Mayoreo', 'Staff de Retail Distribución'],

    'Producción': ['Líder de Producción', 'Master Planner Producción', 'Staff de Producción', 'Supervisor de Producción'],


  };
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




<script>
  $(document).ready(function () {
    $('#work_contract').click(function () {
      $('#form_id').attr('action', 'pdfpuesto.php');
    });
  });


</script>



<!-- Modal para mostrar información -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">
          <i class="fas fa-info-circle"></i> Información Adicional
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- Contenido del modal -->
        <form id="personalForm">
          <div class="form-group">
            <div class="form-group">
              <label for="apellido">Apellido Paterno:</label>
              <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido">
            </div>
            <div class="form-group">
              <label for="apellidomaterno">Apellido Materno:</label>
              <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese su apellido materno">
            </div>
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group">
            <label for="fechaNacimientoconyuge">Fecha de nacimiento :</label>
            <input type="date" class="form-control" id="fechaNacimientoconyuge">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" readonly>
          </div>
          <button type="button" class="btn btn-primary" id="guardarDatos">Guardar</button>
          <div class="form-check"> <br>
            <!-- Tabla para mostrar datos HIJOS -->
            <input class="form-check-input" type="checkbox" id="tieneHijos">
            <label class="form-check-label" for="tieneHijos">Tiene hijos</label>
          </div>
          <div class="form-group" id="datosHijo" style="display: none;">
            <label for="nombreHijo">Nombre del hijo:</label>
            <input type="text" class="form-control" id="nombreHijo" placeholder="Ingrese el nombre del hijo">
            <label for="apellidohijo"></label>
            <input type="text" class="form-control" id="apellidohijo" placeholder="Ingrese el nombre del hijo">
            <label for="apellidomaternohijo"></label>
            <input type="text" class="form-control" id="apellidomaternohijo" placeholder="Ingrese el nombre del hijo">
            <label for="fechaNacimiento">Fecha de nacimiento del hijo:</label>
            <input type="date" class="form-control" id="fechaNacimiento">
            <label for="edadHijo">Edad del hijo:</label>
            <input type="text" class="form-control" id="edadHijo" readonly>
          </div>
          <button type="button" class="btn btn-primary" id="guardarDatosHijo">Guardar</button>
        </form>
        <hr>
        <!-- Tabla para mostrar datos -->
        <h5>Datos Personales:</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Edad</th>
              <th>Fecha de Nacimiento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tablaDatos">
            <!-- Aquí se mostrarán los datos ingresados -->
          </tbody>
        </table>
        <!-- Fin de la tabla -->
        <div id="tabHijo" style="display: none;">
          <h5>Datos del Hijo:</h5>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tablaHijo">
              <!-- Aquí se mostrarán los datos del hijo -->
            </tbody>
          </table>
        </div>
        <!-- Fin del Tab Content para los datos del hijo -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para advertir campos vacíos -->
<div class="modal fade" id="advertenciaModal" tabindex="-1" role="dialog" aria-labelledby="advertenciaModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="advertenciaModalLabel">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Por favor complete todos los campos.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</body>
<?php require 'layout/footer.php';?>

</html>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>


  $(document).ready(function () {
    $('#estadoCivil').change(function () {
      var estadoCivil = $(this).val();
      if (estadoCivil === 'casado') {
        $('#tab1').addClass('show active');
        $('#tab2').removeClass('show active');
        $('#infoModal').modal('show');
      } else {
        $('#tab2').addClass('show active');
        $('#tab1').removeClass('show active');
        $('#infoModal').modal('show');


      }
    });

    var usuarioRegistrado = false;

    $('#guardarDatos').click(function () {
      var nombre = $('#nombre').val();
      var apellido = $('#apellido').val();
      var apellidomaterno = $('#apellidomaterno').val();
      var edad = $('#edad').val();
      var fechaNacimientoconyuge = $('#fechaNacimientoconyuge').val();

      // Verificar si los campos no están vacíos
      if (nombre.trim() !== '' && apellido.trim() !== '' && edad.trim() !== '' && fechaNacimientoconyuge.trim() !== '') {
        if ($('#tablaDatos tr').length === 0) {
          $('#tablaDatos').append('<tr><td>' + nombre + '</td><td>' + apellido + ' ' + apellidomaterno + '</td><td>' + edad + '</td><td>' + fechaNacimientoconyuge + '</td><td><button class="btn btn-danger eliminar">Eliminar</button> <button class="btn btn-primary editar">Editar</button></td></tr>');
        } else {
          alert('Solo se permite un registro. Para editar, haz clic en "Editar".');
        }

        $('#nombre').val('');
        $('#apellido').val('');
        $('#apellidomaterno').val('');
        $('#edad').val('');
        $('#fechaNacimientoconyuge').val('');

        // Bloquear el modal después del primer registro
        if (!usuarioRegistrado) {
          usuarioRegistrado = true;
        }
      } else {
        // Mostrar el modal de advertencia
        $('#advertenciaModal').modal('show');
      }
    });

    // Evento para eliminar una fila de la tabla de datos personales
    $('#tablaDatos').on('click', '.eliminar', function () {
      $(this).closest('tr').remove();

      // Habilitar el campo de estado civil si se elimina el único registro
      if ($('#tablaDatos tr').length === 0) {
        usuarioRegistrado = false;
        // Habilitar los campos si no hay registros
        $('#nombre').prop('disabled', false);
        $('#apellido').prop('disabled', false);
        $('#apellidomaterno').prop('disabled', false);
        $('#edad').prop('disabled', false);
        $('#fechaNacimientoconyuge').prop('disabled', false);
      }
    });

    // Evento para editar una fila de la tabla de datos personales
    $('#tablaDatos').on('click', '.editar', function () {
      var nombre = $(this).closest('tr').find('td').eq(0).text();
      var apellidos = $(this).closest('tr').find('td').eq(1).text().split(' ');
      var apellido = apellidos[0];
      var apellidomaterno = apellidos.length > 1 ? apellidos[1] : '';
      var edad = $(this).closest('tr').find('td').eq(2).text();
      var fechaNacimientoconyuge = $(this).closest('tr').find('td').eq(3).text();

      $('#nombre').val(nombre);
      $('#apellido').val(apellido);
      $('#apellidomaterno').val(apellidomaterno);
      $('#edad').val(edad);
      $('#fechaNacimientoconyuge').val(fechaNacimientoconyuge);

      // Habilitar los campos para edición
      $('#nombre').prop('disabled', false);
      $('#apellido').prop('disabled', false);
      $('#apellidomaterno').prop('disabled', false);
      $('#edad').prop('disabled', false);
      $('#fechaNacimientoconyuge').prop('disabled', false);

      // Eliminar la fila actual
      $(this).closest('tr').remove();

      // Habilitar los campos si no hay registros después de la eliminación
      if ($('#tablaDatos tr').length === 0) {
        usuarioRegistrado = false;
      }
    });


    // DATOS PERSONALES HIJOS////////////////

    // Mostrar campos del hijo cuando se marque el checkbox
    $('#tieneHijos').change(function () {
      if ($(this).is(':checked')) {
        $('#datosHijo').show();
        $('#tabHijo').show();
      } else {
        $('#datosHijo').hide();
        $('#tabHijo').hide();
      }
    });

    $('#guardarDatosHijo').click(function () {
      var nombreHijo = $('#nombreHijo').val();
      var apellidoHijo = $('#apellidohijo').val();
      var apellidomaternoHijo = $('#apellidomaternohijo').val();
      var fechaNacimiento = $('#fechaNacimiento').val();

      // Verificar si el nombre del hijo y la fecha de nacimiento no están vacíos
      if (nombreHijo.trim() !== '' && apellidoHijo.trim() !== '' && apellidomaternoHijo.trim() !== '' && fechaNacimiento.trim() !== '') {
        var hoy = new Date();
        var fechaNac = new Date(fechaNacimiento);
        var edadHijo = hoy.getFullYear() - fechaNac.getFullYear();

        $('#tablaHijo').append('<tr><td>' + nombreHijo + '</td><td>' + apellidoHijo + ' ' + apellidomaternoHijo + '</td><td>' + fechaNacimiento + '</td><td>' + edadHijo + '</td><td><button class="btn btn-danger eliminarHijo">Eliminar</button> <button class="btn btn-primary editarHijo">Editar</button></td></tr>');

        // Limpiar los campos después de agregar la fila
        $('#nombreHijo').val('');
        $('#apellidohijo').val('');
        $('#apellidomaternohijo').val('');
        $('#fechaNacimiento').val('');
        $('#edadHijo').val(edadHijo);
      } else {
        // Mostrar un mensaje de alerta si algún campo está vacío
        $('#advertenciaModal').modal('show');
      }


    });

    // Evento para eliminar un hijo de la tabla de datos de hijos
    $('#tablaHijo').on('click', '.eliminarHijo', function () {
      $(this).closest('tr').remove();
    });

    // Evento para editar un hijo de la tabla de datos de hijos
    $('#tablaHijo').on('click', '.editarHijo', function () {
      var row = $(this).closest('tr');
      var nombreHijo = row.find('td:eq(0)').text();
      var apellidosHijo = row.find('td:eq(1)').text().split(' ');
      var apellidoHijo = apellidosHijo[0];
      var apellidomaternoHijo = apellidosHijo[1];
      var fechaNacimiento = row.find('td:eq(2)').text();
      var edadHijo = row.find('td:eq(3)').text();




      $('#nombreHijo').val(nombreHijo);
      $('#apellidohijo').val(apellidoHijo);
      $('#apellidomaternohijo').val(apellidomaternoHijo);
      $('#fechaNacimiento').val(fechaNacimiento);
      $('#edadHijo').val(edadHijo);
      $('#tieneHijos').prop('checked', true);
      $('#datosHijo').show();
      $('#tabHijo').show();
      console.log('Nombre del hijo:', nombreHijo);
      console.log('Apellidos del hijo:', apellidosHijo);
      console.log('Apellido del hijo:', apellidoHijo);
      console.log('Apellido Materno del hijo:', apellidomaternoHijo);
      console.log('Fecha de Nacimiento del hijo:', fechaNacimiento);
      console.log('Edad del hijo:', edadHijo);

      // Eliminar la fila actual
      row.remove();
    });

    // Calcular automáticamente la edad del hijo
    $('#fechaNacimiento').change(function () {
      var fechaNac = new Date($(this).val());
      var hoy = new Date();
      var diff = hoy.getTime() - fechaNac.getTime();
      var edadAnios = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
      var mesesRestantes = diff % (1000 * 60 * 60 * 24 * 365.25);
      var edadMeses = Math.floor(mesesRestantes / (1000 * 60 * 60 * 24 * 30.44));

      $('#edadHijo').val(edadAnios + " años y " + edadMeses + " meses");


    });
  });

  $("#area").on('change', function () {
    let area_id = $(this).val();
    recargar_select(area_id,'section'); 
    recargar_select(0,'position');   
    //recargar_section(area_id);
  });

  $("#section").on('change', function () {
    let section_id = $(this).val();
    recargar_select(section_id,'position');    
    //recargar_position(section_id);
  });

  $("#estado").on('change', function () {
    let estado_id = $(this).val();
    recargar_select(estado_id,'municipio');
    recargar_select(0,'colonia');
    $("#postalcode").val('');
  });  

  $("#municipio").on('change', function () {
    let municipio_id = $(this).val();
    recargar_select(municipio_id,'colonia');
    $("#postalcode").val('');
  });
  
  $("#colonia").on('change', function () {
    let cp=$(this).find(':selected').data('cp')
    $("#postalcode").val(cp);
  });  

  $("#btnGuardarEmpleado").click(function(){
    mostrarError($("#empNum"),'Número de empleado obligatorio','error_empNum');
    mostrarError($("#lastName1"),'Apellido paterno obligatorio','error_lastName1');
    mostrarError($("#lastName2"),'Apellido materno obligatorio','error_lastName2');
    mostrarError($("#name"),'Nombre(s) obligatorio','error_name');
    mostrarError($("#recDate"),'Fecha de ingreso obligatoria','error_recDate');
    mostrarError($("#area"),'Area obligatoria','error_area');
    mostrarError($("#section"),'Departamento obligatorio','error_section');
    mostrarError($("#position"),'Puesto obligatorio','error_position');
    mostrarError($("#ceco"),'Centro de costo obligatorio','error_ceco');
    mostrarError($("#dateOfBirth"),'Fecha de nacimiento obligatoria','error_dateOfBirth');
    mostrarError($("#placeOfBirth"),'Lugar de nacimiento obligatorio','error_placeOfBirth');
    mostrarError($("#gender"),'Sexo del/la empleado(a) obligatorio','error_gender');
    mostrarError($("#maritalStatus"),'Estado civil obligatorio','error_maritalStatus');
    mostrarError($("#nss"),'Número de seguridad social obligatorio','error_nss');
    mostrarError($("#curp"),'CURP obligatorio','error_curp');
    mostrarError($("#rfc"),'RFC obligatorio','error_rfc');
    mostrarError($("#address"),'Domicilio obligatorio','error_address');
    mostrarError($("#colonia"),'Colonia obligatoria','error_colonia');
    mostrarError($("#municipio"),'Municipio obligatorio','error_municipio');
    mostrarError($("#estado"),'Estado obligatorio','error_estado');
    mostrarError($("#postalcode"),'Código postal obligatorio','error_postalcode');
    mostrarError($("#education"),'Escolaridad obligatoria','error_education');
    mostrarError($("#email"),'Correo electrónico obligatorio','error_email');
    mostrarError($("#phone"),'Teléfono obligatorio','error_phone');
    mostrarError($("#baseSalary"),'Sueldo base obligatorio','error_baseSalary');
    mostrarError($("#paymentType"),'Tipo de pago obligatorio','error_paymentType');
    mostrarError($("#foodBonus"),'Bonos de despensa obligatorios','error_foodBonus');
    mostrarError($("#savingFund"),'Fondo de ahorro obligatorio','error_savingFund');
    mostrarError($("#bank"),'Banco obligatorio','error_bank');
    mostrarError($("#bankAcc"),'Cuenta de banco obligatorio','error_bankAcc');
  });

  const recargar_select = (parentId, tipo) => {
    $.ajax({
      url: "layout/select_options/"+tipo+".php",
      type: "POST",
      data: { parentId }
    }).done(function (response) {
      $("#"+tipo).empty();
      $("#"+tipo).append('<option value="">- Seleccione -</option>');
      $("#"+tipo).append(response);
      console.log(response);
    });
  }

  const mostrarError = (vali, msg, errorEl) => {
    if(vali.val() == ''){
      $('#'+errorEl).text(msg);
      vali.css('border-color', '#cc0000');
      //CuentaMayor = '';
    }else{
      msg = '';
      $('#'+errorEl).text(msg);
      vali.css('border-color', '');        
    }   
  }

</script>
<script>
  $(document).ready(function () {
    $('#fechaNacimientoconyuge').change(function () {
      var fechaNacimiento = new Date($(this).val());
      var hoy = new Date();
      var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
      var mes = hoy.getMonth() - fechaNacimiento.getMonth();
      var dia = hoy.getDate() - fechaNacimiento.getDate();

      // Verificar si todavía no ha pasado el cumpleaños este año
      if (mes < 0 || (mes === 0 && dia < 0)) {
        edad--;
      }

      // Calcular la diferencia de meses
      var meses = (hoy.getMonth() + 12) - fechaNacimiento.getMonth();
      if (dia < 0) {
        meses--;
      }

      $('#edad').val(edad + " años y " + meses + " meses");
    });
  });

</script>