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
<?php 
$jefeId=$_SESSION['identity']->superUserId;
if($jefeId==""){
  $jefeId=0;
}
$correoJefe = Consultas::listOneRawUser($conn, $jefeId); 

?>
<?php 
  $numDias = $diasVacaciones[0]['numDias']; 
  $diasAd = $diasVacaciones[0]['diasAd'];
?>
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
  <input type="hidden" id="correoJefe" value="<?=isset($correoJefe[0]['email']) ? $correoJefe[0]['email'] : "" ?>">
  <input type="hidden" id="recDate" value="<?=date("Y-m-d",strtotime($_SESSION['identity']->recDate))?>">
  
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
$proximo_periodo_string_formato_alterno = date('Y-m-d', $dateFormat); 
//($dif_mes==3 && $dif_anio==0 && $dif_dias==0) || ($dif_mes<3)
    ?>
    <div class="col-4">
      <div class="card text-center">
        <div class="card-header-vac">
          <!--aqui va el valor de los dias disponibles desde la bd-->
          Inicio del siguiente periodo
          <hr>
          <input type="hidden" id="proximoPeriodo" value="<?=$proximo_periodo_string_formato_alterno?>">  
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
          <input type="hidden" id="diasAd" value="<?=$diasAd?>">
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
    <div class="col">
    <div class="card text-center">
      <div class="card-header-vac">
        <h3>+<?=$diasAd?></h3>
        <hr>
      </div>
      <div class="card-body">
        Días disponibles del siguiente periodo
      </div>
    </div>
          
    <!--
    <div class="card text-center">
      <div class="card-header-vac">
      </div>
      <div class="card-body">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="medioDia">
          <label class="form-check-label" for="medioDia">
          Activar/Desactivar medios días
          </label>
        </div>
      </div>
    </div>
    -->
    </div>
  </div>

  <div class="row">
    <div class="col-3">
      <label for="fechaInicio">Fecha de inicio:</label>
      <input class="form-control" type="date" id="fechaInicio">
      <span id="error_fechasAnt" class="text-danger"></span>
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
        mostrarErrorDias('');
        mostrarErrorFechas('');
      });

      $("#fechaFin").on('change', function(){
        mostrarCambiosPantalla();
        mostrarErrorDias('');
        mostrarErrorFechas('');
      });

      $("#tipoHorario").on('change', function(){
        mostrarCambiosPantalla();
        mostrarErrorDias('');
        mostrarErrorFechas('');
      });
      
      $("#solicitar").click(function(){
        solicitar_vacaciones();
      })

      const mostrarError = (vali, errorEl, isText=false, inf=0, sup=0) => {
        let valor=Number(vali.val());
        let diasDisp=Number($("#diasDisp").val())+Number($("#diasAd").val());

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

        let fechaInicioVal=$("#fechaInicio").val();
        let fechaFinVal=$("#fechaFin").val();
        let proxPeriodo=$("#proximoPeriodo").val();

        /*
        Control de periodo sobrepasado del aniversario
        if(fechaInicioVal >= proxPeriodo || fechaFinVal >= proxPeriodo){
          $('#' + errorEl).text('No sobrepasar el inicio del sig. periodo');
          vali.css('border-color', '#cc0000');
          console.log("SOBREPASA PERIODO");
        }
        */

      } 
      const mostrarErrorText = () => {
        let fechaActual = new Date().toISOString().split('T')[0];

        let fechaInicioVal=$("#fechaInicio").val();
        let fechaFinVal=$("#fechaFin").val();

        if(!(fechaInicioVal>fechaActual && fechaFinVal>fechaActual)){
          $('#error_fechasAnt').text('Fechas incorrectas');
          $('#fechaInicio').css('border-color', '#cc0000');
        }else{
          $('#error_fechasAnt').text('');
          $('#fechaInicio').css('border-color', '');
        }
      }

      const mostrarErrorFechas = (mensaje) => {

        if(mensaje!=''){
          $('#error_fechasAnt').text(mensaje);
          $('#fechaInicio').css('border-color', '#cc0000');
        }else{
          $('#error_fechasAnt').text('');
          $('#fechaInicio').css('border-color', '');          
        }          
          //$('#error_fechasAnt').text('');
          //$('#fechaInicio').css('border-color', '');
        
      }      
      
      const mostrarErrorDias = (mensaje) => {
        if(mensaje!=''){
          $('#error_numDias').text(mensaje);
          $('#numDias').css('border-color', '#cc0000');
        }else{
          $('#error_numDias').text('');
          $('#numDias').css('border-color', '');          
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


      
      const solicitar_vacaciones = () => {
        
        //mostrarError($("#numDias"), 'error_numDias');
        //mostrarErrorText();
        let diasSolic=$("#numDias").val();
        let diasDispCiclo=Number($("#diasDisp").val());
        let diasDispAd=Number($("#diasAd").val());
        let diasDisp=diasDispCiclo+diasDispAd;


        $(".loader").show();

        let recFecha=$("#recDate").val();
        let fechaActual = new Date().toISOString().split('T')[0];

        let fechaInicioVal=$("#fechaInicio").val();
        let fechaFinVal=$("#fechaFin").val();
        let proxPeriodo=$("#proximoPeriodo").val();
        let tipoHorario=$("#tipoHorario").val();
        //let medioDia=$("#medioDia").is(':checked');

        // && !(fechaInicioVal >= proxPeriodo || fechaFinVal >= proxPeriodo)
        //esta condicion (fechaInicioVal>fechaActual && fechaFinVal>fechaActual) es temporal, en caso de que se requiera retirar
        if((fechaInicioVal>fechaActual && fechaFinVal>fechaActual) && (diasSolic>0) ){
          if(fechaInicioVal<proxPeriodo && fechaFinVal<proxPeriodo){
            //este es el camino normal
            if(diasSolic<=diasDisp){
              console.log('procede de manera comun');
              subirVacaciones();
            }else{
              $(".loader").hide();
              console.log('no procede');
              mostrarErrorDias('Límite de días excedido');
            }
          }else if(fechaInicioVal<proxPeriodo && fechaFinVal>=proxPeriodo){
            //este es el camino del nuevo ciclo entre fechas
            
            let objProxPeriodo = new Date(proxPeriodo); // Convertir a objeto Date
            objProxPeriodo.setDate(objProxPeriodo.getDate() - 1); // Restar un día
            let diaAntProxPeriodo=objProxPeriodo.toISOString().split('T')[0];

            let fechaInicio = new Date(fechaInicioVal);            
            let fechaAntProxPeriodo = new Date(diaAntProxPeriodo);
            let fechaDespProxPeriodo = new Date(proxPeriodo);            
            let fechaFin = new Date(fechaFinVal);

            //funcion para convertir fechas a fechas locales
            fechaInicio.setTime(fechaInicio.getTime() + fechaInicio.getTimezoneOffset() * 60 * 1000);
            fechaAntProxPeriodo.setTime(fechaAntProxPeriodo.getTime() + fechaAntProxPeriodo.getTimezoneOffset() * 60 * 1000);
            fechaDespProxPeriodo.setTime(fechaDespProxPeriodo.getTime() + fechaDespProxPeriodo.getTimezoneOffset() * 60 * 1000);              
            fechaFin.setTime(fechaFin.getTime() + fechaFin.getTimezoneOffset() * 60 * 1000);  

            //con esta variable contamos los dias que estan desde el inicio de las vacaciones, hasta el dia antes del proximo periodo
            let diasSolicAntCic = calcularDiasHabiles(fechaInicio, fechaAntProxPeriodo, tipoHorario);

            //sacamos los dias que se tomaron despues de la fecha del proximo aniversario
            let diasSolicDespCic = calcularDiasHabiles(fechaDespProxPeriodo, fechaFin, tipoHorario);            
            //calcular cuantos dias va a tomar del siguiente ciclo, restandole los dias que se hayan adelantado en los dias antes del siguiente ciclo

            //alert('estos son los dias antes del proximo periodo: '+diasSolicAntCic+', estos son los dias despues del proximo periodo: '+diasSolicDespCic);
            if(diasSolicAntCic<=diasDisp){
              //se va por este camino cuando la cantidad de dias del inicio de las vacaciones al dia antes, es menor o igual a los dias disponibles en ese ciclo 
              //alert('este es el camino del nuevo ciclo entre fechas y cuando los dias son correctos '+diasSolicAntCic);
              
              //resultado positivo o 0 no hay que hacer nada, pero si es negativo, ese va a ser el numero de dias adelantados
              let contDiasAd = diasDispCiclo - diasSolicAntCic

              let mitadSigCiclo = num_dias_anio(recFecha, proxPeriodo)/2;
              
              //este if verifica si el resultado de el conteo de dias adelantados es negativo, y si es asi, se le va a restar a la 
              //cantidad de dias adelantados disponibles
              if(Math.sign(contDiasAd)==(-1)){
                let diasDispAdNew=diasDispAd+contDiasAd;
                let diasDispSigCiclo=mitadSigCiclo+diasDispAdNew;
                //console.log('nuevo resultado de dias disponibles: '+diasDispAdNew+', y la cantidad de dias disponibles del siguiente ciclo es: '+diasDispSigCiclo);
                //console.log('tomados despues del inicio del ciclo: '+diasSolicDespCic);

                //si la siguiente resta da un resultado negativo, entonces se restringe la solicitud porque excede los dias disponibles del siguiente ciclo
                let difTomadosDispSigCiclo = diasDispSigCiclo - diasSolicDespCic;
                //console.log('diferencia de dias disponibles del siguiente ciclo: '+difTomadosDispSigCiclo);
                if(Math.sign(difTomadosDispSigCiclo)==(-1)){
                  $(".loader").hide();
                  console.log('no procede la solicitud porque se exceden los dias disponibles del siguiente ciclo');
                  mostrarErrorDias('Límite de días excedido');
                }else{
                  console.log('procede porque no se exceden los dias disponibles del siguiente ciclo');
                  subirVacaciones();
                }
              }else{
                //si va por este camino, quiere decir que no se adelantaron dias
                let diasDispSigCiclo=mitadSigCiclo+diasDispAd;
                //console.log('no se adelantaron dias. dias disponibles del siguiente ciclo: '+diasDispSigCiclo);
                //console.log('tomados despues del inicio del ciclo: '+diasSolicDespCic);

                //si la siguiente resta da un resultado negativo, entonces se restringe la solicitud porque excede los dias disponibles del siguiente ciclo                
                let difTomados = diasDispSigCiclo - diasSolicDespCic;
                if(Math.sign(difTomados)==(-1)){
                  $(".loader").hide();
                  console.log('no procede la solicitud porque se exceden los dias disponibles del siguiente ciclo');
                  mostrarErrorDias('Límite de días excedido');
                }else{
                  console.log('procede porque no se exceden los dias disponibles del siguiente ciclo');
                  subirVacaciones();
                }
              }
              
              
              
            }else{
              $(".loader").hide();
              mostrarErrorDias('Límite de días excedido');
              console.log('se exceden a los dias disponibles del ciclo y los adelantados');             
            }

            //alert('este es el camino del nuevo ciclo entre fechas, y estos son los dias del ciclo actual antes del inicio del siguiente: '+diasSolicAntCic);
          }else if(fechaInicioVal>=proxPeriodo && fechaFinVal>=proxPeriodo){
            let diasSigCiclo = (num_dias_anio(recFecha, proxPeriodo)/2)+diasDispAd;
            if(diasSolic>diasSigCiclo){
              $(".loader").hide();
              mostrarErrorDias('Límite de días excedido');
              console.log('se exceden los dias solicitados del siguiente ciclo');
            }else{
              console.log('procede el registro en la bd de la solicitud');
              subirVacaciones();
            }
          }

          /*
          
  
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

          if(medioDia){
            medioDia='1';
            numDias=numDias/2;
          }else{
            medioDia='0';
          }

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
            medioDia,
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
          
          */
        }else{
          $(".loader").hide();
          
          if(!(fechaInicioVal>fechaActual && fechaFinVal>fechaActual)){
            mostrarErrorFechas('Fechas incorrectas');
            //mostrarErrorFechas();
          }

          if(diasSolic<=0){
            mostrarErrorDias('Agregar al menos 1 día');

          }

          console.log("no se pueden pedir 0 dias, ni excederse");
        }
        
        
        

      }

      const formatoFecha = (texto) => {
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
      }

      //calcular dias disponibles del proximo ciclo
      const num_dias_anio = (recDate, nextAnniversary) => {
        const rec = new Date(recDate);
        const nextAnni = new Date(nextAnniversary);
        
        // Calcular la diferencia en años
        const years = nextAnni.getFullYear() - rec.getFullYear();
        
        // Determinar los días disponibles según los años
        switch (true) {
            case years === 1: return 12;
            case years === 2: return 14;
            case years === 3: return 16;
            case years === 4: return 18;
            case years === 5: return 20;
            case years >= 6 && years <= 10: return 22;
            case years >= 11 && years <= 15: return 24;
            case years >= 16 && years <= 20: return 26;
            case years >= 21 && years <= 25: return 28;
            case years >= 26 && years <= 30: return 30;
            case years >= 31: return 32;
            default: return 0;
        }
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
      
      const subirVacaciones = () => {
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
        let medioDia=$("#medioDia").is(':checked');        

        if(medioDia){
          medioDia='1';
          numDias=numDias/2;
        }else{
          medioDia='0';
        }

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
          medioDia,
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
      }
    </script>
    </main>
    <?php require 'layout/footer.php';?>
  </body>

</html>