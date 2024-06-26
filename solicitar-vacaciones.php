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

<style>
  .card-header-vac,
  .card-footer-vac {
    border-color: #ebeef4;
    background-color: #fff;
    color: #000000;
    padding: 15px;
  }
</style>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>SOLICITAR VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->
  <body>
  <div class="row">
    <?php 
      $yr = date('Y');
      $current_date = date('Y-m-d');
      $proximo_periodo = $yr.substr($_SESSION['identity']->recDate, 4, 6); 

      if($proximo_periodo<$current_date){
        $proximo_periodo = date("d/m/Y",strtotime($proximo_periodo."+ 1 year"));
      }

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
          <input type="hidden" id="diasDisp" value="15">
          <h1 <?=(($dif_mes==3 && $dif_anio==0 && $dif_dias==0) || ($dif_mes<3)) ? 'style="background-color: #FFF751;"' : '' ?>>15</h1>
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
        let fechaInicio=$("#fechaInicio").val();
        let fechaFin=$("#fechaFin").val();
        let tipoHorario=$("#tipoHorario").val();

        console.log({
          fechaInicio,
          fechaFin,
          tipoHorario
        })
        //var diff = fechaFin - fechaInicio;
        //alert(calcularDiasHabiles(fechaInicio, fechaFin, tipoHorario));
      })

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
    </script>
  </body>

</html>