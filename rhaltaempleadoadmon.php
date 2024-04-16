<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alta Empleados Empacados</title>


</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<?php $areas = Consultas::listAreas($conn); ?>
<?php $cecos = Consultas::listCecos($conn); ?>
<?php $estados = Consultas::listEstados($conn); ?>
<?php $empleados = Consultas::listUsers($conn); ?>
<?php $director_general = Consultas::listOneUser($conn, 1); ?>
<?php $tipos_pago = Consultas::listPaymentTypes($conn); ?>

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

  div.dataTables_wrapper div.dataTables_length select{
    width:50px;
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
                <input type="number" class="form-control" id="empNum" name="empNum" inputmode="numeric"
                  pattern="[0-9]+">
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
                <select class="form-control" id="section" name="section">
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
              <div class="form-group col-md-6">
                <label for="btnJefeDirecto"><i class="fas fa-user-tie"></i> Jefe directo</label>
                <!--
                  <input type="text" class="form-control" id="jefeDirecto" name="jefeDirecto">
                -->
                <button class="form-control text-left" id="btnJefeDirecto">- Seleccione -</button>
                <span id="error_btnJefeDirecto" class="text-danger"></span>
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
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
                <span id="error_dateOfBirth" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="placeOfBirth"><i class="fas fa-globe"></i> Lugar de Nacimiento</label>
                <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth">
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
              <div class="form-group col-md-6">
                <label for="spouseName"><i class="fas fa-heart"></i> Nombre de cónyuge/pareja</label>
                <input type="text" class="form-control" id="spouseName" name="spouseName" disabled>
                <span id="error_spouseName" class="text-danger"></span>
              </div>
              <div class="form-group col-md-6">
                <label for="spouseDob"><i class="fas fa-calendar-alt"></i> Fecha nac. cónyuge/pareja</label>
                <input type="date" class="form-control" id="spouseDob" name="spouseDob" disabled>
                <span id="error_spouseDob" class="text-danger"></span>
              </div>              
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="childrenInfo"><i class="fas fa-child"></i> Hijos</label>
                <button class="form-control text-left" id="childrenInfo" name="childrenInfo">0</button>              
              </div>              
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="nss"><i class="fas fa-venus-mars"></i> NSS</label>
                <input type="text" class="form-control" id="nss" name="nss" pattern="[0-9]+"
                  title="Solo se permiten números">
                <span id="error_nss" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="curp"><i class="fas fa-id-card"></i> CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres">
                <span id="error_curp" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="rfc"><i class="fas fa-id-card"></i> RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres">
                <span id="error_rfc" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="education"><i class="fa-solid fa-magnifying-glass-location"></i> Escolaridad</label>
                <input type="text" class="form-control" id="education" name="education" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
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
              <div class="form-group col-md-3">
                <label for="address"><i class="fas fa-map"></i> Domicilio calle y Num.</label>
                <input type="text" class="form-control" id="address" name="address" pattern="[A-Za-z0-9]+"
                  title="Solo se permiten caracteres">
                <span id="error_address" class="text-danger"></span>

              </div>
              <div class="form-group col-md-3">
                <label for="email"><i class="fas fa-envelope"></i> Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email">
                <span id="error_email" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="phone"><i class="fas fa-phone"></i> Teléfono actual</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+"
                  title="Solo se permiten números">
                <span id="error_phone" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="rfcZipCode"><i class="fas fa-map-marker-alt"></i> Código postal RFC</label>
                <input type="tel" class="form-control" id="rfcZipCode" name="rfcZipCode" pattern="[0-9]+"
                  title="Solo se permiten números">
                <span id="error_rfcZipCode" class="text-danger"></span>
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
                <input type="text" class="form-control" id="shirtSize" name="shirtSize">
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
                <input type="text" class="form-control" id="pantsSize" name="pantsSize">
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
                <input type="text" class="form-control" id="shoeSize" name="shoeSize">
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
                  title="Solo se permiten caracteres">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="allergies"><i class="fas fa-allergies"></i> Alergias</label>
                <input type="text" class="form-control" id="allergies" name="allergies" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
              </div>
              <div class="form-group col-md-3">
                <label for="medication"><i class="fas fa-pills"></i> Medicamentos</label>
                <input type="text" class="form-control" id="medication" name="medication" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
              </div>
              <div class="form-group col-md-3">
                <label for="emerPhone1"><i class="fas fa-phone"></i> Num emergencia</label>
                <input type="text" class="form-control" id="emerPhone1" name="emerPhone1" pattern="[0-9]+"
                  title="Solo se permiten caracteres numéricos">
              </div>
              <div class="form-group col-md-3">
                <label for="emerPhone2"><i class="fas fa-phone"></i> Num emergencia 2</label>
                <input type="text" class="form-control" id="emerPhone2" name="emerPhone2" pattern="[0-9]+"
                  title="Solo se permiten caracteres numéricos">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="baseSalary"><i class="fas fa-money-bill-wave"></i> Sueldo base</label>
                <input type="text" class="form-control" id="baseSalary" name="baseSalary" pattern="[0-9]+"
                  title="Solo se permiten caracteres">
                <span id="error_baseSalary" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="paymentType"><i class="fa-solid fa-mobile-screen-button"></i>Tipo de Pago</label>
                <select class="form-control" id="paymentType" name="paymentType">
                  <option value="">- Seleccione -</option>
                  <?php 
                    for ($i=0; $i < count($tipos_pago); $i++) { ?>
                  <option value="<?=$tipos_pago[$i]['tipoPagoId']?>">
                    <?=$tipos_pago[$i]['nombreTipoPago']?>
                  </option>
                  <?php 
                    }
                    ?>
                </select>
                <span id="error_paymentType" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="foodBonus"><i class="fas fa-utensils"></i> Bonos de despensa</label>
                <input type="text" class="form-control" id="foodBonus" name="foodBonus" pattern="[0-9]+"
                  title="Solo se permiten números">
                <span id="error_foodBonus" class="text-danger"></span>
              </div>
              <div class="form-group col-md-3">
                <label for="savingFund"><i class="fas fa-piggy-bank"></i> Fondo de ahorro</label>
                <input type="text" class="form-control" id="savingFund" name="savingFund" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
                <span id="error_savingFund" class="text-danger"></span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="bank"><i class="fas fa-money-check"></i> Banco</label>
                <select class="form-control" id="bank" name="bank">
                  <option value="">- Seleccione -</option>
                  <option value="BBVA">BBVA</option>
                  <option value="Bancomer">Bancomer</option>
                  <option value="Banorte">Banorte</option>
                  <option value="HSBC">HSBC</option>
                  <option value="Inbursa">Inbursa</option>
                  <option value="Santander">Santander</option>
                  <option value="Scotiabank">Scotiabank</option>
                  <!-- Agrega más opciones según sea necesario -->
                </select>
                <span id="error_bank" class="text-danger"></span>
              </div>
              <div class="form-group col-md-6">
                <label for="bankAcc"><i class="fa-solid fa-money-check-dollar"></i> Cuenta bancaria</label>
                <input type="text" class="form-control" id="bankAcc" name="bankAcc" pattern="[A-Za-z]+"
                  title="Solo se permiten caracteres">
                <span id="error_bankAcc" class="text-danger"></span>
              </div>
            </div>
            <hr>
            <div class="row">

              <div class="form-group col-md-4">
                <!--

                  <button type="submit" id="work_contract" name="generate_contract" class="medium-button">
                    <i class="fa-solid fa-file-pdf"></i> Generar Contrato PDF
                  </button>
                -->
              </div>
              <div class="form-group col-md-4">
                <button class="btn btn-primary btn-block" id="btnGuardarEmpleado">Guardar</button>

              </div>
              <div class="form-group col-md-4">
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>


</main>




<style type="text/css">
  .medium-button {
    font-size: 10px;
    padding: 11px 21px;
    background-color: #e61d1dbf;
    /* Replace with your desired color code */
    font-weight: bold;

  }
</style>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="jefeDirectoModalLabel"
  aria-hidden="true" id="modalJefeDirecto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="jefeDirectoModalLabel">Seleccionar jefe directo</h4>
        <button type="button" class="close" aria-label="Close" id="modalJefeDirectoClose">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered" id="modalTable">
          <thead>
            <th>Número de empleado</th>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Área</th>       
            <th></th>         
          </thead>
          <tbody>
            <?php 
            for ($j=0; $j < count($director_general); $j++) { 
              $nombreJefe=$director_general[$j]['nombre']." ".$director_general[$j]['apellido1']." ".$director_general[$j]['apellido2'];  
            ?>
              <tr data-id="<?=$director_general[$j]['usuarioId']?>" data-jefe="<?=$nombreJefe?>">
                <td><?=$director_general[$j]['numEmpleado']?></td>
                <td><?=$nombreJefe?></td>
                <td><?=$director_general[$j]['puesto']?></td>
                <td><?=$director_general[$j]['area']?></td>
                <td><button class="btn btn-success seleccionar-jefe">Seleccionar</button></td>
              </tr>
          <?php 
            }
            ?>
            <?php 
            for ($i=0; $i < count($empleados); $i++) { 
              $nombreJefe=$empleados[$i]['nombre']." ".$empleados[$i]['apellido1']." ".$empleados[$i]['apellido2'];  
            ?>
              <tr data-id="<?=$empleados[$i]['usuarioId']?>" data-jefe="<?=$nombreJefe?>">
                <td><?=$empleados[$i]['numEmpleado']?></td>
                <td><?=$nombreJefe?></td>
                <td><?=$empleados[$i]['puesto']?></td>
                <td><?=$empleados[$i]['area']?></td>
                <td><button class="btn btn-success seleccionar-jefe">Seleccionar</button></td>
              </tr>
          <?php 
            }
            ?>
          </tbody>
        </table>
        <input type="hidden" id="superUser" value="NULL">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cancelarModalJefe">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="hijosModalLabel"
  aria-hidden="true" id="modalHijos">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="hijosModalLabel">Hijos</h4>
        <button type="button" class="close" aria-label="Close" id="modalHijosClose">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="rowHijos">
          <div class="row fila-form">
            <div class="form-group col-md-6">
              <label><i class="fas fa-child"></i> Nombre</label>
              <input type="text" class="form-control childName" pattern="[A-Za-z0-9]+" title="Solo se permiten caracteres">              
            </div>
            <div class="form-group col-md-6">
              <label><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</label>
              <input type="date" class="form-control childDob">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <div class="col-4">
            <button class="btn btn-success btn-block" id="agregarHijo"><i class="fas fa-plus"></i></button>
          </div>
          <div class="col"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" id="limpiarModalHijos">Limpiar</button>
        <button class="btn btn-primary" id="guardarModalHijos">Guardar</button>
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

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 JS -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
  let arrHijos=[];
  var table = $('#modalTable').DataTable({
    "pageLength": 0,
    "lengthMenu": [5, 10, 15],
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
  });

  $("#btnJefeDirecto").click(function () {
    $('#modalJefeDirecto').modal('show');
  });

  $("#modalJefeDirectoClose").click(function () {
    $('#modalJefeDirecto').modal('hide');
  });

  $("#cancelarModalJefe").click(function(){
    $('#modalJefeDirecto').modal('hide');
    $("#btnJefeDirecto").text('- Seleccione -');
    $("#superUser").val('NULL');
  });

  $(".seleccionar-jefe").click(function(){
    let parentTr=$(this).parent().parent();
    let userId=parentTr.attr('data-id');
    let nombreJefe=parentTr.attr('data-jefe');

    $("#btnJefeDirecto").text(nombreJefe);
    $('#modalJefeDirecto').modal('hide');
    $("#superUser").val(userId);
  });
  


  $('#maritalStatus').change(function () {  
    let estadoCivil = $(this).val();
    let fieldSpouseName=$("#spouseName");
    let fieldSpouseDob=$("#spouseDob");    
    if (estadoCivil === 'Casado(a)' || estadoCivil === 'Unión Libre') {
      //$('#tab1').addClass('show active');
      //$('#tab2').removeClass('show active');
      //$('#infoModal').modal('show');
      fieldSpouseName.prop('disabled', false);
      fieldSpouseDob.prop('disabled', false);      
    } else {
      //$('#tab2').addClass('show active');
      //$('#tab1').removeClass('show active');
      //$('#infoModal').modal('show');      
      fieldSpouseName.prop('disabled', true);
      fieldSpouseDob.prop('disabled', true);       
      fieldSpouseName.val('');
      fieldSpouseDob.val('');
    }
    /*
    */
  });

  $("#childrenInfo").click(function(){
    $('#modalHijos').modal('show');
  });

  $("#modalHijosClose").click(function () {
    $('#modalHijos').modal('hide');
  });

  $("#limpiarModalHijos").click(function(){
    $('#modalHijos').modal('hide');
    let linea='<div class="row fila-form">'; 
    linea+='<div class="form-group col-md-6">';
    linea+= '<label><i class="fas fa-child"></i> Nombre</label>';
    linea+= '<input type="text" class="form-control childName" name="childName" pattern="[A-Za-z0-9]+" title="Solo se permiten caracteres">';               
    linea+= '</div>'
    linea+= '<div class="form-group col-md-6">'
    linea+= '<label><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</label>'
    linea+= '<input type="date" class="form-control childDob" name="childDob">';
    linea+= '</div>';
    linea+= '</div>';
    $("#rowHijos").html(linea);   
    arrHijos=[]; 
    $("#childrenInfo").text('0');
    //$("#btnJefeDirecto").text('- Seleccione -');
    //$("#superUser").val('NULL');
  });  

  $("#agregarHijo").click(function(){
    let linea='<div class="row fila-form">'; 
    linea+='<div class="form-group col-md-6">';
    linea+= '<label><i class="fas fa-child"></i> Nombre</label>';
    linea+= '<input type="text" class="form-control childName" name="childName" pattern="[A-Za-z0-9]+" title="Solo se permiten caracteres">';               
    linea+= '</div>'
    linea+= '<div class="form-group col-md-6">'
    linea+= '<label><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</label>'
    linea+= '<input type="date" class="form-control childDob" name="childDob">';
    linea+= '</div>';
    linea+= '</div>';
    $("#rowHijos").append(linea);
  });

  $("#guardarModalHijos").click(function(){
    arrHijos=[];
    $(".fila-form").each(function() {
      let nombreHijo=$(this).find('.childName').val();
      let fechaNacHijo=$(this).find('.childDob').val();      
      if(nombreHijo!='' && fechaNacHijo!=''){
        arrHijos.push([nombreHijo, fechaNacHijo]);
      }
    });
    console.log(arrHijos);
    $("#childrenInfo").text(arrHijos.length);
    $('#modalHijos').modal('hide');
  });

  $("#area").on('change', function () {
    let area_id = $(this).val();
    recargar_select(area_id, 'section');
    recargar_select(0, 'position');
    //recargar_section(area_id);
  });

  $("#section").on('change', function () {
    let section_id = $(this).val();
    recargar_select(section_id, 'position');
    //recargar_position(section_id);
  });

  $("#estado").on('change', function () {
    let estado_id = $(this).val();
    recargar_select(estado_id, 'municipio');
    recargar_select(0, 'colonia');
    $("#postalcode").val('');
  });

  $("#municipio").on('change', function () {
    let municipio_id = $(this).val();
    recargar_select(municipio_id, 'colonia');
    $("#postalcode").val('');
  });

  $("#colonia").on('change', function () {
    let cp = $(this).find(':selected').data('cp')
    $("#postalcode").val(cp);
  });

  $("#btnGuardarEmpleado").click(function () {
    let empNum = $("#empNum").val(); 
    let lastName1 = $("#lastName1").val(); 
    let lastName2 = $("#lastName2").val(); 
    let name = $("#name").val(); 
    let recDate = $("#recDate").val(); 
    let position = $("#position").val(); 
    let ceco = $("#ceco").val(); 
    let dateOfBirth = $("#dateOfBirth").val(); 
    let placeOfBirth = $("#placeOfBirth").val(); 
    let gender = $("#gender").val();

    let maritalStatus = $("#maritalStatus").val(); 
    let spouseName = $("#spouseName").val();
    let spouseDob = $("#spouseDob").val();    
    
    let nss = $("#nss").val(); 
    let curp = $("#curp").val(); 
    let rfc = $("#rfc").val(); 
    let rfcZipCode = $("#rfcZipCode").val();     
    let education = $("#education").val(); 
    let colonia = $("#colonia").val(); 
    let address = $("#address").val(); 
    let email = $("#email").val(); 
    let phone = $("#phone").val(); 
    let shirtSize = $("#shirtSize").val(); 
    let pantsSize = $("#pantsSize").val(); 
    let shoeSize = $("#shoeSize").val(); 
    let illnesses = $("#illnesses").val(); 
    let allergies = $("#allergies").val(); 
    let medication = $("#medication").val(); 
    let emerPhone1 = $("#emerPhone1").val(); 
    let emerPhone2 = $("#emerPhone2").val(); 
    let baseSalary = $("#baseSalary").val(); 
    let paymentType = $("#paymentType").val(); 
    let foodBonus = $("#foodBonus").val(); 
    let savingFund = $("#savingFund").val(); 
    let bank = $("#bank").val(); 
    let bankAcc = $("#bankAcc").val(); 
    let superUser = $("#superUser").val(); 

    let fd = new FormData();
    //btnJefeDirecto
    mostrarErrorJefeDirecto($("#superUser"), $("#btnJefeDirecto"), 'Jefe directo obligatorio', 'error_btnJefeDirecto');
    //mostrarErrorJefeDirecto = (valiHidden, valiButton, msg, errorEl)

    mostrarError($("#empNum"), 'Número de empleado obligatorio', 'error_empNum');
    mostrarError($("#lastName1"), 'Apellido paterno obligatorio', 'error_lastName1',true,3,50);
    mostrarError($("#lastName2"), 'Apellido materno obligatorio', 'error_lastName2',true,3,50);
    mostrarError($("#name"), 'Nombre(s) obligatorio', 'error_name',true,3,50);
    mostrarError($("#recDate"), 'Fecha de ingreso obligatoria', 'error_recDate');
    mostrarError($("#area"), 'Area obligatoria', 'error_area');
    mostrarError($("#section"), 'Departamento obligatorio', 'error_section');
    mostrarError($("#position"), 'Puesto obligatorio', 'error_position');
    mostrarError($("#ceco"), 'Centro de costo obligatorio', 'error_ceco');
    mostrarError($("#dateOfBirth"), 'Fecha de nacimiento obligatoria', 'error_dateOfBirth');
    mostrarError($("#placeOfBirth"), 'Lugar de nacimiento obligatorio', 'error_placeOfBirth',true,3,100);
    mostrarError($("#gender"), 'Sexo del/la empleado(a) obligatorio', 'error_gender');
    mostrarError($("#maritalStatus"), 'Estado civil obligatorio', 'error_maritalStatus');

    if(maritalStatus==="Casado(a)" || maritalStatus==="Unión Libre"){
      mostrarError($("#spouseName"), 'Nombre de cónyuge/pareja obligatorio', 'error_spouseName',true,3,100);
      mostrarError($("#spouseDob"), 'Fecha de nacimiento de cónyuge/pareja obligatorio', 'error_spouseDob');      
    }
    
    mostrarError($("#nss"), 'Número de seguridad social obligatorio', 'error_nss',true,3,45);
    mostrarError($("#curp"), 'CURP obligatorio', 'error_curp',true,3,100);
    mostrarError($("#rfc"), 'RFC obligatorio', 'error_rfc',true,3,100);
    mostrarError($("#rfcZipCode"), 'Código Postal del RFC obligatorio', 'error_rfcZipCode',true,3,100);
    mostrarError($("#address"), 'Domicilio obligatorio', 'error_address',true,3,100);
    mostrarError($("#colonia"), 'Colonia obligatoria', 'error_colonia');
    mostrarError($("#municipio"), 'Municipio obligatorio', 'error_municipio');
    mostrarError($("#estado"), 'Estado obligatorio', 'error_estado');
    mostrarError($("#postalcode"), 'Código postal obligatorio', 'error_postalcode');
    mostrarError($("#education"), 'Escolaridad obligatoria', 'error_education',true,3,45);
    mostrarError($("#email"), 'Correo electrónico obligatorio', 'error_email',true,3,50);
    mostrarError($("#phone"), 'Teléfono obligatorio', 'error_phone',true,3,20);
    mostrarError($("#baseSalary"), 'Sueldo base obligatorio', 'error_baseSalary');
    mostrarError($("#paymentType"), 'Tipo de pago obligatorio', 'error_paymentType');
    mostrarError($("#foodBonus"), 'Bonos de despensa obligatorios', 'error_foodBonus');
    mostrarError($("#savingFund"), 'Fondo de ahorro obligatorio', 'error_savingFund');
    mostrarError($("#bank"), 'Banco obligatorio', 'error_bank',true,3,45);
    mostrarError($("#bankAcc"), 'Cuenta de banco obligatorio', 'error_bankAcc',true,3,100);

    console.log({
      empNum, lastName1, lastName2, name, recDate, position, ceco, dateOfBirth, placeOfBirth, gender, maritalStatus, spouseName, spouseDob, nss, curp, rfc, education, colonia, address, email, phone, shirtSize, pantsSize, shoeSize, illnesses, allergies, medication, emerPhone1, emerPhone2, baseSalary, paymentType, foodBonus, savingFund, bank, bankAcc, superUser
    });

    fd.append('empNum', empNum);
    fd.append('lastName1', lastName1);
    fd.append('lastName2', lastName2);
    fd.append('name', name);
    fd.append('recDate', recDate);
    fd.append('position', position);
    fd.append('ceco', ceco);
    fd.append('dateOfBirth', dateOfBirth);
    fd.append('placeOfBirth', placeOfBirth);
    fd.append('gender', gender);
    fd.append('maritalStatus', maritalStatus);
    fd.append('spouseName', spouseName);
    fd.append('spouseDob', spouseDob);
    fd.append('nss', nss);
    fd.append('curp', curp);
    fd.append('rfc', rfc);
    fd.append('rfcZipCode', rfcZipCode);    
    fd.append('education', education);
    fd.append('colonia', colonia);
    fd.append('address', address);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('shirtSize', shirtSize);
    fd.append('pantsSize', pantsSize);
    fd.append('shoeSize', shoeSize);
    fd.append('illnesses', illnesses);
    fd.append('allergies', allergies);
    fd.append('medication', medication);
    fd.append('emerPhone1', emerPhone1);
    fd.append('emerPhone2', emerPhone2);
    fd.append('baseSalary', baseSalary);
    fd.append('paymentType', paymentType);
    fd.append('foodBonus', foodBonus);
    fd.append('savingFund', savingFund);
    fd.append('bank', bank);
    fd.append('bankAcc', bankAcc);
    fd.append('superUser', superUser);
    //console.log(validarNumCar(lastName1,3,100));
    //subir_test(name, lastName1, lastName2);
    //return false;
    if(empNum!=""&&(lastName1!=""&&validarNumCar(lastName1,3,50))&&(lastName2!=""&&validarNumCar(lastName2,3,50))&&(name!=""&&validarNumCar(name,3,50))&&recDate!=""&&position!=""&&ceco!=""&&dateOfBirth!=""&&(placeOfBirth!=""&&validarNumCar(placeOfBirth,3,100))&&gender!=""&&maritalStatus!=""&&(nss!=""&&validarNumCar(nss,3,45))&&(curp!=""&&validarNumCar(curp,3,100))&&(rfc!=""&&validarNumCar(rfc,3,100))&&(rfcZipCode!=""&&validarNumCar(rfcZipCode,3,100))&&(education!=""&&validarNumCar(education,3,45))&&colonia!=""&&(address!=""&&validarNumCar(address,3,100))&&(email!=""&&validarNumCar(email,3,100))&&(phone!=""&&validarNumCar(phone,3,20))&&baseSalary!=""&&paymentType!=""&&foodBonus!=""&&savingFund!=""&&(bank!=""&&validarNumCar(bank,3,45))&&(bankAcc!=""&&validarNumCar(bankAcc,3,100))&&superUser!=""){
      
      if(maritalStatus==="Casado(a)" || maritalStatus==="Unión Libre"){
        if((spouseName!=""&&validarNumCar(spouseName,3,100))&&spouseDob!=""){

          enviarInfo(fd);
          console.log('procede - con conyuge');
        }else{
          console.log('no procede - faltan campos de conyuge');
        }
      }else{
        //aqui omitimos los campos de nombre y fecha de nacimiento de pareja
        enviarInfo(fd);
        console.log('procede - sin conyuge');
      }
      
    }else{
      console.log('no procede - faltan campos obligatorios');
    }
  });

  const recargar_select = (parentId, tipo) => {
    $.ajax({
      url: "layout/select_options/" + tipo + ".php",
      type: "POST",
      data: { parentId }
    }).done(function (response) {
      $("#" + tipo).empty();
      $("#" + tipo).append('<option value="">- Seleccione -</option>');
      $("#" + tipo).append(response);
      console.log(response);
    });
  }

  const mostrarError = (vali, msg, errorEl, isText=false, inf=0, sup=0) => {
    let valor=vali.val();
    if (valor == '') {
      $('#' + errorEl).text(msg);
      vali.css('border-color', '#cc0000');
      //CuentaMayor = '';
    } else {
      msg = '';
      $('#' + errorEl).text(msg);
      vali.css('border-color', '');
      if(isText && (valor.length<inf||valor.length>sup)){
        $('#' + errorEl).text('Cantidad de carácteres inválida');
        vali.css('border-color', '#cc0000');        
      }
    }
  }

  const mostrarErrorJefeDirecto = (valiHidden, valiButton, msg, errorEl) => {
    if (valiHidden.val() == 'NULL') {
      $('#' + errorEl).text(msg);
      valiButton.css('border-color', '#cc0000');
      //CuentaMayor = '';
    } else {
      msg = '';
      $('#' + errorEl).text(msg);
      valiButton.css('border-color', '');
    }
  }  

  const enviarInfo = (fd) => {

    fetch('altas/subir_actualizar_empleado.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })   
  }


  const subir_test = (name, lastName1, lastName2) => {
    let datos = {
      name,
      lastName1,
      lastName2
    }
        
    let fd = new FormData();

    for(var key in datos){
      fd.append(key, datos[key]);
    }

    fetch('altas/subir_test.php', {
      method: "POST",
      body: fd
    })
    .then(response => {
      return response.ok ? response.json() : Promise.reject(response);
    })
    .then(data => {
      console.log(data);
    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })

  }

  const validarNumCar = (texto, inf, sup) => {
    if(texto.length<=sup && texto.length>=inf){
      return true;
    }else{
      return false;
    }
  }
</script>