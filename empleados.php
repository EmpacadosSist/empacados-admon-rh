<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empleados</title>
  <?php require 'layout/libreriasdatatable.php';?>


  <?php require 'nav.php'; ?>
  <?php require 'layout/sidebar.php';?>
  <?php $empleados = Consultas::listUsers($conn); ?>
  <?php $autorizaciones = Consultas::listAuthorizations($conn); ?> 
  <?php $user = Consultas::listOneUser($conn, 1); ?>
   


</head>

<body>
  <!-- jQuery y Bootstrap JS -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>

  <!-- Importar anime.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    /* Estilos opcionales para el elemento h2 */
    #vacaciones {
      font-size: 24px;
      /* Tamaño de fuente inicial */
      opacity: 0;
      /* Opacidad inicial */
    }
  </style>


  <style type="text/css">
    button.active {

      background-color: green;
      /* Cambia el color de fondo cuando el botón está activo */
      color: white;
      /* Cambia el color del texto cuando el botón está activo */
    }

    .btn-info {
      color: #fff !important;
      background-color: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }

    .btn-danger {
      color: #fff !important;
      background-color: #dc3545 !important;
      border-color: #dc3545 !important;
    }

    .btn-success {
      color: #fff !important;
      background-color: #218838 !important;
      border-color: #1e7e34 !important;
    }

    div.dt-button-collection {
      top: -195px !important;
      left: -193.146px !important;
    }

    .button.dt-button,
    div.dt-button,
    a.dt-button,
    input.dt-button {
      position: relative;
      background-color: #4CAF50 !important;
      border: none !important;
      font-size: 28px !important;
      color: #FFFFFF !important;
      padding: 20px !important;
      width: 200px;
      text-align: center;
      transition-duration: 0.4s;
      text-decoration: none;
      overflow: hidden;
      cursor: pointer;
    }

    .button:after {
      content: "";
      background: #f1f1f1;
      display: block;
      position: absolute;
      padding-top: 300%;
      padding-left: 350%;
      margin-left: -20px !important;
      margin-top: -120%;
      opacity: 0;
      transition: all 0.8s
    }

    .button:active:after {
      padding: 0;
      margin: 0;
      opacity: 1;
      transition: 0s
    }
  </style>


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
      background: #f6f9ff;
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
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Información
                de mis Empleados
                <img style="text-align: center;" src="assets/img/lounger.gif" width="50" alt="">
              </h2>
              <!-- <div>
                Mostrar/Ocultar columna:
                <a class="toggle-vis" data-column="0"><button>Nombre</button></a>
                <a class="toggle-vis" data-column="1"><button>Apellido Paterno</button></a>
                <a class="toggle-vis" data-column="2"><button>Apellido Materno</button></a>
                <a class="toggle-vis" data-column="3"><button>Fecha de Nacimiento</button></a>
                <a class="toggle-vis" data-column="4"><button>Fecha Ingreso</button></a>
              </div>
              <br> -->

              <div>
                <div class="container mt-4">
                  <!-- Pestañas -->
                  <ul class="nav nav-tabs" id="pestanas" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pestaña1-tab" data-toggle="tab" href="#contenido1" role="tab"
                        aria-controls="contenido1" aria-selected="true">Empleados</a>
                    </li>
                    <!--

                      <li class="nav-item">
                        <a class="nav-link" id="pestaña2-tab" data-toggle="tab" href="#contenido2" role="tab"
                        aria-controls="contenido2" aria-selected="false">Empleados-planta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pestaña2-tab" data-toggle="tab" href="#contenido2" role="tab"
                        aria-controls="contenido2" aria-selected="false">Empleados
                        años anteriores</a>
                    </li>
                    -->

                    <!-- Add more tabs as needed -->
                  </ul>
                  <br>
                  <!-- Contenido de las pestañas -->
                  <div class="tab-content" id="contenidoPestanas">
                    <!-- Contenido de la Pestaña 1 -->
                    <div class="tab-pane fade show active" id="contenido1" role="tabpanel"
                      aria-labelledby="pestaña1-tab">
                      <table class="table table-striped table-bordered display nowrap" id="myTable1" style="font-size:74%;width:100%;">
                        <thead>
                          <tr>
                            <th>Permisos</th>
                            <th>Editar empleado</th>
                            <th>Dar de baja</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Estado Civil</th>
                            <!--
                              <th>Dirección</th>
                            -->                            
                            <th>Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th>Departamento</th>
                            <th>Puesto</th>
                            <th>Fecha de Ingreso</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          for ($i=0; $i < count($empleados); $i++) { 
                            //$empleadoNombre=$empleados[$i]['nombre']." ".$empleados[$i]['apellido1']." ".$empleados[$i]['apellido2'];  
                            $numEmpleado=$empleados[$i]['numEmpleado'];
                            $empId=$empleados[$i]['usuarioId'];
                            $name=$empleados[$i]['nombre'];
                            $lastname1=$empleados[$i]['apellido1'];
                            $lastname2=$empleados[$i]['apellido2'];
                            $fechaIngreso=$empleados[$i]['fechaIngreso'];
                            $area=$empleados[$i]['area'];
                            $departamento=$empleados[$i]['departamento'];
                            $puesto=$empleados[$i]['puesto'];
                          ?>
                            <tr data-empId="<?=$empId?>" data-name=<?=$name?> data-NumEmp=<?=$numEmpleado?> data-lastname1=<?= $lastname1 ?> data-lastname2=<?= $lastname2 ?>
                            data-FechaIngreso="<?= $fechaIngreso ?>" data-puesto="<?= $puesto ?>" data-area="<?= $area ?>" data-departamento="<?= $departamento ?>">
                              <td class="text-center"><button class="btn btn-success btn-sm select-permisos"><i class="bi bi-pencil-square"></i></button></td>
                              <td class="text-center"> <a href="editar-empleado.php?id=<?=$empId?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>                              
                              <td class="text-center"><button style="background-color:#be3030;" class="btn btn-secondary btn-sm select-baja"><i class="bi bi-x-lg"></i></button></td>
                              <td><?=$empleados[$i]['nombre']?></td>
                              <td><?=$empleados[$i]['apellido1']?></td>
                              <td><?=$empleados[$i]['apellido2']?></td>
                              <td><?=$empleados[$i]['fechaNacimiento']?></td>
                              <td><?=$empleados[$i]['genero']?></td>                              
                              <td><?=$empleados[$i]['estadoCivil']?></td>
                              <td><?=$empleados[$i]['telefono']?></td>
                              <td><?=$empleados[$i]['correo']?></td>
                              <td><?=$empleados[$i]['departamento']?></td>
                              <td><?=$empleados[$i]['puesto']?></td>
                              <td><?=$empleados[$i]['fechaIngreso']?></td>
                            </tr>
                        <?php 
                          }
                          ?>                        

                        </tbody>
                      </table>
                    </div>

                    <!-- Contenido de la Pestaña 2 -->

                    

                    <!-- Agrega más contenidos de pestañas según sea necesario -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
  </main><!-- End #main -->

  <!-- modal de permisos  -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="permisosModalLabel"
  aria-hidden="true" id="modalPermisos">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="permisosModalLabel">Permisos</h4>
          <button type="button" class="close" aria-label="Close" id="modalPermisosClose">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?php for ($j=0; $j < count($autorizaciones); $j++) { ?>
              <div class="form-check">
                <input class="form-check-input auth-input" type="checkbox" value="<?=$autorizaciones[$j]['autorizacionId']?>" id="auth<?=$j?>">
                <label class="form-check-label" for="auth<?=$j?>">
                  <?=$autorizaciones[$j]['nombreAutorizacion']?>
                </label>
              </div>
          <?php } ?>
          <input type="hidden" id="empId" value="0">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="guardarModalPermisos">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal de bajas  -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="BajasModalLabel"
  aria-hidden="true" id="modalBajas">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="BajasModalLabel">Dar de baja</h4>
          <button type="button" class="close" aria-label="Close" id="modalBajasClose">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
        <section class="section"> 
      <div class="row">
        <div class="col-lg-12">
          <div class="card">   
            <div class="card-body">
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Datos de Empleado
                <img style="text-align: center;" src="assets/img/ecluir.gif" width="50" alt="">
              </h2>
              <div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="employeeNumber"><i class="fas fa-id-card"></i> No. de empleado</label>
                    <input type="text" hidden class="form-control" id="idempl" name="idempl" inputmode="numeric" pattern="[0-9]+" readonly>
                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" inputmode="numeric" pattern="[0-9]+" readonly>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="lastName"><i class="fas fa-user"></i> Apellido Paterno</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" pattern="[A-Za-z]+" title="Solo se permiten caracteres" readonly>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="secondName"><i class="fas fa-user"></i> Apellido Materno</label>
                    <input type="text" class="form-control" id="secondName" name="secondName" pattern="[A-Za-z]+" title="Solo se permiten caracteres" readonly>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="name"><i class="fas fa-user"></i> Nombre(s)</label>
                    <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z]+" title="Solo se permiten caracteres" readonly>
                  </div>
                  <!-- <div class="form-group col-md-3">
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
                  </div> -->
                  <!-- Agrega más campos según sea necesario -->
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="dateadmission"><i class="fas fa-calendar-alt"></i> Fecha de Ingreso</label>
                    <input type="text" class="form-control" id="dateadmission" name="dateadmission" pattern="[A-Za-z]+" title="Solo se permiten caracteres" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="work_area"><i class="fas fa-building"></i> Área</label>
                    <input type="text" class="form-control" id="work_area" name="work_area" readonly></input>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="department"><i class="fas fa-building"></i> Departamento</label>
                    <input type="text" class="form-control" id="department" name="department" readonly></input>        
                  </div>
                  <div class="form-group col-md-5">
                    <label for="position"><i class="fas fa-user-tie"></i> Puesto</label>
                    <input type="text" class="form-control" id="position" name="position" readonly></input>    
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="Costs"><i class="fas fa-dollar-sign"></i> Centro de Costos</label>
                    <select class="form-control" id="Costs" name="Costs" on>
                      <option value="ONLINE">ON LINE</option>              
                    </select>
                  </div> -->
                  <!-- Agrega más campos según sea necesario -->
                </div>      
                
                <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">          
                  Información de Baja Personal
                  <img src="assets/img/cancelar.gif" alt="" width="60">
                </h2> 

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="datedownpersonal"><i class="fas fa-calendar-alt"></i> Fecha de Baja</label>
                    <input type="date" class="form-control" id="datedownpersonal" name="datedownpersonal" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                    <span id="error_fechabaja" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="motivo_separacion"><i class="fas fa-sign-out-alt"></i> Motivo de Separación</label>
                    <input type="text" class="form-control" id="motivo_separacion" name="motivo_separacion">
                    <span id="error_separacion" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="recontratable"><i class="fas fa-undo-alt"></i> Recontratable</label>
                    <select class="form-control" id="recontratable" name="recontratable">
                      <option value="si">Sí</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="noRecontratable"><i class="bi bi-x-circle-fill"></i> Motivo de no recontratacion</label>
                    <textarea class="form-control" disabled id="noRecontratable" name="noRecontratable" rows="3"></textarea>
                    <span id="error_MotivoNo" class="text-danger"></span>
                  </div>
                  <!-- <div class="form-group col-md-5">
                    <label for="rfc"><i class="fas fa-id-badge"></i> RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cp_rfc"><i class="fas fa-map-marker-alt"></i> C.P. del RFC</label>
                    <input type="text" class="form-control" id="cp_rfc" name="cp_rfc">
                  </div> -->
                  <!-- <div class="form-group col-md-4">
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
                  </div> -->
                  <div class="form-group col-md-12">
                    <label for="comentarios"><i class="fas fa-comments"></i> Comentarios</label>
                    <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                    <span id="error_Comentarios" class="text-danger"></span>
                  </div>
                  <div><br><br><br><br><br></div>
                </div>
              </div>
            </div>
            <!-- <button type="submit" id="BtnModalBajaEmpleado" class="btn btn-primary">Guardar</button> -->
        </section>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary" id="btnBajaEmpleado">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/i18n/es.js"></script>
    <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script>  

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

    $(document).ready(function () {
      var table = $('#myTable1').DataTable({
    "pageLength": 0,
    "lengthMenu": [5, 15, 25, 50, 100],
    scrollX: true,
    order: [[2, 'asc']],
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


      $(".select-permisos").click(function(){
        //let fd = new FormData();
        //let empId=$(this).parent().parent().attr('data-empId');
        //let authId;
        //fd.append('userId', empId);
        //$("#empId").val(empId);
        //
        //$(".auth-input").each(async function() {
        //  authId=$(this).val();
        //  fd.append('authorizationId', authId);        
        //  await consulta_permiso(fd,$(this));
        //});
        //
        //$('#modalPermisos').modal('show');
        //console.log("asi origen");
      });    
      
      table.on('click', 'tbody tr .select-permisos', function () {
        let fd = new FormData();
        let empId=$(this).parent().parent().attr('data-empId');
        let authId;
        fd.append('userId', empId);
        $("#empId").val(empId);
        
        $(".auth-input").each(async function() {
          authId=$(this).val();
          fd.append('authorizationId', authId);        
          await consulta_permiso(fd,$(this));
        });
        
        $('#modalPermisos').modal('show');
        //console.log("asi");
      }); 

      table.on('click', 'tbody tr .select-baja', function () {

        let empId=$(this).parent().parent().attr('data-empId');
        let nameEmp=$(this).parent().parent().attr('data-name');
        let numEmp=$(this).parent().parent().attr('data-NumEmp');
        let lastname1=$(this).parent().parent().attr('data-lastname1');
        let lastname2=$(this).parent().parent().attr('data-lastname2');
        let fechaIngreso=$(this).parent().parent().attr('data-FechaIngreso');
        let area=$(this).parent().parent().attr('data-area');
        let departamento=$(this).parent().parent().attr('data-departamento');
        let puesto=$(this).parent().parent().attr('data-puesto');
        
        $("#idempl").val(empId);
        $("#employeeNumber").val(numEmp);
        $("#name").val(nameEmp);
        $("#lastName").val(lastname1);
        $("#secondName").val(lastname2);
        $("#dateadmission").val(fechaIngreso);
        $("#work_area").val(area);
        $("#department").val(departamento);
        $("#position").val(puesto);
        
        $('#modalBajas').modal('show');
        //console.log("asi");
        });  

        $('#btnBajaEmpleado').click(function(){

          let idempl = $('#idempl').val()
          let FechaBaja = $('#datedownpersonal').val()
          let MotivoSeparacion = $('#motivo_separacion').val()
          let Recontratable = $('#recontratable').val()
          let MotivoNoRec = $('#noRecontratable').val()
          let Comentarios = $('#comentarios').val()

          if((FechaBaja ==="" || MotivoSeparacion ==="" || MotivoNoRec ==="" || Comentarios ==="") && Recontratable =="no"){
            
            mostrarError($("#datedownpersonal"), 'Fecha de baja obligatoria', 'error_fechabaja');
            mostrarError($("#motivo_separacion"), 'Motivo de separacion obligatorio', 'error_separacion');
            mostrarError($("#noRecontratable"), 'Motivo de no contratacion obligatorio', 'error_MotivoNo');
            mostrarError($("#comentarios"), 'Comentario obligatorio', 'error_Comentarios');
            $("#error_MotivoNo").attr("hidden", false);
            console.log("no")

          }else if((FechaBaja ==="" || MotivoSeparacion ==="" || Comentarios ==="") && Recontratable =="si"){

            mostrarError($("#datedownpersonal"), 'Fecha de baja obligatoria', 'error_fechabaja');
            mostrarError($("#motivo_separacion"), 'Motivo de separacion obligatorio', 'error_separacion');
            mostrarError($("#comentarios"), 'Comentario obligatorio', 'error_Comentarios');
            $("#error_MotivoNo").attr("hidden", true);
            console.log("si")
            
          }else{

            Swal.fire({
            title: "¿Esta Seguro?",
            text: "Esta accion no se podra revertir",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "cancelar",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, dar de baja"
          }).then((result) => {

            if (result.isConfirmed) {
  
              let fd = new FormData()
  
              fd.append("idempl", idempl)
              fd.append("leaveDate", FechaBaja)
              fd.append("reason", MotivoSeparacion)
              fd.append("rehirable", Recontratable)
              fd.append("noRehirableReason", MotivoNoRec)
              fd.append("comments", Comentarios)
  
              fetch('bajas/deshabilitar_usuario.php',{
                method: "POST",
                body: fd
              })
              .then(response => {
                return response.ok ? response.json() : Promise.reject(promise);
              })
              .then(data => {
                console.log(data);

              })
              Swal.fire({
                title: "Baja Exitosa",
                // text: "El empleado fue dado de baja.",
                icon: "success"
              });
              setTimeout(() => {
                location.reload();
              }, 2000);
            }
          });
        }
      })

      $('#recontratable').change(function(){

        let EstadoContratable = $(this).val();
        let NoRec = $('#noRecontratable');

        if(EstadoContratable === 'si'){
          NoRec.prop('disabled', true);
          NoRec.val('');
        }else{
          NoRec.prop('disabled', false)
        }
      })

      $("#guardarModalPermisos").click(function(){
        let fd = new FormData();
        let empId=$("#empId").val();
        let authId;
        fd.append('userId', empId);

        $(".auth-input").each(function() {
          authId=$(this).val();
          fd.append('authorizationId', authId);  

          if($(this).prop('checked')){
            fd.append('tipo', 1);            
          }else{
            fd.append('tipo', 0);            
          }

          subirAutorizacion(fd);

        });

        $('#modalPermisos').modal('hide');
      });

      $("#modalPermisosClose").click(function(){
        $('#modalPermisos').modal('hide');
      });

      $("#modalBajasClose").click(function(){
        $('#modalBajas').modal('hide');
      });

      const subirAutorizacion = (fd) => {
        fetch('altas/subir_autorizacion_usuario.php', {
            method: "POST",
            body: fd
          }) 
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            console.log(data);
            //location.reload();
          })
          .catch(err => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err);
          })   
      }    
      
      const consulta_permiso = async(fd, elemento) => {
        let resultado;
        elemento.prop('checked',false);
        await fetch('helpers/permiso_seleccionado.php', {
            method: "POST",
            body: fd
          })
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            //console.log(data);
            if(data.rows>0){
              elemento.prop('checked',true);
            }
          })
          .catch(err => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err);

          })          

      }

      // Función para formatear el contenido de las filas secundarias
      function format(data) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
          '<tr>' +
          '<td>Enero:</td>' +
          '<td>' + data[4] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Febrero:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Marzo:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Abril:</td>' +
          '<td>' + data[4] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Mayo:</td>' +
          '<td>' + data[5] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Junio:</td>' +
          '<td>' + data[6] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Julio:</td>' +
          '<td>' + data[7] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Agosto:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Septiembre:</td>' +
          '<td>' + data[9] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Octubre:</td>' +
          '<td>' + data[10] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Noviembre:</td>' +
          '<td>' + data[11] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Diciembre:</td>' +
          '<td>' + data[6] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Edad:</td>' +
          '<td>' + data[3] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Fecha de inicio:</td>' +
          '<td>' + data[14] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Salario:</td>' +
          '<td>' + data[15] + '</td>' +
          '</tr>' +
          '</table>';
      }
      // Agregar evento clic a los botones para mostrar u ocultar columnas
      $('.toggle-vis').on('click', function () {
        var column = table.column($(this).data('column'));
        column.visible(!column.visible());

        // Alternar la clase activa del botón
        $(this).find('button').toggleClass('active');
      });


      document.querySelectorAll('a.toggle-vis').forEach((el) => {
        el.addEventListener('click', function (e) {
          e.preventDefault();

          let columnIdx = e.target.getAttribute('data-column');
          let column = table.column(columnIdx);

          // Toggle the visibility
          column.visible(!column.visible());
        });

      });

    });

  </script>


  <script>
    // Obtener el elemento h2 a animar
    var vacaciones = document.getElementById('vacaciones');

    // Animación utilizando anime.js
    anime({
      targets: vacaciones, // Elemento a animar
      fontSize: '30px',    // Tamaño de fuente final
      opacity: 1,           // Opacidad final
      duration: 1000       // Duración de la animación en milisegundos (1 segundo)
    });
  </script>
  <!-- Script para la animación -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var cornerContainers = document.querySelectorAll('.corner-container');
      var images = document.querySelectorAll('.image-container');

      function animateImages() {
        cornerContainers.forEach(function (container, index) {
          var options = {
            targets: container,
            translateY: ['100%', 0],
            scale: [0, 1], // Efecto de escala
            rotate: [180, 0], // Efecto de rotación
            duration: 1000,
            easing: 'easeInOutQuad',
            delay: 300 * index,
            complete: function (anim) {
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

</body>

</html>