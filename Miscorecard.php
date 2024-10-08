<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi scorecard</title>
</head>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); 

  $indicadores=Consultas::listIndicator($conn);

  $current_user_id=$_SESSION['identity']->userId;
  //consulta para ver un solo usuario con el id 
  $usuarios=Consultas::listOneUser($conn, $current_user_id); 
?>

  <!-- Bootstrap Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">

  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

  <!-- Bootstrap Slider JS -->


  <body>
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>MI SCORECARD</h1>
      <hr>
    </div><!-- End Page Title -->
<div class="container mt-4">
      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <input type="hidden" id="userId" value="<?=$current_user_id?>">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Objetivos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab"
            aria-controls="contenido2" aria-selected="true">Indicadores</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pestaña3" data-toggle="tab" href="#contenido3" role="tab" aria-controls="contenido3"
            aria-selected="false">Pagos</a>
        </li>
        
        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->
        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
          <div class="container mt-5 text-center">
            <!-- Slider 1 -->
            <div class="row">
              <div class="col">
                0 %
                <input id="slider1" type="text" data-slider-min="0" data-slider-max="100" data-slider-value="0"/>
                100 %
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-3">Objetivo 1</div>
            </div>
          
            <!-- Slider 2 -->
            <div class="row">
              <div class="col">
                0 %  
                <input id="slider2" type="text" data-slider-min="0" data-slider-max="100" data-slider-value="0"/>
                100 %
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-3">Objetivo 2</div>
            </div>
          
            <!-- Slider 3 -->
            <div class="row">
              <div class="col">
                0 %
                <input id="slider3" type="text" data-slider-min="0" data-slider-max="100" data-slider-value="0"/>
                100 %
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-3">Objetivo 3</div>
            </div>

            <div class="row">
              <div class="col"></div>
              <div class="col">
                <button class="btn btn-success actualizar-obj">Actualizar</button>
              </div>                            
              <div class="col"></div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="tablaPestana1">
              <!-- Contenido de la tabla -->
              <thead>
                <tr>
                  <th class="st">Número de empleado</th>
                  <th class="st">Nombre</th>
                  <th>Puesto</th>
                  <th>Area</th>
                  <th>Ceco</th>                  
                  <th>$ Variable</th>

                  <?php 
                for($i=0; $i<count($indicadores); $i++){

              ?>
                  <th><?=$indicadores[$i]['nombreIndicador']?></th>
                  <?php               
                }
              ?>
                  <th>Total</th>
                  <!-- Agrega más columnas según tus necesidades -->
                </tr>
              </thead>
              <tbody>
                <?php 
            for($k=0;$k<count($usuarios);$k++){
              $sumaPorc=0;
              $usuariosArr=$usuarios[$k];
              ?>
                <tr data-user-id="<?=$usuariosArr['usuarioId']?>" data-pos-id="<?=$usuariosArr['puestoId']?>">
                  <td class="st" style="min-width: 100px;"><?=$usuariosArr['numEmpleado']?></td>
                  <td class="st" style="min-width: 300px;">
                    <?=$usuariosArr['nombre']." ".$usuariosArr['apellido1']." ".$usuariosArr['apellido2']?></td>
                  <td style="min-width: 300px;"><?=$usuariosArr['puesto']?></td>
                  <td style="min-width: 100px;"><?=$usuariosArr['area']?></td>
                  <td style="min-width: 100px;"><?=$usuariosArr['ceco']?></td>
                  <td style="min-width: 200px;"><?=$usuariosArr['variable']?></td>
                  <!--
                    <td style="min-width: 100px;"><?php //$usuariosArr['nivel']?></td>
                  -->

                  <?php for($j=0;$j<count($indicadores);$j++){ 
                    $indicadorId=$indicadores[$j]['id'];
                    $porcentaje=Consultas::paymentVar($conn, $usuariosArr['puestoId'], $indicadorId);
                    $valorPorcentaje= isset($porcentaje[0]) ? $porcentaje[0]['porcentaje'] : 0; 
                    $sumaPorc+=$valorPorcentaje;
                //var_dump($muestra);
                ?>
                  <td style="min-width: 150px;"><?=$valorPorcentaje?> %</td>
                  <?php } ?>

                  <td style="min-width: 100px;"><label class="suma-porc"><?=$sumaPorc?></label> %</td> <!-- Agrega más filas según tus necesidades -->
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane fade" id="contenido3" role="tabpanel" aria-labelledby="pestaña3">
          <div class="row mb-3 mt-3">
              <div class="col">
                <select class="form-select" name="selectMonth" id="selectMonth">
                  <option value="<?=date('m')?>">Mes actual</option>
                  <option value="<?=date('m')+1?>">Próximo mes</option>
                </select>
              </div>
              <div class="col">
              </div>
              <div class="col">
              
              </div>

            </div>
          <div class="table-responsive tabla-pagos">
            
          </div>
        </div>        
        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>
    </main>
    <?php require 'layout/footer.php';?>
</body>
</html>
  

 <!-- Vendor JS Files -->
 <!--

   <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  -->
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <style type="text/css">

    .slider.slider-horizontal {
      width: 80%;
      height: 22px;
    }
 
    /* Estilo para el Slider 1 */
    #slider1 .slider-selection,
    #slider2 .slider-selection,
    #slider3 .slider-selection {
      background: #00A800; /* Cambia el color de la selección a naranja para el Slider 3 */
    }

    #slider1 .slider-handle,
    #slider2 .slider-handle,
    #slider3 .slider-handle {
      background: #007500; /* Cambia el color de la selección a naranja para el Slider 3 */
    }  

    /* Estilo para las pistas de los sliders */
    #slider1 .slider-track-low, #slider1 .slider-track-high,
    #slider2 .slider-track-low, #slider2 .slider-track-high,
    #slider3 .slider-track-low, #slider3 .slider-track-high {
      background: white; /* Cambia el color de las pistas a un tono claro de verde para todos los sliders */
    }

</style>

<script>
  $(document).ready(function(){
    recargar_tabla();
  });

  // Initialize the sliders
  var slider1 = new Slider("#slider1", {
    id: "slider1",
    min: 0,
    max: 100,
    tooltip: 'always'
  });

  var slider2 = new Slider("#slider2", {
    id: "slider2",
    min: 0,
    max: 100,
    tooltip: 'always'
  });

  var slider3 = new Slider("#slider3", {
    id: "slider3",
    min: 0,
    max: 100,
    tooltip: 'always'
  });

  $('#selectMonth').on('change', function() {
    //alert("asi es");
    let mes = $(this).val();

    recargar_tabla(mes);
  });

  $(".actualizar-obj").click(function(){
    // Call a method on the slider
    let value = slider1.getValue();
    alert(value);
  });

  //aqui vamos a especificar si es individual y cual es el id del usuario
  const recargar_tabla = (month="") => {
    let userId = $("#userId").val();
    $.ajax({
      url: "layout/tabla_pagos.php",
      type: "POST",
      data: { 
        month,
        indiv: 1,
        userId
      }
    }).done(function(response){
      $(".tabla-pagos").empty();
      $(".tabla-pagos").append(response);
    });
  }
</script>

