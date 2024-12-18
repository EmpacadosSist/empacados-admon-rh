<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');

  //permiso de edicion del scorecardmensual
  $permisoEdicion=Utils::buscarPermiso(4);
  $position_id=$_SESSION['identity']->positionId;
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php 
  $indicadores=Consultas::listIndicator($conn);
  //$indicadoresMontos=Consultas::listIndicatorVPM($conn);   
  $formatos=Consultas::listValueTypes($conn);
  $areas = Consultas::listAreas($conn); 
  //$month = 4;

  $month = isset($_GET['month']) ? $_GET['month'] : date('n');

  $year = isset($_GET['yr']) ? $_GET['yr'] : date('Y');

  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  $mesSpanish=strtoupper($meses[$month-1]);
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
  left: 50px;
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
    <div class="pagetitle">
      <h1>SCORECARD <?=$mesSpanish?></h1>
      <hr>
    </div><!-- End Page Title -->
<input type="hidden" id="inpMonth" value="<?=$month?>">
<input type="hidden" id="inpYear" value="<?=$year?>">

<?php if($permisoEdicion): ?>
<div class="row mb-3 mt-3">
  <div class="col">
    <a class="btn btn-success" href="generar_xlsx_scorecard.php?areaid=0" id="btnDescargar">Descargar plantilla excel con id</a>
  </div>
  <div class="col d-flex justify-content-end">
    <label for="archivo"></label>
  </div>
  <div class="col">
    <input class="form-control" type="file" name="archivo" id="archivo" accept=".xls,.xlsx">
  </div>
  <div class="col-1 d-flex justify-content-end">
    <button class="btn btn-success subir-archivo">Subir</button>
  </div>  
</div>
<?php endif; ?>

<div class="row">
  <div class="col">
    <select class="form-select" name="area" id="area">
      <option value="">Todas las áreas</option>
      <?php for ($a=0; $a < count($areas); $a++) {  ?>
        <option value="<?=$areas[$a]['areaId']?>"><?=$areas[$a]['nombreArea']?></option>  
      <?php } ?>
    </select>
  </div>
  <div class="col"></div>
  <div class="col-3">
    <select class="form-select" name="mes" id="mes">
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
  <div class="col-3">
    <select class="form-select" name="anio" id="anio">
      <option value="2024" <?=$year=="2024" ? "selected" : "" ?>>2024</option>
      <option value="2025" <?=$year=="2025" ? "selected" : "" ?>>2025</option>
      <option value="2026" <?=$year=="2026" ? "selected" : "" ?>>2026</option>
      <option value="2027" <?=$year=="2027" ? "selected" : "" ?>>2027</option>
      <option value="2028" <?=$year=="2028" ? "selected" : "" ?>>2028</option>
      <option value="2029" <?=$year=="2029" ? "selected" : "" ?>>2029</option>
      <option value="2030" <?=$year=="2030" ? "selected" : "" ?>>2030</option>            
    </select>
  </div>
  
</div>



<div class="container mt-4">
  <!-- Pestañas -->
  <ul class="nav nav-tabs" id="pestanas" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Indicadores</a>
    </li>
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
    <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaPestana1">
          <!-- Contenido de la tabla -->
          <thead>
            <tr>
              <th class="st">Id</th>
              <th class="st1">Nombres</th>
              <th>Área</th>
              <th>Reglas Bonos GyD</th>
              <th>Reglas Bonos SyL</th>
              <th>Comentarios</th>
              <th>% GyD</th>
              <th>% SyL</th>
              <th>Real</th>
              <th>Objetivo</th>
              <th>Formato</th>
              <th>% Cumplimiento</th>
              <th></th>

              <!-- Agrega más columnas según tus necesidades -->
            </tr>
          </thead>
          <tbody>
          <?php 

            for ($i=0; $i < count($indicadores); $i++) { 

              $indicadorIdth=$indicadores[$i]['id'];
              $puestoIdth= $position_id;
              $porcentajeth=Consultas::paymentVar($conn, $puestoIdth, $indicadorIdth);
              $valorPorcentajeth= isset($porcentajeth[0]) ? $porcentajeth[0]['porcentaje'] : 0; 
             


              $indicadoresReglaGyD=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$i]['id'],0);
              $indicadoresReglaSyL=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$i]['id'],1);
              $indicadorValores=Consultas::listIndicatorVPMIndiv($conn,$indicadores[$i]['id'],$month,$year);
              $real=isset($indicadorValores[0]['real']) ? $indicadorValores[0]['real'] : "0.00";
              $objetivo=isset($indicadorValores[0]['objetivo']) ? $indicadorValores[0]['objetivo'] : "0.00";
              $formatoId=isset($indicadorValores[0]['formatoId']) ? $indicadorValores[0]['formatoId'] : "0";
              //$porcCumplimiento=0;
              $porcCumplimiento= Utils::porcCumplimiento($real,$objetivo);
              $diffPorc = Utils::diffPorc($real,$objetivo);

              if($formatoId=='4' || $formatoId=='5' || $formatoId=='6'){
                $porcCumplimiento= Utils::porcCumplimiento($objetivo, $real);
                $diffPorc = Utils::diffPorc($objetivo, $real);
              }
              
              if($permisoEdicion || $valorPorcentajeth>0)
              {

                            
              ?>
                  <tr data-id="<?=$indicadores[$i]['id']?>" class="<?=$indicadores[$i]['areaId']?>">
                    <td class="st" style="min-width: 50px;"><?=$indicadores[$i]['id']?></td>
                    <td class="st1" style="min-width: 100px;"><?=$indicadores[$i]['nombreIndicador']?></td>
                    <td><?=$indicadores[$i]['nombreArea']?></td>
                    <td style="min-width: 300px;">
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaGyD)?>
                    </td>
                    <td style="min-width: 300px;">
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaSyL)?>
                    </td>
                    <td style="min-width: 300px;"><?=$indicadores[$i]['comentarios']?></td>

                    <td style="min-width: 100px;"><?=Utils::calcularPorc($indicadoresReglaGyD,$porcCumplimiento,$indicadores[$i]['calculo'],$real, $diffPorc)?></td>
                    <td style="min-width: 100px;"><?=Utils::calcularPorc($indicadoresReglaSyL,$porcCumplimiento,$indicadores[$i]['calculo'],$real, $diffPorc)?></td>

                    <td style="min-width: 200px;">
                      <!--Label e input para valor real-->
                      <label class="form-control <?php echo $permisoEdicion ? "lbl-real" : "" ?>"><?=$real!="" ? number_format($real,2) : ""?></label>
                      <?php if($permisoEdicion): ?>
                      <input type="number" class="form-control val-real" value="<?=$real?>" style="display: none;">
                      <?php endif; ?>                        
                    </td>
                    <td style="min-width: 200px;">
                      <!--Label e input para valor objetivo-->                                          
                      <label class="form-control <?php echo $permisoEdicion ? "lbl-obj" : "" ?>"><?=$objetivo!="" ? number_format($objetivo,2) : ""?></label>
                      <?php if($permisoEdicion): ?>
                      <input type="number" class="form-control val-obj" value="<?=$objetivo?>" style="display: none;">
                      <?php endif; ?>
                    </td>                
                    <!--campo de formato-->
                    <td style="min-width: 150px;">
                      <select name="formato" class="custom-select value-type" <?=$permisoEdicion ? "" : "disabled" ?>>
                      <?php for($j=0; $j < count($formatos); $j++){ ?>
                          <option value="<?=$formatos[$j]['id']?>" <?php $selected = $formatoId==$formatos[$j]['id'] ? "selected" : ""; echo $selected; ?>><?=$formatos[$j]['nombreFormato']?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <!--campo de formato-->
                    <td><?=$porcCumplimiento." %"?></td>
                    <td>
                      <?php if($permisoEdicion): ?>  
                      <button class="btn btn-success actualizar-ind">Actualizar</button>
                      <?php endif; ?>
                    </td>                  
                  </tr>
                <?php 
                } 
                }
                ?>              
          </tbody>
        </table>
      </div>
    </div>

    <!-- Agrega más contenidos de pestañas según sea necesario -->

  </div>
</div>

</div>
   <div class="modal fade" id="modalEliminar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<!-- Contenido del modal para eliminar -->
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <p>¿Estás seguro de que deseas eliminar al empleado "Unity Pugh"?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      <button type="button" class="btn btn-danger">Eliminar</button>
    </div>
  </div>
</div>
</div>


<script>
  $(document).ready(function() {

    // Configuración común para todas las tablas
    var commonConfig = {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ],
      language: {
        search: '<i class="fas fa-search"></i>',
        searchPlaceholder: 'Buscar...',
        lengthMenu: 'Mostrar _MENU_ registros por página',
        zeroRecords: 'No se encontraron registros',
        info: 'Mostrando página _PAGE_ de _PAGES_',
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtrados de un total de _MAX_ registros)',
        paginate: {
          first: 'Primera',
          previous: 'Anterior',
          next: 'Siguiente',
          last: 'Última'
        }
      }
    };

    // Tabla Pestaña 1
    $('#tablaPestana1').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana2').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana3').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana4').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana5').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana6').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana7').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana8').DataTable(commonConfig);

    // Tabla Pestaña 2
    $('#tablaPestana9').DataTable(commonConfig);

   
    // Inicializar más tablas según sea necesario
  });
</script>



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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>

    document.title = "Scorecard <?=strtolower($mesSpanish)?>";

    $(".actualizar-ind").click(function(){
      let indicadorId=$(this).parent().parent().attr('data-id');
      let valorReal=$(this).parent().parent().find('.val-real').val();
      let valorObjetivo=$(this).parent().parent().find('.val-obj').val();
      let formatoId=$(this).parent().parent().find('.value-type').val();      
      let fecha = new Date(),

      mes = $("#inpMonth").val(),
      anio = $("#inpYear").val();      

      //console.log(indicadorId, valorReal, valorObjetivo, formatoId, mes, anio);
      if(indicadorId!="" && valorReal!="" && valorObjetivo!="" && formatoId!="" && mes!="" && anio!=""){
        actualizar_ind(indicadorId, valorReal, valorObjetivo, formatoId, mes, anio);
      }
    })

    $(".lbl-real").click(function(){
      mostrar_input($(this),".val-real");
    });

    $(".lbl-obj").click(function(){
      mostrar_input($(this),".val-obj");
    });    

    $(".val-real").on("blur", function(){
      ocultar_input($(this), ".lbl-real");
    });

    $(".val-obj").on("blur", function(){
      ocultar_input($(this), ".lbl-obj");
    });    

    $("#mes").on("change", function(){
      let mes = $(this).val();
      let anio = $("#anio").val();
      //window.location.href='Managerscoremensualadmon.php?month='+mes+'&yr='+anio;
      reload_page(mes, anio);
    });

    $("#anio").on("change", function(){
      let mes = $("#mes").val();
      let anio = $(this).val();
      reload_page(mes, anio);
    });    

    $("#area").on("change", function(){
      // Declaramos el array vacío
      let valores = [];
      let valActual = $(this).val();

      $('#area option').each(function() {
        let valComp=$(this).val();
        if(valComp!=''){
          $("."+valComp).show();

        }
      });

      // Seleccionamos todas las opciones dentro del select con id "anio"
      $('#area option').each(function() {
        let valComp=$(this).val();

        if(valActual!=valComp && valComp!='' && valActual!=""){
          $("."+valComp).hide();
        }

          // Obtenemos el valor de cada opción y lo añadimos al array
          //valores.push($(this).val());
      });

      // Mostramos el array en la consola
      //console.log("actual: "+valActual, valores);

      changeParam(valActual);
    });

    $(".subir-archivo").click(function() {
      let archivoppto = $('#archivo');
      let numIndicadores = $("#num_indicadores").val();
      let mes = $("#mes").val();
      let anio = $("#anio").val();      

      let archivo = archivoppto[0].files[0];
      if ((archivo === undefined)) {
        console.log("Archivo vacio")
      } else {
        let formData = new FormData();
        formData.append('archivo', archivo);
        formData.append('month', mes);
        formData.append('year', anio);                
        //formData.append('numIndicadores', numIndicadores);
        //console.log("Si hay archivo ", archivo);
        $.ajax({
          url: "altas/subir_scorecard_mensual_excel.php",
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
        /*
        */
      }
    });    
    
    const filtrar = (dato) => {

    }

    const reload_page = (mes, anio) => {
      $(".loader").show();
      window.location.href='Managerscoremensualadmon.php?month='+mes+'&yr='+anio;
      console.log({mes, anio});      
    }

    const mostrar_input = (_this, elemento) => {
      let lbl=_this;
      let el=lbl.parent().find(elemento);
      lbl.hide();
      el.show();
      let tmpStr = el.val()=="" ? "0.00" : el.val();
      el.focus();
      el.val('');
      el.val(tmpStr);
    }

    const ocultar_input = (_this, elemento) => {
      let inp=_this;
      let el=inp.parent().find(elemento);
      let numero=inp.val();
      let formattedNum=parseFloat(numero).toFixed(2);
      let formatFinal=addCommas(formattedNum);
      
      el.text(formatFinal);
      inp.hide();
      el.show();
    }    

    const actualizar_ind = (indicadorId, valorReal, valorObjetivo, formatoId, mes, anio) => {
      let datos = {
        indicatorId: indicadorId,
        realValue: valorReal,
        targetValue: valorObjetivo,
        valueTypeId: formatoId,
        month: mes,
        year: anio
      }
        
      let fd = new FormData();

      for(var key in datos){
        fd.append(key, datos[key]);
      }
      console.log(datos);


      fetch('cambios/actualizar_valor_x_mes.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })

    }

    //var valor = 10000.34
    //console.log(addCommas(valor));
    const addCommas = (nStr) => {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
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