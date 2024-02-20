<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>

<?php 
  $indicadores=Consultas::listIndicatorVPM($conn); 
  $formatos=Consultas::listValueTypes($conn);
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS INDICADORES</h1>
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
              $porcCumplimiento= Utils::porcCumplimiento($indicadores[$i]['real'],$indicadores[$i]['objetivo']);             
              ?>
                  <tr data-id="<?=$indicadores[$i]['id']?>">
                    <td><?=$indicadores[$i]['nombreIndicador']?></td>
                    <td>
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaGyD)?>
                    </td>
                    <td>
                      <!---->
                      <?=Utils::mostrarReglas($indicadoresReglaSyL)?>
                    </td>
                    <td><?=$indicadores[$i]['comentarios']?></td>
                    <td><?=Utils::calcularPorc($indicadoresReglaGyD,$porcCumplimiento)?></td>
                    <td><?=Utils::calcularPorc($indicadoresReglaSyL,$porcCumplimiento)?></td>
                    <td><input type="number" class="val-real" value="<?=$indicadores[$i]['real']?>"></td>
                    <td><input type="number" class="val-obj" value="<?=$indicadores[$i]['objetivo']?>"></td>                
                    <!--campo de formato-->
                    <td>
                      <select name="formato" class="value-type">
                      <?php for($j=0; $j < count($formatos); $j++){ ?>
                          <option value="<?=$formatos[$j]['id']?>" <?php $selected = $indicadores[$i]['formatoId']==$formatos[$j]['id'] ? "selected" : ""; echo $selected; ?>><?=$formatos[$j]['nombreFormato']?></option>
                        <?php } ?>
                      </select>
                    </td>
                    <!--campo de formato-->
                    <td><?=$porcCumplimiento." %"?></td>
                    <td><button class="btn btn-success actualizar-ind">Actualizar</button></td>                  
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
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    $(".actualizar-ind").click(function(){
      let indicadorId=$(this).parent().parent().attr('data-id');
      let valorReal=$(this).parent().parent().find('.val-real').val();
      let valorObjetivo=$(this).parent().parent().find('.val-obj').val();
      let formatoId=$(this).parent().parent().find('.value-type').val();      
      let fecha = new Date(),
      mes = fecha.getMonth()+1,
      anio = fecha.getFullYear();

      //console.log(indicadorId, valorReal, valorObjetivo, formatoId, mes, anio);
      if(indicadorId!="" && valorReal!="" && valorObjetivo!="" && formatoId!="" && mes!="" && anio!=""){
        actualizar_ind(indicadorId, valorReal, valorObjetivo, formatoId, mes, anio);
      }
    })


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
  </script>