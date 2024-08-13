<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Solicitar vacaciones</title>
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
<?php $historial=Consultas::listVacationsPeriodsByUser($conn,$_SESSION['identity']->userId,'V'); ?>
<?php $cancelaciones=Consultas::listVacationsPeriodsByUser($conn,$_SESSION['identity']->userId,'C'); ?>
<?php $correoJefe = Consultas::listOneRawUser($conn, $_SESSION['identity']->superUserId) ?>


<body>
<main id="main" class="main">
  <input type="hidden" id="userId" value="<?=$_SESSION['identity']->userId?>">
  <input type="hidden" id="empNum" value="<?=$_SESSION['identity']->empNum?>">
  <input type="hidden" id="name" value="<?=$_SESSION['identity']->name?>">
  <input type="hidden" id="lastName1" value="<?=$_SESSION['identity']->lastName1?>">
  <input type="hidden" id="lastName2" value="<?=$_SESSION['identity']->lastName2?>">
  <input type="hidden" id="positionName" value="<?=$_SESSION['identity']->nombrePuesto?>">
  <input type="hidden" id="sectionName" value="<?=$_SESSION['identity']->nombreDepartamento?>">
  <input type="hidden" id="correoJefe" value="<?=$correoJefe[0]['email']?>">  
  
  <div class="pagetitle">
    <h1>HISTORIAL VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->
  <div class="container mt-4">
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="pestanas" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Historial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2" aria-selected="true">Cancelaciones</a>
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
                <th>Periodo</th>
                <th>Número de días</th>
                <th>Estatus</th>    
                <th>Tipo de horario</th>   
                <th>Solicitud de cancelación</th>
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($historial); $i++) { ?>
              <?php 
                  $dateFormatInicio = strtotime($historial[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($historial[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal); 
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>
              <tr data-vp="<?=$historial[$i]['periodoId']?>" data-estatus="<?=$historial[$i]['estatusSolicitudLetra']?>" data-dias="<?=$historial[$i]['numDias']?>" data-rdias="<?=$requestedDays?>">
                <td><?=$requestedDays?></td>
                <td><?=$historial[$i]['numDias']?></td>
                <td><?=$historial[$i]['estatusSolicitud']?></td>
                <td><?=$historial[$i]['tipoHorario']?></td>
                <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#cancelarModal" onclick="set_vp_id(this)"><i class="bi bi-x-circle-fill"></i></button></td>
              </tr>  
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable2">
            <thead>
              <tr>
                <th>Periodo</th>
                <th>Número de días</th>
                <th>Estatus</th>    
                <th>Tipo de horario</th>    
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($cancelaciones); $i++) { ?>
              <tr>
              <?php 
                  $dateFormatInicio = strtotime($cancelaciones[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($cancelaciones[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                ?>
                <td><?=$fechaInicio?> - <?=$fechaFinal?></td>
                <td><?=$cancelaciones[$i]['numDias']?></td>
                <td><?=$cancelaciones[$i]['estatusSolicitud']?></td>
                <td><?=$cancelaciones[$i]['tipoHorario']?></td>                                               
              </tr> 
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
<!--
  <table class="table table-striped table-bordered" id="myTable">
    <thead>
        <tr>
          <th>Periodo</th>
          <th>Número de días</th>
          <th>Comentarios</th>
          <th>Estatus</th>       
          <th>Solicitud de cancelación</th>
        </tr>                
      </thead>
      <tbody>
        <tr>
          <td>20/05/2024 - 27/05/2024</td>
          <td>5 días</td>
          <td></td>
          <td>Pendiente</td>
          <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#cancelarModal"><i class="bi bi-x-circle-fill"></i></button></td>
        </tr>
        <tr>
          <td>20/05/2024 - 27/05/2024</td>
          <td>5 días</td>
          <td></td>
          <td>Aprobado</td>
          <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#cancelarModal"><i class="bi bi-x-circle-fill"></i></button></td>
        </tr>                
      </tbody>
    </table>
-->

    <div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="cancelarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="vpId" value="0">
        <input type="hidden" id="estatusLetra" value="">
        <input type="hidden" id="numDias" value="0">
        <input type="hidden" id="rDias" value="">            
        <h5 class="modal-title" id="cancelarModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Seguro(a) que desea enviar una solicitud de cancelación?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="solicitarCanc">Si</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="recarga" value="<?=isset($_GET['r']) ? $_GET['r'] : ""?>">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $(document).ready(function () {
        let rec=$("#recarga").val();
        if(rec){
          $("#pestaña1").removeClass("active");
          $("#pestaña2").addClass("active");
          $("#contenido1").removeClass("show");
          $("#contenido1").removeClass("active");
          $("#contenido2").addClass("show");
          $("#contenido2").addClass("active"); 
        }
        
        //.removeClass("selected")

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
      });


      $("#solicitarCanc").click(function(){
        //alert($("#vpId").val());
        //window.location.replace('historial-vacaciones.php');
        solicitar_cancelacion();
      })

      const set_vp_id = (_this) => {
        //estatusLetra
        let vpId=$(_this).parent().parent().attr('data-vp');
        let estatusLetra=$(_this).parent().parent().attr('data-estatus');
        let numDias=$(_this).parent().parent().attr('data-dias');
        let rDias=$(_this).parent().parent().attr('data-rdias');               
        $("#vpId").val(vpId);
        $("#estatusLetra").val(estatusLetra);
        $("#numDias").val(numDias);
        $("#rDias").val(rDias);
      }

      const solicitar_cancelacion = () => {
        
        let vacationsPeriodId = $("#vpId").val();
        let estatusLetra = $("#estatusLetra").val();
        let numDias = $("#numDias").val();
        let requestedDays = $("#rDias").val();

        let empNum = $("#empNum").val();
        let name = $("#name").val();
        let lastName1 = $("#lastName1").val(); 
        let lastName2 = $("#lastName2").val();
        let positionName = $("#positionName").val(); 
        let sectionName = $("#sectionName").val();
        let correoJefe = $("#correoJefe").val();

        $(".loader").show();

        let datos = {
          vacationsPeriodId,
          estatusLetra,
          numDias,
          requestedDays,
          empNum,
          name,
          lastName1,
          lastName2,
          positionName,
          sectionName,
          correoJefe
        }
        
        console.log(datos);

        
        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }
        
        
        fetch('altas/subir_solicitud_canc_vacaciones.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          //window.location.href = "proceso-completo.php?op=v";
          window.location.replace('historial-vacaciones.php?r=1');
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