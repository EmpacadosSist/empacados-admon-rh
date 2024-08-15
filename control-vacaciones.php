<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control de vacaciones</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- DataTables Bootstrap 4 JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php //parametro 2 de la siguiente funcion es el id del usuario actual 
$userId=$_SESSION['identity']->userId;
?>
<?php 
//solicitudes de vacaciones pendientes por aprobar o rechazar
$solicitudesPendientes = Consultas::listVacationsPeriods($conn, $userId, 'V', 'P'); 
//$solicitudesPendientes=[];
?>

<?php 
//solicitudes de vacaciones aprobadas por el jefe. Solo se deben mostrar las que aun no llegan a la fecha o los que estan en transcurso. se podra revertir
///**** 1. en la pestaña Aprobados, se mostraran las aprobadas cuya fecha aun no llega (antes de la fecha de inicio de las vacaciones)
///**** 2. en la pestaña Ausentes, se mostraran las aprobadas cuya fecha está en transcurso
$solicitudesAprobadas = Consultas::listVacationsPeriods($conn, $userId, 'V', 'A'); 

$solicitudesRechazadas = Consultas::listVacationsPeriods($conn, $userId, 'V', 'R'); 

$solicitudesCancelacion = Consultas::listVacationsPeriods($conn, $userId, 'C', 'P');

?>





<?php 
//cancelacion de solicitudes de vacaciones
$cancelacionesPendientes = Consultas::listVacationsPeriods($conn, $userId, 'C', 'P'); 

$fechaActual=date('Y-m-d');
?>

<body>
<main id="main" class="main">
  <?php //var_dump($solicitudesCancelacion); ?>
  <div class="pagetitle">
    <h1>CONTROL DE VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->

  <div class="container mt-4">
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="pestanas" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Pendientes</a>
      </li>
      <!-- Agrega más pestañas según sea necesario -->
      <li class="nav-item">
        <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2" aria-selected="true">Aprobadas</a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" id="pestaña3" data-toggle="tab" href="#contenido3" role="tab" aria-controls="contenido3" aria-selected="true">Rechazadas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pestaña4" data-toggle="tab" href="#contenido4" role="tab" aria-controls="contenido4" aria-selected="true">Ausentes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pestaña5" data-toggle="tab" href="#contenido5" role="tab" aria-controls="contenido5" aria-selected="true">Solicitudes de cancelación</a>
      </li>                   
    </ul>
    <br>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="contenidoPestanas">
      <!-- Contenido de la Pestaña 1 -->
      <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>    
                <th>Tipo de horario</th>   
                <th>Rechazar</th>
                <th>Aprobar</th>
              </tr>                
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($solicitudesPendientes); $i++) { ?>
              
              <?php 
                  $dateFormatInicio = strtotime($solicitudesPendientes[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesPendientes[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal); 
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>
              <tr data-vp="<?=$solicitudesPendientes[$i]['periodoId']?>" data-correo="<?=$solicitudesPendientes[$i]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesPendientes[$i]['nombre']?>" data-numemp="<?=$solicitudesPendientes[$i]['numEmpleado']?>">
                <td><?=$solicitudesPendientes[$i]['numEmpleado']?></td>
                <td><?=$solicitudesPendientes[$i]['nombre']?></td>
                <td><?=$requestedDays?></td>
                <td><?=$solicitudesPendientes[$i]['numDias']?></td>
                <td><?=$solicitudesPendientes[$i]['tipoHorario']?></td>
                <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#rechazarModal" onclick="set_vp_id(this)"><i class="bi bi-x-circle-fill"></i></button></td>
                <td class="text-center"><button class="btn btn-success" data-toggle="modal" data-target="#confirmarModal" onclick="set_vp_id(this)"><i class="bi bi-check-circle-fill"></i></button></td>
              </tr>   

              <?php 
                  //}
                } 
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
      <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable2">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>    
                <th>Tipo de horario</th>
                <th>Revertir</th>   
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($solicitudesAprobadas); $i++) {  
              if(!check_in_range($solicitudesAprobadas[$i]['fechaInicio'], $solicitudesAprobadas[$i]['fechaFinal'], $fechaActual)){
              ?>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadas[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadas[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>                
              <tr data-vp="<?=$solicitudesAprobadas[$i]['periodoId']?>" data-correo="<?=$solicitudesAprobadas[$i]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesAprobadas[$i]['nombre']?>" data-numemp="<?=$solicitudesAprobadas[$i]['numEmpleado']?>">
                <td><?=$solicitudesAprobadas[$i]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadas[$i]['nombre']?></td>
                <td><?=$requestedDays?></td>
                <td><?=$solicitudesAprobadas[$i]['numDias']?></td>
                <td><?=$solicitudesAprobadas[$i]['tipoHorario']?></td>
                <?php if(old_dates($solicitudesAprobadas[$i]['fechaFinal'], $fechaActual)){ ?>
                  <td class="text-center"><button class="btn btn-danger" id="revertirAp"><i class="bi bi-arrow-left-circle-fill"></i></button></td>
                <?php }else{ ?>
                  <td class="text-center"><button class="btn btn-danger" disabled><i class="bi bi-arrow-left-circle-fill"></i></button></td>
                <?php } ?>
              </tr>  
              <?php 
                }
              
              } ?>
              <!--
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-arrow-left-circle-fill"></i></i></button></td>
              </tr>
              -->
                                      
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido3" role="tabpanel" aria-labelledby="pestaña3">
      <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable3">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>    
                <th>Tipo de horario</th>
                <th>Revertir</th>   
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($solicitudesRechazadas); $i++) {  ?>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesRechazadas[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesRechazadas[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>                
              <tr data-vp="<?=$solicitudesRechazadas[$i]['periodoId']?>" data-correo="<?=$solicitudesRechazadas[$i]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesRechazadas[$i]['nombre']?>" data-numemp="<?=$solicitudesRechazadas[$i]['numEmpleado']?>">
                <td><?=$solicitudesRechazadas[$i]['numEmpleado']?></td>
                <td><?=$solicitudesRechazadas[$i]['nombre']?></td>
                <td><?=$requestedDays?></td>
                <td><?=$solicitudesRechazadas[$i]['numDias']?></td>
                <td><?=$solicitudesRechazadas[$i]['tipoHorario']?></td>
                <td class="text-center"><button class="btn btn-danger" id="revertirRec"><i class="bi bi-arrow-left-circle-fill"></i></button></td>
              </tr>  
              <?php } ?>
              <!--
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-arrow-left-circle-fill"></i></i></button></td>
              </tr>
              -->
                                      
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido4" role="tabpanel" aria-labelledby="pestaña4">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable4">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>   
                <th>Tipo de horario</th>    
              </tr>                
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($solicitudesAprobadas); $i++) {  
                  if(check_in_range($solicitudesAprobadas[$i]['fechaInicio'], $solicitudesAprobadas[$i]['fechaFinal'], $fechaActual)){
              ?>
              <tr>
                <td><?=$solicitudesAprobadas[$i]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadas[$i]['nombre']?></td>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadas[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadas[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                ?>
                <td><?=$fechaInicio?> - <?=$fechaFinal?></td>
                <td><?=$solicitudesAprobadas[$i]['numDias']?></td>
                <td><?=$solicitudesAprobadas[$i]['tipoHorario']?></td>
              </tr>   

              <?php 
                  }
                } 
              ?>
              <!--
                <tr>
                  <td>105207</td>
                  <td>Roberto Carlos Reyes Medrano</td>
                  <td>20/05/2024 - 27/05/2024</td>
                  <td>5</td>
                  <td>A</td>
                  <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#rechazarModal"><i class="bi bi-x-circle-fill"></i></button></td>
                  <td class="text-center"><button class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button></td>
                </tr> 
                -->

            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido5" role="tabpanel" aria-labelledby="pestaña5">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable5">
            <thead>
              <tr>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Periodo</th>
                <th>Número de días</th>   
                <th>Tipo de horario</th>  
                <th>Rechazar</th>
                <th>Aprobar</th>
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($solicitudesCancelacion); $i++) {  ?>
              <?php 
                  $dateFormatInicio = strtotime($solicitudesCancelacion[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesCancelacion[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>                
              <tr data-vp="<?=$solicitudesCancelacion[$i]['periodoId']?>" data-correo="<?=$solicitudesCancelacion[$i]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesCancelacion[$i]['nombre']?>" data-numemp="<?=$solicitudesCancelacion[$i]['numEmpleado']?>">
                <td><?=$solicitudesCancelacion[$i]['numEmpleado']?></td>
                <td><?=$solicitudesCancelacion[$i]['nombre']?></td>
                <td><?=$requestedDays?></td>
                <td><?=$solicitudesCancelacion[$i]['numDias']?></td>
                <td><?=$solicitudesCancelacion[$i]['tipoHorario']?></td>
                <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#confirmarCancModal" onclick="set_vp_id(this, 'R')"><i class="bi bi-x-circle-fill"></i></button></td>
                <td class="text-center"><button class="btn btn-success" data-toggle="modal" data-target="#confirmarCancModal" onclick="set_vp_id(this, 'A')"><i class="bi bi-check-circle-fill"></i></button></td>
              </tr>  
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

      <?php


    /* Función */
    function check_in_range($fecha_inicio, $fecha_fin, $fecha){

         $fecha_inicio = strtotime($fecha_inicio);
         $fecha_fin = strtotime($fecha_fin);
         $fecha = strtotime($fecha);

         if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
             return true;
         else
             return false;
    }

    function old_dates($fecha_fin, $fecha){

      $fecha_fin = strtotime($fecha_fin);
      $fecha = strtotime($fecha);

      if(($fecha > $fecha_fin))
          return false;
      else
          return true;
    }    
    

    ?>

  <div class="modal fade" id="rechazarModal" tabindex="-1" role="dialog" aria-labelledby="rechazarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rechazarModalLabel">Especificar motivo de rechazo:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <textarea class="form-control" id="reason" maxlength="144"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="rechazarSolic">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

    <input type="hidden" id="vpId" value="">    
    <input type="hidden" id="numEmp" value="">
    <input type="hidden" id="nombre" value="">
    <input type="hidden" id="requestedDays" value="">
    <input type="hidden" id="correo" value="">

    <input type="hidden" id="canc" value="">

  <div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="cancelarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cancelarModalLabel">Confirmación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Seguro(a) que desea aceptar la cancelación?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary">Si</button>
        </div>
      </div>
    </div>
  </div>  

  <div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmarModalLabel">Confirmación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Seguro(a) que desea aprobar la solicitud?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary" id="confirmarSolic">Si</button>
        </div>
      </div>
    </div>
  </div>   
  
  <div class="modal fade" id="confirmarCancModal" tabindex="-1" role="dialog" aria-labelledby="confirmarCancModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmarCancModalLabel">Confirmación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Seguro(a) que desea aprobar/rechazar la solicitud?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary" id="confirmarCancSolic">Si</button>
        </div>
      </div>
    </div>
  </div>  




  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $(document).ready(function () {
        let objOptions={
          lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
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
        };

        var table1 = $('#myTable').DataTable(objOptions);
        var table2 = $('#myTable2').DataTable(objOptions);
        var table3 = $('#myTable3').DataTable(objOptions);
        var table4 = $('#myTable4').DataTable(objOptions);
        var table5 = $('#myTable5').DataTable(objOptions);                                  
        
        
      });


      $("#rechazarSolic").click(function(){
        aprobar_rechazar('R');
      });

      $("#confirmarSolic").click(function(){
        aprobar_rechazar('A');
      });
      
      $("#confirmarCancSolic").click(function(){
        let isCanc = $("#canc").val();
        alert(isCanc);
      });      

      $("#revertirAp").click(function(){
        revertir(this);      
      })

      $("#revertirRec").click(function(){
        revertir(this);
      })      

      const set_vp_id = (_this,canc="") => {
        $("#reason").val('');
        //estatusLetra
        let vpId=$(_this).parent().parent().attr('data-vp');
        let numEmp=$(_this).parent().parent().attr('data-numemp');
        let nombre=$(_this).parent().parent().attr('data-nombre');         
        let rDias=$(_this).parent().parent().attr('data-rdias'); 
        let correo=$(_this).parent().parent().attr('data-correo');
        
        $("#vpId").val(vpId);
        $("#numEmp").val(numEmp);
        $("#nombre").val(nombre);
        $("#requestedDays").val(rDias);
        $("#correo").val(correo);
        $("#canc").val(canc);
      }

      const revertir = (_this) => {
        $(".loader").show();
        $("#reason").val('');
        let vacationsPeriodId=$(_this).parent().parent().attr('data-vp');
        let empNum=$(_this).parent().parent().attr('data-numemp');
        let nombre=$(_this).parent().parent().attr('data-nombre');         
        let requestedDays=$(_this).parent().parent().attr('data-rdias'); 
        let correo=$(_this).parent().parent().attr('data-correo');
        let reason = '';

        let datos = {
          vacationsPeriodId,
          estatusLetra: 'P',
          empNum,
          nombre,
          requestedDays,
          correo,
          reason
        }   
        
        console.log(datos);

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('cambios/aprobar_rechazar_vacaciones.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          //window.location.href = "proceso-completo.php?op=v";
          window.location.replace('control-vacaciones.php');
          console.log(data);
        })
        .catch(err => {
          $(".loader").hide();
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })     
      }

      const aprobar_rechazar = (estatusLetra) => {
        $(".loader").show();
        //let estatusLetra = 'A';
        let vacationsPeriodId = $("#vpId").val();
        let empNum = $("#numEmp").val();
        let nombre = $("#nombre").val();
        let requestedDays = $("#requestedDays").val(); 
        let correo = $("#correo").val();
        let reason = $("#reason").val();

        let datos = {
          vacationsPeriodId,
          estatusLetra,
          empNum,
          nombre,
          requestedDays,
          correo,
          reason
        }

        console.log(datos);        
        //alert("se aprueba");

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('cambios/aprobar_rechazar_vacaciones.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          //window.location.href = "proceso-completo.php?op=v";
          window.location.replace('control-vacaciones.php');
          console.log(data);
        })
        .catch(err => {
          $(".loader").hide();
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })        
      }
    </script>

    </main>
    <?php require 'layout/footer.php';?>
  </body>

</html>