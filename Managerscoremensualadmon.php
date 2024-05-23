<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  $permisoEdicion=Utils::buscarPermiso(4);
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php 
  $indicadores=Consultas::listIndicator($conn);
  //$indicadoresMontos=Consultas::listIndicatorVPM($conn);   
  $formatos=Consultas::listValueTypes($conn);
  //$month = 4;
  $month = date('n');
  $year = date('Y');
  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  $mesSpanish=strtoupper($meses[$month-1]);
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>SCORECARD <?=$mesSpanish?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<body>
<input type="hidden" id="inpMonth" value="<?=$month?>">
<input type="hidden" id="inpYear" value="<?=$year?>">
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
              <th>Nombres</th>
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
              $indicadoresReglaGyD=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$i]['id'],0);
              $indicadoresReglaSyL=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$i]['id'],1);
              $indicadorValores=Consultas::listIndicatorVPMIndiv($conn,$indicadores[$i]['id'],$month,$year);
              $real=isset($indicadorValores[0]['real']) ? $indicadorValores[0]['real'] : "0.00";
              $objetivo=isset($indicadorValores[0]['objetivo']) ? $indicadorValores[0]['objetivo'] : "0.00";
              $formatoId=isset($indicadorValores[0]['formatoId']) ? $indicadorValores[0]['formatoId'] : "0";
              //$porcCumplimiento=0;
              $porcCumplimiento= Utils::porcCumplimiento($real,$objetivo);             
              ?>
                  <tr data-id="<?=$indicadores[$i]['id']?>">
                    <td style="min-width: 150px;"><?=$indicadores[$i]['nombreIndicador']?></td>
                    <td style="min-width: 300px;">
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaGyD)?>
                    </td>
                    <td style="min-width: 300px;">
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaSyL)?>
                    </td>
                    <td style="min-width: 300px;"><?=$indicadores[$i]['comentarios']?></td>
                    <td style="min-width: 100px;"><?=Utils::calcularPorc($indicadoresReglaGyD,$porcCumplimiento,$indicadores[$i]['calculo'],$real)?></td>
                    <td style="min-width: 100px;"><?=Utils::calcularPorc($indicadoresReglaSyL,$porcCumplimiento,$indicadores[$i]['calculo'],$real)?></td>
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
  </script>