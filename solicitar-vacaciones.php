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
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<?php $diasVacaciones=Consultas::listVacationsDays($conn,$_SESSION['identity']->userId); ?>
<?php $correoJefe = Consultas::listOneRawUser($conn, $_SESSION['identity']->superUserId) ?>
<?php $numDias = $diasVacaciones[0]['numDias']; ?>
<style>
  .card-header-vac,
  .card-footer-vac {
    border-color: #ebeef4;
    background-color: #fff;
    color: #000000;
    padding: 15px;
  }
</style>

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
    <h1>SOLICITAR VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->
  <div class="row">
    <?php 
      $yr = date('Y');
      $current_date = date('Y-m-d');
      $proximo_periodo = $yr.substr($_SESSION['identity']->recDate, 4, 6); 

      if($proximo_periodo<$current_date){
        $proximo_periodo = date("Y-m-d",strtotime($proximo_periodo."+ 1 year"));
      }
      //var_dump($correoJefe[0]['email']);
/*
          empNum: "15025",
          name: "Roberto",
          lastName1: "Reyes",
          lastName2: "Medrano",
          positionName: "Inge sistemas",
          sectionName: "Sistemas",
          requestedDays: "01/01/2024 - 08/01/2024"
*/

$proximo_periodo_string = $proximo_periodo; 
// Fecha de inicio
$fechaInicio = new DateTime('2023-08-01');
$current_date= new DateTime($current_date);

// Fecha de finalización (puede ser la fecha actual)
$fechaFin = new DateTime('2024-08-31');
$proximo_periodo = new DateTime($proximo_periodo);



// Calcular la diferencia entre las fechas
$diferencia = $current_date->diff($proximo_periodo);

$dif_anio=$diferencia->y;
$dif_mes=$diferencia->m;
$dif_dias=$diferencia->d;


$dateFormat = strtotime($proximo_periodo_string); 
$proximo_periodo_string = date('d/m/Y', $dateFormat); 
//($dif_mes==3 && $dif_anio==0 && $dif_dias==0) || ($dif_mes<3)
    ?>
    <div class="col-4">
      <div class="card text-center">
        <div class="card-header-vac">
          <!--aqui va el valor de los dias disponibles desde la bd-->
          Inicio del siguiente periodo
          <hr>
          </div>
          <div class="card-body">
          <?=$proximo_periodo_string?>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card text-center">
        <div class="card-header-vac">
          <!--aqui va el valor de los dias disponibles desde la bd-->
          <input type="hidden" id="diasDisp" value="<?=$numDias?>">
          <h1 <?=(($dif_mes==3 && $dif_anio==0 && $dif_dias==0) || ($dif_mes<3)) ? 'style="background-color: #FFF751;"' : '' ?>><?=$numDias?></h1>
          <hr>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            Días disponibles
          </blockquote>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>

  <div class="row">
    <div class="col-3">
      <label for="fechaInicio">Fecha de inicio:</label>
      <input class="form-control" type="date" id="fechaInicio">
    </div>
    <div class="col-3">
      <label for="fechaFin">Fecha de fin:</label>    
      <input class="form-control" type="date" id="fechaFin">
    </div>    
    <div class="col-3">
      <label for="tipoHorario">Tipo de horario:</label>
      <select class="form-select" name="tipoHorario" id="tipoHorario">
        <option value="A">A</option>
        <option value="B">B</option>
      </select>
    </div>
    <div class="col-3">
      <label for="numDias">Cantidad de días:</label>
      <input class="form-control" type="text" value="0" id="numDias" disabled>
      <span id="error_numDias" class="text-danger"></span>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-4">
      <a class="btn btn-primary form-control" href="historial-vacaciones.php">Ver historial</a>
    </div>
    <div class="col-4">
      <button class="btn btn-success form-control" id="solicitar">Solicitar</button>
    </div> 
    <div class="col"></div>    
  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $("#fechaInicio").on('change', function(){
        mostrarCambiosPantalla();
      });

      $("#fechaFin").on('change', function(){
        mostrarCambiosPantalla();
      });

      $("#tipoHorario").on('change', function(){
        mostrarCambiosPantalla();
      });
      
      $("#solicitar").click(function(){
        solicitar_vacaciones();
      })

      const mostrarError = (vali, errorEl, isText=false, inf=0, sup=0) => {
        let valor=Number(vali.val());
        let diasDisp=Number($("#diasDisp").val());

        if(valor>0 && valor<=diasDisp){
          $('#' + errorEl).text('');
          vali.css('border-color', '');
          console.log("MAS DE CERO, MENOR O IGUAL AL LIMITE");
        }else if(valor>diasDisp){
          $('#' + errorEl).text('Límite de días excedido');
          vali.css('border-color', '#cc0000');
          console.log("SE EXCEDE");
        }else{
          $('#' + errorEl).text('Agregar al menos 1 día');
          vali.css('border-color', '#cc0000');
          console.log("CERO O MENOS");
        }
      }      

      const mostrarCambiosPantalla = () => {
        let fechaInicioVal=$("#fechaInicio").val();
        let fechaFinVal=$("#fechaFin").val();
        let tipoHorario=$("#tipoHorario").val();

        let fechaInicio = new Date(fechaInicioVal);
        let fechaFin = new Date(fechaFinVal);

        //funcion para convertir fechas a fechas locales
        fechaInicio.setTime(fechaInicio.getTime() + fechaInicio.getTimezoneOffset() * 60 * 1000);
        fechaFin.setTime(fechaFin.getTime() + fechaFin.getTimezoneOffset() * 60 * 1000);        

        let cantDias = calcularDiasHabiles(fechaInicio, fechaFin, tipoHorario);

        $("#numDias").val(cantDias);
      }

      const calcularDiasHabiles = (fechaInicial, fechaFinal, tipoHorario) => {
        var diasHabiles = 0;
        var currentDate = fechaInicial;

        while (currentDate <= fechaFinal) {
          var dayOfWeek = currentDate.getDay();
          
          if(tipoHorario=="A"){
            if (dayOfWeek !== 0 && dayOfWeek !== 6) {
              diasHabiles++;
            }            
          }else{
            if (dayOfWeek !== 0) {
              diasHabiles++;
            }
          }
          
          currentDate.setDate(currentDate.getDate() + 1);
        }

        return diasHabiles;
      }
      
      const solicitar_vacaciones = () => {
        
        mostrarError($("#numDias"), 'error_numDias');
        let diasSolic=$("#numDias").val();
        let diasDisp=Number($("#diasDisp").val());
        $(".loader").show();
        if(diasSolic>0 && diasSolic<=diasDisp){
          let userId=$("#userId").val();        
          let fechaInicio=$("#fechaInicio").val();
          let fechaFin=$("#fechaFin").val();
          let tipoHorario=$("#tipoHorario").val();
          let empNum = $("#empNum").val();
          let name = $("#name").val();
          let lastName1 = $("#lastName1").val(); 
          let lastName2 = $("#lastName2").val();
          let positionName = $("#positionName").val(); 
          let sectionName = $("#sectionName").val();
          let requestedDays = formatoFecha(fechaInicio)+" - "+formatoFecha(fechaFin);
          let correoJefe = $("#correoJefe").val();
          let numDias = $("#numDias").val();

          let datos = {
            vacationsType : "V",
            vacationsStatus: "P",
            userId,
            fechaInicio,
            fechaFin,
            tipoHorario,
            empNum,
            correoJefe,
            numDias,
            name,
            lastName1,
            lastName2,
            positionName,
            sectionName,
            requestedDays
          }

          //console.log(datos);
          
          
          let fd = new FormData();
          
          for(var key in datos){
            fd.append(key, datos[key]);
          }
          
          
          fetch('altas/subir_vacaciones.php', {
            method: "POST",
            body: fd
          })
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            window.location.href = "proceso-completo.php?op=v";
            console.log(data);
          })
          .catch(err => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err);
          })
        }else{
          $(".loader").hide();
          console.log("no se pueden pedir 0 dias, ni excederse");
        }
        
        
        

      }

      const formatoFecha = (texto) => {
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
      }
    </script>
    </main>
    <?php require 'layout/footer.php';?>
  </body>

</html>