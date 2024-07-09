<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(5);
  $tienePermiso=Utils::buscarPermiso(9);
  
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php 
  $indicadores=Consultas::listIndicator($conn); 
  //$usuarios=Consultas::listUsers($conn);
  $current_user_id = $_SESSION['identity']->userId;
  $usuarios=Consultas::listUsersBySupervisor($conn,$current_user_id);
?>
<style>
.st {
  position: sticky;
  left: 0px;
  background-color: white;
  z-index: 2;
}

.st1 {
  position: sticky;
  left: 100px;
  background-color: white;
  z-index: 2;
}

th {
  background-color: #222;
  color: white;
  padding: 2px;
  position: -webkit-sticky;
  position: sticky;
  top: 2px;
}
</style>
<main id="main" class="main">
  <input type="hidden" value="<?=$current_user_id?>" id="currentUserId">
  <div class="pagetitle">
    <h1>PAGOS</h1>
    <hr>
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

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->
        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
        <?php if($tienePermiso): ?>
          <div class="row mb-3 mt-3">
            <div class="col d-flex justify-content-end">
              <label for="archivo">Seleccionar plantilla excel: </label>
            </div>
            <div class="col">
              <input class="form-control" type="file" name="archivo" id="archivo" accept=".xls,.xlsx">
            </div>
            <div class="col-1 d-flex justify-content-end">
              <button class="btn btn-success subir-archivo">Subir</button>

            </div>

          </div>
          <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="tablaPestana1">
              <!-- Contenido de la tabla -->
              <thead>
                <tr>
                  <th class="st">Número de empleado</th>
                  <th class="st1">Nombre</th>
                  <th>Puesto</th>
                  <th>Area</th>
                  <th>Ceco</th>
                  <th>$ Variable</th>

                  <?php 
                for($i=0; $i<count($indicadores); $i++){ ?>
                  <th><?=$indicadores[$i]['nombreIndicador']?></th>
                  <?php               
                } ?>
                  <th>Total</th>
                  <th></th>
                  <!-- Agrega más columnas según tus necesidades -->
                </tr>
              </thead>
              <tbody>
                <?php 
                $arrIds=[];
                $paramIds="";
                $checkChildren=false;
            for($k=0;$k<count($usuarios);$k++){
              $sumaPorc=0;
              $usuariosArr=$usuarios[$k];
              array_push($arrIds,$usuariosArr['usuarioId']);
              ?>
                <tr data-user-id="<?=$usuariosArr['usuarioId']?>" data-pos-id="<?=$usuariosArr['puestoId']?>">
                  <td class="st" style="min-width: 100px;"><?=$usuariosArr['numEmpleado']?></td>
                  <td class="st1" style="min-width: 300px;">
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
                        value="<?=$usuariosArr['variable']?>" <?=$tienePermiso ? "" : "disabled" ?>>
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
                  ?>
                  <td style="min-width: 150px;">
                    <div class="input-group mb-3">
                      <input data-indic="<?=$indicadorId?>" class="form-control porc" type="number"
                        data-old-per="<?=$valorPorcentaje?>" value="<?=$valorPorcentaje?>" <?=$tienePermiso ? "" : "disabled" ?>>
                      <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                  </td>
                  <?php } ?>

                  <td style="min-width: 100px;"><label class="suma-porc"><?=$sumaPorc?></label> %</td>
                  <!-- Agrega más filas según tus necesidades -->
                  <td>
                  <?php if($tienePermiso): ?>
                    <button class="btn btn-success actualizar-porc">Actualizar</button>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php } ?>

                <?php 
                      if(count($arrIds)>0){
                        $checkChildren=true;
                        $paramIds=implode(",", $arrIds);
                      }
                      
                    ?>

                <?php 
                  while($checkChildren){
                    $arrIds=[];
                    $usuariosChildren=Consultas::listUsersBySupervisor($conn, $paramIds);
                ?>

                <?php 


            for($l=0;$l<count($usuariosChildren);$l++){
              $sumaPorc=0;
              $usuariosArrChildren=$usuariosChildren[$l];
              array_push($arrIds,$usuariosArrChildren['usuarioId']);
              ?>
                <tr data-user-id="<?=$usuariosArrChildren['usuarioId']?>"
                  data-pos-id="<?=$usuariosArrChildren['puestoId']?>">
                  <td class="st" style="min-width: 100px;"><?=$usuariosArrChildren['numEmpleado']?></td>
                  <td class="st1" style="min-width: 300px;">
                    <?=$usuariosArrChildren['nombre']." ".$usuariosArrChildren['apellido1']." ".$usuariosArrChildren['apellido2']?>
                  </td>
                  <td style="min-width: 300px;"><?=$usuariosArrChildren['puesto']?></td>
                  <td style="min-width: 100px;"><?=$usuariosArrChildren['area']?></td>
                  <td style="min-width: 100px;"><?=$usuariosArrChildren['ceco']?></td>
                  <td style="min-width: 200px;">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="number" class="form-control variable"
                        data-old-value="<?=$usuariosArrChildren['variable']?>"
                        value="<?=$usuariosArrChildren['variable']?>" <?=$tienePermiso ? "" : "disabled" ?>>
                    </div>
                  </td>
                  <!--
                    <td style="min-width: 100px;"><?php //$usuariosArrChildren['nivel']?></td>
                  -->

                  <?php for($j=0;$j<count($indicadores);$j++){ 
                    $indicadorId=$indicadores[$j]['id'];
                    $porcentaje=Consultas::paymentVar($conn, $usuariosArrChildren['puestoId'], $indicadorId);
                    $valorPorcentaje= isset($porcentaje[0]) ? $porcentaje[0]['porcentaje'] : 0; 
                    $sumaPorc+=$valorPorcentaje;
                  ?>
                  <td style="min-width: 150px;">
                    <div class="input-group mb-3">
                      <input data-indic="<?=$indicadorId?>" class="form-control porc" type="number"
                        data-old-per="<?=$valorPorcentaje?>" value="<?=$valorPorcentaje?>" <?=$tienePermiso ? "" : "disabled" ?>>
                      <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                  </td>
                  <?php } ?>

                  <td style="min-width: 100px;"><label class="suma-porc"><?=$sumaPorc?></label> %</td>
                  <!-- Agrega más filas según tus necesidades -->
                  <td>
                  <?php if($tienePermiso): ?>
                    <button class="btn btn-success actualizar-porc">Actualizar</button>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php } ?>

                <?php
                    if(count($arrIds)>0){
                      $paramIds=implode(",", $arrIds);
                    }else{
                      $checkChildren=false;
                    } 
                  }
                ?>

              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
          <div class="row mb-3 mt-3">
            <div class="col">
              <select class="form-select" name="selectMonth" id="selectMonth">
                <option value="0">Mes actual</option>
                <option value="1">Próximo mes</option>
              </select>
            </div>
            <div class="col">
            </div>
            <div class="col d-flex justify-content-end">
              <button class="btn btn-success" onclick="descargar()">Descargar excel</button>

            </div>

          </div>
          <div class="table-responsive tabla-pagos">

          </div>
        </div>
        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>
    <input type="hidden" id="num_indicadores" value="<?=$j?>">
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

  <!-- use version 0.20.2 -->
  <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/shim.min.js"></script>
  <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <script>
  
    document.title = "Scorecard pagos";    
    $(document).ready(function() {
      let currentUserId = $("#currentUserId").val();
      recargar_tabla(currentUserId);
    });


  $(".subir-archivo").click(function() {
    let archivoppto = $('#archivo');
    let numIndicadores = $("#num_indicadores").val();

    let archivo = archivoppto[0].files[0];
    if ((archivo === undefined)) {
      console.log("Archivo vacio")
    } else {
      let formData = new FormData();
      formData.append('archivo', archivo);
      formData.append('numIndicadores', numIndicadores);

      $.ajax({
        url: "altas/subir_puesto_indicador_excel.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('.loader').show();
        }
      }).done(function(response) {
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
    let elementoPorcentaje = $(this).parent().parent().find('.suma-porc');
    let sumaPorcentaje = $(this).parent().parent().find('.suma-porc').text();

    console.log(sumaPorcentaje);

    campos.each(function(index) {
      let actual = $(this);
      let porcentaje = actual.val();
      let indicadorId = actual.attr('data-indic');
      let porcentajeAnterior = actual.attr('data-old-per');
      if (porcentaje != "" && porcentaje != porcentajeAnterior) {
        //console.log("Puesto: " + positionId + " Valor del campo: " + porcentaje + " Id de indicador: " + indicadorId + " porcentaje anterior: " + porcentajeAnterior);
        sumaPorcentaje = (sumaPorcentaje - porcentajeAnterior) + parseInt(porcentaje);
        //sumaPorcentaje += porcentaje;
        console.log("Valor nuevo: " + (porcentaje - 5));
        elementoPorcentaje.text(sumaPorcentaje);
        actual.attr('data-old-per', porcentaje);
        subir_pos_ind(indicadorId, positionId, porcentaje, boton)
      }
    });

    if (varValue != oldValue) {
      console.log("diferentes");
      actualizar_var(varValue, userId, boton);
    }

    let currentUserId = $("#currentUserId").val();
    recargar_tabla(currentUserId);
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

  $('#selectMonth').on('change', function() {
    //alert("asi es");
    console.log("Movimiento tabla pagos");
    let currentUserId = $("#currentUserId").val();
    recargar_tabla(currentUserId);
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

  const recargar_tabla = (currentUserId, month="") => {

    $.ajax({
      url: "layout/tabla_pagos.php",
      type: "POST",
      data: {
        currentUserId,
        month
      }
    }).done(function(response) {
      $(".tabla-pagos").empty();
      $(".tabla-pagos").append(response);
    });
  }



  const descargar = () => {
    // Exporta una tabla HTML a excel
    //obtener tabla en variable
    var tbl = document.getElementById("tablaPestana2");
    //se agrega tabla a objeto XLSX
    const wb = XLSX.utils.table_to_book(tbl);
    //se escribe xlsx y se descarga
    XLSX.writeFile(wb, "pagos.xlsx");
  }
  </script>