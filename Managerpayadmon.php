<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(5);
  //permiso no. 9 edicion de pagos
  $tienePermiso=Utils::buscarPermiso(9);
  //permiso no. 10 revision de pagos
  $permisoRev = Utils::buscarPermiso(10);
  //permiso no. 11 autorización de pagos  
  $permisoAut = Utils::buscarPermiso(11);  
  //permiso no. 12 ver todos los pagos de todos los empleados
  $permisoPagosTodos  = Utils::buscarPermiso(12);

  $yr=date('Y');
  $month=date('m');

  if((isset($_GET['yr']) && $_GET['yr']!='') && (isset($_GET['month']) && $_GET['month']!='')){
    $yr = $_GET['yr'];
    $month = $_GET['month'];
  }else{

    
    if($month=="1"){
      $month="12";
      $yr=date('Y')-1;
    }else{
      $month=date('m')-1;    
    }
  }

  //$yr=date('Y');
  //$month=date('m');

  //if($month=="1"){
    //$month="12";
    //$yr=date('Y')-1;
  //}else{
    //$month=date('m')-1;    
  //}  

  $mesLetra=Utils::obtenerNombreMes($month);
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<?php $areas = Consultas::listAreas($conn); ?>
<?php $current_area_id="0" ?>

<?php 
  $indicadores=Consultas::listIndicator($conn); 
  //$usuarios=Consultas::listUsers($conn);
  
  if($permisoPagosTodos){
    $current_user_id = 1;
    
  }else{
    $current_user_id = $_SESSION['identity']->userId;
    $current_area_id = $_SESSION['identity']->areaId;
  }
  $usuarios=Consultas::listUsersBySupervisor($conn,$current_user_id);    
  
  
  $j=0;

  //$isValidated=Consultas::isValidated($conn, )  
  //variable donde se guarda en enlace entre el usuario y la autorizacion. en este caso solo se usara para revision o para autorizacion de pagos
  $enlaceValidacion="";
  $authorizationId="0";
  $validacionOpuesta="";
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

<body>
  <main id="main" class="main">
      <input type="hidden" value="<?=$current_user_id?>" id="currentUserId">
      <input type="hidden" value="<?=$current_area_id?>" id="currentAreaId">
      <div class="pagetitle">
        <h1>PAGOS</h1>
        <hr>
      </div><!-- End Page Title -->

    <!--LA SIGUIENTE VALIDACION ES PARA VERIFICAR SI EL USUARIO ACTUAL TIENE PERMISO DE AUTORIZAR LOS PAGOS-->
    <?php if($permisoRev || $permisoAut): 



      //con este for vamos a buscar los permisos requeridos
      //ojo: para este caso solo ocuparemos la revision y la autorizacion y solo puede ser una de las dos
      for ($au=0; $au < count($_SESSION['permisos']); $au++) { 
        //si contiene el permiso revision, se obtiene el userAuthorizationId 
        //revision es la no. 10
        if($_SESSION['permisos'][$au]['autorizacionId']=='10'){
          $enlaceValidacion=$_SESSION['permisos'][$au]['enlaceAutorizacionId'];
          $authorizationId="10";
        }

        //si contiene el permiso autorizacion, se obtiene el userAuthorizationId 
        //autorizacion es la no. 11
        if($_SESSION['permisos'][$au]['autorizacionId']=='11'){
          $enlaceValidacion=$_SESSION['permisos'][$au]['enlaceAutorizacionId'];
          $authorizationId="11";
        }        
      }

      //var_dump($enlaceValidacion);

    ?>
    <div class="row">
      <div class="col"></div>
      <div class="col"></div>
      <div class="col d-flex justify-content-end">

        <!--LA SIGUIENTE VALIDACION ES PARA VERIFICAR QUE TIPO DE VALIDACIÓN VA A HACER EL USUARIO QUE PUEDE HACERLA-->
        <?php if($permisoRev): ?>

          <button class="btn btn-warning" id="validar">Validar pagos para autorización</button>

        <?php endif; ?>
        <?php if($permisoAut): ?>

          <button class="btn btn-warning" id="autorizar">Autorizar pagos</button>

        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
    <?php 
      $opAuthorizationId="";
      if($authorizationId=='10'){
        $opAuthorizationId='11';
      }else{
        $opAuthorizationId='10';
      }
      $validacionOpuesta=Consultas::isValidated($conn, $month, $yr, $opAuthorizationId); 
      //var_dump($validacionOpuesta[0]['cantValidados']);
    
    ?>
    <div class="row">
      <div class="col"></div>
      <div class="col"></div>
      <div class="col d-flex justify-content-end">
        <?php 
          //si la contraria es 10, o sea que quien ve esto es el director general
          //y no ha sido revisado por direccion administrativa
          $adv='';
          if($opAuthorizationId=='10' && $validacionOpuesta[0]['cantValidados']=='0'):
            $adv='Falta revisión de pagos';
          
          endif; ?>

        <?php 
          //si la contraria es 10, o sea que quien ve esto es el director general
          //y no ha sido revisado por direccion administrativa
          if($opAuthorizationId=='11' && $validacionOpuesta[0]['cantValidados']=='1'):
          $adv='Pagos ya autorizados';
          endif; ?>    
        
        <label id="advertencia"><?=$adv?></label>
      </div>            
    </div>
      <input type="hidden" id="userAuthorizationId" value="<?=$enlaceValidacion?>">
      <input type="hidden" value="<?=$authorizationId?>" id="authorizationId">
      <input type="hidden" value="<?=$opAuthorizationId?>" id="opAuthorizationId">   
      <input type="hidden" id="yr" value="<?=$yr ?>">
      <input type="hidden" id="month" value="<?=$month ?>">
    <!--LA SIGUIENTE VALIDACION ES PARA VERIFICAR SI SE VA A MOSTRAR O NO LOS PAGOS, ESPERANDO LA AUTORIZACION--->
    <?php if(true): ?>
    <div class="container mt-4">

      <div class="row mt-3 mb-3">
      <div class="col-2">
    <select class="form-select" name="selectMonth" id="selectMonth">
      <option value="1" <?=$month=="1" ? "selected" : "" ?>>Enero</option>
      <option value="2" <?=$month=="2" ? "selected" : "" ?>>Febrero</option>
      <option value="3" <?=$month=="3" ? "selected" : "" ?>>Marzo</option>
      <option value="4" <?=$month=="4" ? "selected" : "" ?>>Abril</option>
      <option value="5" <?=$month=="5" ? "selected" : "" ?>>Mayo</option>
      <option value="6" <?=$month=="6" ? "selected" : "" ?>>Junio</option>
      <option value="7" <?=$month=="7" ? "selected" : "" ?>>Julio</option>
      <option value="8" <?=$month=="8" ? "selected" : "" ?>>Agosto</option>
      <option value="9" <?=$month=="9" ? "selected" : "" ?>>Septiembre</option>
      <option value="10" <?=$month=="10" ? "selected" : "" ?>>Octubre</option>
      <option value="11" <?=$month=="11" ? "selected" : "" ?>>Noviembre</option>
      <option value="12" <?=$month=="12" ? "selected" : "" ?>>Diciembre</option>    
    </select>
  </div>
  <div class="col-2">
    <select class="form-select" name="selectYear" id="selectYear">
      <option value="2024" <?=$yr=="2024" ? "selected" : "" ?>>2024</option>
      <option value="2025" <?=$yr=="2025" ? "selected" : "" ?>>2025</option>
      <option value="2026" <?=$yr=="2026" ? "selected" : "" ?>>2026</option>
      <option value="2027" <?=$yr=="2027" ? "selected" : "" ?>>2027</option>
      <option value="2028" <?=$yr=="2028" ? "selected" : "" ?>>2028</option>
      <option value="2029" <?=$yr=="2029" ? "selected" : "" ?>>2029</option>
      <option value="2030" <?=$yr=="2030" ? "selected" : "" ?>>2030</option>            
    </select>
  </div>
        <div class="col-3">
          <?php if($current_area_id=='0'){ 
            ///////////////se repite el id area porque estan dentro de opciones diferentes de los if
            ?>
          <select class="form-select" name="area" id="area">
            <option value="">Todas las áreas</option>
            <?php for ($a=0; $a < count($areas); $a++) {  ?>
            <option value="<?=$areas[$a]['areaId']?>"><?=$areas[$a]['nombreArea']?></option>  
            <?php } ?>
          </select>
          <?php }else{ 
            ///////////////se repite el id area porque estan dentro de opciones diferentes de los if            
            ?>
            <select class="form-select" name="area" id="area" disabled>
            <option value="">Todas las áreas</option>
            <?php for ($a=0; $a < count($areas); $a++) {  ?>
            <option value="<?=$areas[$a]['areaId']?>" <?=$resp=$areas[$a]['areaId']==$current_area_id ? 'selected' : '' ?>><?=$areas[$a]['nombreArea']?></option>  
            <?php } ?>
          </select>          
          <?php } ?>
        </div>        

      </div>



      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2"
            aria-selected="false">Pagos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Indicadores</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->
        <div class="tab-pane fade" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
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
                  <th class="columna<?=$indicadores[$i]['areaId']?>"><?=$indicadores[$i]['id']?> - <?=$indicadores[$i]['nombreIndicador']?></th>
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
                <tr class="<?=$usuariosArr['areaId']?>" data-user-id="<?=$usuariosArr['usuarioId']?>" data-pos-id="<?=$usuariosArr['puestoId']?>">
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
                  <td class="columna<?=$indicadores[$j]['areaId']?>" style="min-width: 150px;">
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
                <tr class="<?=$usuariosArrChildren['areaId']?>" data-user-id="<?=$usuariosArrChildren['usuarioId']?>"
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
                  <td class="columna<?=$indicadores[$j]['areaId']?>" style="min-width: 150px;">
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

        <div class="tab-pane fade show active" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
          <div class="row mb-3 mt-3">
            <div class="col">

              <h3>Pagos de <?=$mesLetra?></h3>
            </div>
            <div class="col">
            </div>
            <div class="col d-flex justify-content-end">
              <!--<button class="btn btn-success" onclick="descargar()">Descargar excel</button>-->
              <a class="btn btn-success" href="generar_xlsx_pagos.php?areaid=0&yr=<?=$yr?>&month=<?=$month?>" id="btnDescargar">Descargar excel</a>
            </div>

          </div>
          <div class="table-responsive tabla-pagos">

          </div>
        </div>
        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>
    <input type="hidden" id="num_indicadores" value="<?=$j?>">
    <?php else: ?>
      <div class="container mt-4">
        <div class="row">
          <div class="col-2">

          </div>
          <div class="col" style="text-align: center;">
            <h2>Pagos en proceso de autorización</h2>

          </div>
          <div class="col-2"></div>
        </div>
      </div>
    <?php endif; ?>
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

  <!-- use version 0.20.2 -->
  <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/shim.min.js"></script>
  <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <script>
  
    document.title = "Scorecard pagos";    
    $(document).ready(async function() {
      let currentUserId = $("#currentUserId").val();
      let anioRec=$("#yr").val();
      let mesRec=$("#month").val();
      await recargar_tabla(currentUserId,mesRec,anioRec);
      let anio=$("#tablaPestana2").attr('data-year');
      let mes=$("#tablaPestana2").attr('data-month');
      let idAutorizacion=$("#authorizationId").val();
      validacion_check(mes, anio, idAutorizacion);
      /*
      let currentAreaId = $("#currentAreaId").val();
      if(currentAreaId!='0'){
        filtrar_tabla(currentAreaId);
      }
      */
      
    });


  $(".subir-archivo").click(function() {
    let archivoppto = $('#archivo');
    //let numIndicadores = $("#num_indicadores").val();

    let archivo = archivoppto[0].files[0];
    if ((archivo === undefined)) {
      console.log("Archivo vacio")
    } else {
      let formData = new FormData();
      formData.append('archivo', archivo);
      //formData.append('numIndicadores', numIndicadores);

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
        window.location.reload();
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
    let anioRec=$("#yr").val();
    let mesRec=$("#month").val();
    recargar_tabla(currentUserId,mesRec,anioRec);
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

  $('#selectMonth').on('change', async function() {
    //alert("asi es");
    /*
    let mes = $(this).val();
    
    let currentUserId = $("#currentUserId").val();
    await recargar_tabla(currentUserId,mes);
    
    let anio=$("#tablaPestana2").attr('data-year');
    
    let idAutorizacion=$("#authorizationId").val();
    let opAuthorizationId = $("#opAuthorizationId").val();
    
    await validacion_check(mes, anio, idAutorizacion);
    
    await validacion_check_op(mes, anio, opAuthorizationId);
    */
    let month = $(this).val();
    let year = $("#selectYear").val();    
    window.location.replace('Managerpayadmon.php?month='+month+'&yr='+year);
  });

  $('#selectYear').on('change', async function() {
    let month = $("#selectMonth").val();    
    let year = $(this).val();
    window.location.replace('Managerpayadmon.php?month='+month+'&yr='+year); 
  });  

  $("#validar").click(function(){
    validar_pagos();
  });

  $("#autorizar").click(function(){  
    validar_pagos();
  });  

  $("#area").on("change", function(){
    changeParam($(this).val());
    filtrar_tabla($(this));

  });

  const filtrar_tabla = (_this) => {
    // Declaramos el array vacío
    let valores = [];
    let valActual = _this.val();

    $('#area option').each(function() {
      let valComp=$(this).val();
      if(valComp!=''){
        $("."+valComp).show();
        // Ocultar encabezados de columnas
        $('.columna'+valComp).show();
        // Ocultar celdas de columnas
        $('.columna'+valComp).show();
      }
    });

    // Seleccionamos todas las opciones dentro del select con id "anio"
    $('#area option').each(function() {
      let valComp=$(this).val();

      if(valActual!=valComp && valComp!='' && valActual!=""){
        $("."+valComp).hide();
        // Ocultar encabezados de columnas
        $('.columna'+valComp).hide();
        // Ocultar celdas de columnas
        $('.columna'+valComp).hide();        
      }
    });    
  }

  const validar_pagos = () => {
    let userAuthorizationId = $("#userAuthorizationId").val();
    let authorizationId = $("#authorizationId").val();    

    if(authorizationId=='10'){
      authorizationId='11';
    }else{
      authorizationId='10';
    }

    //alert(authorizationId);
    //return false;

    //let month = $("#selectMonth").val();
    //let year = 2024;
    let month = $("#month").val();
    let year = $("#yr").val();    
    let fd = new FormData();

    fd.append('userAuthorizationId', userAuthorizationId);
    fd.append('month', month);
    fd.append('year', year);    
    fd.append('authorizationId', authorizationId);

    fetch('cambios/validar_pagos.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        if (data.ok) {
          location.reload();
        } 
        /*
        else {
          alert(data.message);
        }
        */

      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })    
    //alert(userAuthorizationId);    
  }

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

  const recargar_tabla = async (currentUserId, month="", year="") => {

    await $.ajax({
      url: "layout/tabla_pagos.php",
      type: "POST",
      data: {
        currentUserId,
        month,
        year
      }
    }).done(function(response) {
      //console.log('si esta funcionando');
      $(".tabla-pagos").empty();
      $(".tabla-pagos").append(response);
      filtrar_tabla($("#area"));
    });
  }



  const descargar = () => {
    // Exporta una tabla HTML a excel
    //obtener tabla en variable
    var tbl = document.getElementById("tablaPestana2");
    //console.log(tbl);
    //se agrega tabla a objeto XLSX
    const wb = XLSX.utils.table_to_book(tbl);
    //se escribe xlsx y se descarga
    XLSX.writeFile(wb, "pagos.xlsx");
  }

  const validacion_check = async (month, year, authorizationId) => {
    let fdCheck = new FormData();
    //let resultado;
    fdCheck.append('month', month);
    fdCheck.append('year', year);
    fdCheck.append('authorizationId', authorizationId);

    await fetch('helpers/validacion_check.php', {
      method: "POST",
      body: fdCheck
    })
    .then(response => {
      return response.ok ? response.json() : Promise.reject(response);
    })
    .then(data => {
      console.log("las rows: ", data.rows);
      
      if(data.rows>0){
        let msg='Revertir validación';
        $("#validar").html(msg);
        $("#autorizar").html(msg);
      }else{        
        $("#validar").html('Validar pagos para autorización');
        $("#autorizar").html('Autorizar pagos');
      }

      //resultado = data.rows;se; 
      
      //location.reload();
    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })
  }

  const validacion_check_op = async (month, year, opAuthorizationId) => {
    let fdCheck = new FormData();
    //let opAuthorizationId = $("#opAuthorizationId").val();
    //let resultado; <label id="advertencia"></label>
    fdCheck.append('month', month);
    fdCheck.append('year', year);
    fdCheck.append('authorizationId', opAuthorizationId);
    $("#advertencia").text("");
    await fetch('helpers/validacion_check.php', {
      method: "POST",
      body: fdCheck
    })
    .then(response => {
      return response.ok ? response.json() : Promise.reject(response);
    })
    .then(data => {
      console.log("las rows de la opuesta: ", data.rows);
      
      if(data.rows>0){

        if(opAuthorizationId=='11'){
          //alert("Pagos ya autorizados")
          $("#advertencia").text("Pagos ya autorizados");
        }        
      }

      if(data.rows==0){
        if(opAuthorizationId=='10'){
          //alert("Falta revisión de pagos")
          $("#advertencia").text("Falta revisión de pagos");
        }
      }

      //resultado = data.rows;se; 
      
      //location.reload();
    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })
  }  

  const changeParam = (nuevoAreaId) => {
      // Obtener el valor actual del href
      var hrefActual = $('#btnDescargar').attr('href');
      
      if(nuevoAreaId==''){
        nuevoAreaId=0;
      }
      // Aquí se cambia el valor del parámetro "areaid" a 5
      //var nuevoAreaId = 5;
        
      // Modificar el href agregando el nuevo parámetro "areaid"
      var nuevoHref = hrefActual.replace(/areaid=\d+/, 'areaid=' + nuevoAreaId);
        
      // Asignar el nuevo href al botón
      $('#btnDescargar').attr('href', nuevoHref);
    }
  </script>