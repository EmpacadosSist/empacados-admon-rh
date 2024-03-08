<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>

<?php 
  $indicadores=Consultas::listIndicator($conn); 
  $usuarios=Consultas::listUsers($conn);
?>
<style>
.st {
  /*
  position:sticky;
  left:0px;
  */
}
</style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>EMPACADOS PAGOS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <body>

    <div class="container mt-4">
      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Indicadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2"
            aria-selected="false">Pagos</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
      </ul>
      <input class="form-control" type="file" name="archivo" id="archivo" accept=".xls,.xlsx">
      <button class="subir-archivo">Subir</button>
      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->
        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
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
                  <!--
                    <th>Nivel en estructura</th>
                  -->

                  <?php 
                for($i=0; $i<count($indicadores); $i++){

              ?>
                  <th><?=$indicadores[$i]['nombreIndicador']?></th>
                  <?php               
                }
              ?>
                  <th>Total</th>
                  <th></th>
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
                  <td style="min-width: 200px;">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="number" class="form-control variable" data-old-value="<?=$usuariosArr['variable']?>"
                        value="<?=$usuariosArr['variable']?>">
                    </div>
                  </td>
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
                  <td style="min-width: 150px;">
                    <div class="input-group mb-3">
                      <input data-indic="<?=$indicadorId?>" class="form-control porc" type="number" data-old-per="<?=$valorPorcentaje?>" value="<?=$valorPorcentaje?>">
                      <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                  </td>
                  <?php } ?>

                  <td style="min-width: 100px;"><label class="suma-porc"><?=$sumaPorc?></label> %</td> <!-- Agrega más filas según tus necesidades -->
                  <td><button class="btn btn-success actualizar-porc">Actualizar</button></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
          <div class="table-responsive tabla-pagos">
            
          </div>
        </div>
        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>
  </body>

  </html>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <script>

    $(document).ready(function(){
      recargar_tabla();
    });
  

    $(".subir-archivo").click(function(){
      var archivoppto=$('#archivo');

      var archivo=archivoppto[0].files[0];
      if((archivo===undefined)){                  
        //$("#msg").text("Favor de no dejar espacios en blanco");   
        //$("#errormensaje").show();
        console.log("Archivo vacio")
      }else{
        var formData = new FormData();
        formData.append('archivo',archivo);        

        $.ajax({
          url: "altas/subir_puesto_indicador_excel.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          beforeSend: function(){
            $('.loader').show();
          } 
        }).done(function(response){
          console.log(response);
        });
      }
    });

  $(".actualizar-porc").click(function() {
    let boton = $(this);
    let positionId = $(this).parent().parent().attr('data-pos-id');
    let campos = $(this).parent().parent().find('.porc');
    let varValue = $(this).parent().parent().find('.variable').val();
    let oldValue = $(this).parent().parent().find('.variable').attr('data-old-value');
    let userId = $(this).parent().parent().attr('data-user-id');
    let elementoPorcentaje=$(this).parent().parent().find('.suma-porc');
    let sumaPorcentaje=$(this).parent().parent().find('.suma-porc').text();
    console.log(sumaPorcentaje);
    
    campos.each(function(index) {
      let actual = $(this);
      let porcentaje = actual.val();
      let indicadorId = actual.attr('data-indic');
      let porcentajeAnterior = actual.attr('data-old-per');
      if (porcentaje != "" && porcentaje != porcentajeAnterior) {
        //console.log("Puesto: " + positionId + " Valor del campo: " + porcentaje + " Id de indicador: " + indicadorId + " porcentaje anterior: " + porcentajeAnterior);
        sumaPorcentaje = (sumaPorcentaje-porcentajeAnterior)+parseInt(porcentaje);
        //sumaPorcentaje += porcentaje;
        console.log("Valor nuevo: "+(porcentaje-5));
        elementoPorcentaje.text(sumaPorcentaje);
        actual.attr('data-old-per', porcentaje);
        subir_pos_ind(indicadorId, positionId, porcentaje, boton)
      }
    });

    if (varValue != oldValue) {
      console.log("diferentes");
      actualizar_var(varValue, userId, boton);
    }

    recargar_tabla();
  });

  $('.porc').on('keydown', function(e) {
    console.log("mensaje");
    if (isFinite(e.key)) {
      $(this).parent().parent().parent().find('.actualizar-porc').removeClass("btn-success");
      $(this).parent().parent().parent().find('.actualizar-porc').addClass("btn-danger");

    }
  });

  $('.variable').on('keyup', function(e) {
    let valorNuevo = $(this).val();
    let valorAnterior = $(this).attr('data-old-value');
    console.log(e.key + " :: " + valorNuevo + " :: " + valorAnterior);

    if (isFinite(e.key)) {
      $(this).parent().parent().parent().find('.actualizar-porc').removeClass("btn-success");
      $(this).parent().parent().parent().find('.actualizar-porc').addClass("btn-danger");

    }

    if (valorNuevo == valorAnterior) {
      $(this).parent().parent().parent().find('.actualizar-porc').removeClass("btn-danger");
      $(this).parent().parent().parent().find('.actualizar-porc').addClass("btn-success");
    }

  });


  const subir_pos_ind = (indicadorId, puestoId, porcentaje, boton) => {
    let datos = {
      indicatorId: indicadorId,
      positionId: puestoId,
      paymentPer: porcentaje
    }
    enviar_info(datos, 'altas/subir_puesto_indicador.php', boton);
  }

  const actualizar_var = (variable, usuarioId, boton) => {
    let datos = {
      paymentVar: variable,
      userId: usuarioId
    }
    enviar_info(datos, 'cambios/actualizar_variable.php', boton);
  }

  const enviar_info = (datos, url, boton) => {
    let fd = new FormData();

    for (var key in datos) {
      fd.append(key, datos[key]);
    }

    fetch(url, {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        if (data.ok) {
          //location.reload();
          if (boton.hasClass('btn-danger')) {
            boton.removeClass("btn-danger");
            boton.addClass("btn-success");
          }

        } else {
          alert(data.message);
        }

      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })
  }

  const recargar_tabla = () => {
    $.ajax({
            url: "layout/tabla_pagos.php",
            type: "GET"
            
        }).done(function(response){
          $(".tabla-pagos").empty();
          $(".tabla-pagos").append(response);
        });
  }
  </script>