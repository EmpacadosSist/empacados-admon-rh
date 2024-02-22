<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>

<?php 
  $indicadores=Consultas::listIndicatorVPM($conn); 
  $usuarios=Consultas::listUsers($conn);
?>

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
              <th>Número de empleado</th>
              <th>Nombre</th>
              <th>Puesto</th>
              <th>$ Variable</th>
              <th>Area</th>
              <th>Nivel en estructura</th>
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
              $usuariosArr=$usuarios[$k];
            ?>
            <tr data-user-id="<?=$usuariosArr['usuarioId']?>" data-pos-id="<?=$usuariosArr['puestoId']?>">
              <td><?=$usuariosArr['numEmpleado']?></td>
              <td><?=$usuariosArr['nombre']." ".$usuariosArr['apellido1']." ".$usuariosArr['apellido2']?></td>
              <td><?=$usuariosArr['puesto']?></td>
              <td><input type="number" class="variable" data-old-value="<?=$usuariosArr['variable']?>" value="<?=$usuariosArr['variable']?>"></td>
              <td><?=$usuariosArr['area']?></td>
              <td><?=$usuariosArr['nivel']?></td>
              <?php for($j=0;$j<count($indicadores);$j++){ 
                $indicadorId=$indicadores[$j]['id'];
                $porcentaje=Consultas::paymentVar($conn, $usuariosArr['puestoId'], $indicadorId);
                $valorPorcentaje= isset($porcentaje[0]) ? $porcentaje[0]['porcentaje'] : ""; 
                //var_dump($muestra);
                ?>
              <td><input data-indic="<?=$indicadorId?>" class="porc" type="number" data-old-per="<?=$valorPorcentaje?>" value="<?=$valorPorcentaje?>"></td>
              <?php } ?>
              
              <td>177</td>   <!-- Agrega más filas según tus necesidades -->
              <td><button class="btn btn-success actualizar-porc">Actualizar</button></td>
            </tr>
            <?php } ?>
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

<script>
  $(".actualizar-porc").click(function(){
    let boton = $(this);
    let positionId=$(this).parent().parent().attr('data-pos-id');
    let campos = $(this).parent().parent().find('.porc');
    let varValue = $(this).parent().parent().find('.variable').val();
    let oldValue = $(this).parent().parent().find('.variable').attr('data-old-value');
    let userId =$(this).parent().parent().attr('data-user-id');
    console.log(varValue, oldValue);
    campos.each(function(index) {
      let actual=$(this);
      let porcentaje=actual.val();
      let indicadorId=actual.attr('data-indic');
      let porcentajeAnterior=actual.attr('data-old-per');
      if(porcentaje!=""&&porcentaje!=porcentajeAnterior){
        console.log( "Puesto: "+positionId+" Valor del campo: "+porcentaje+" Id de indicador: "+indicadorId);
        subir_pos_ind(indicadorId, positionId, porcentaje, boton)
      }
    });

    if(varValue != oldValue){
      console.log("diferentes");
      actualizar_var(varValue, userId, boton);
    }
  });

  $('.porc').on('keydown', function(e){
    console.log("mensaje");
    if(isFinite(e.key)){
      $(this).parent().parent().find('.actualizar-porc').removeClass("btn-success");
      $(this).parent().parent().find('.actualizar-porc').addClass("btn-danger");

    }
  });

  $('.variable').on('keyup', function(e){
    let valorNuevo=$(this).val();
    let valorAnterior=$(this).attr('data-old-value');
    console.log(e.key+" :: "+valorNuevo+" :: "+valorAnterior);

    if(isFinite(e.key)){
      $(this).parent().parent().find('.actualizar-porc').removeClass("btn-success");
      $(this).parent().parent().find('.actualizar-porc').addClass("btn-danger");

    }

    if(valorNuevo==valorAnterior){
      $(this).parent().parent().find('.actualizar-porc').removeClass("btn-danger");
      $(this).parent().parent().find('.actualizar-porc').addClass("btn-success");      
    }

  });


  const subir_pos_ind = (indicadorId, puestoId, porcentaje, boton) => {
    let datos = {
      indicatorId: indicadorId,
      positionId: puestoId,
      paymentPer: porcentaje
    }
      
    let fd = new FormData();

    for(var key in datos){
      fd.append(key, datos[key]);
    }

    fetch('altas/subir_puesto_indicador.php', {
      method: "POST",
      body: fd
    })
    .then(response => {
      return response.ok ? response.json() : Promise.reject(response);
    })
    .then(data => {
      console.log(data);
      if(data.ok){
        //location.reload();
        if(boton.hasClass('btn-danger')){
          boton.removeClass("btn-danger");
          boton.addClass("btn-success");
        }

      }else{
        alert(data.message);
      }

    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })

  }
  
  const actualizar_var = (variable, usuarioId, boton) => {

    let datos = {
      paymentVar: variable,
      userId: usuarioId
    }
      
    let fd = new FormData();
    
    for(var key in datos){
      fd.append(key, datos[key]);
    }

    fetch('cambios/actualizar_variable.php', {
      method: "POST",
      body: fd
    })
    .then(response => {
      return response.ok ? response.json() : Promise.reject(response);
    })
    .then(data => {
      console.log(data);
      if(data.ok){
        //location.reload();
        if(boton.hasClass('btn-danger')){
          boton.removeClass("btn-danger");
          boton.addClass("btn-success");
        }

      }else{
        alert(data.message);
      }
      
    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })
    
  }

  const enviar_info = (datos, url) => {
    let fd = new FormData();
    
    for(var key in datos){
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
      if(data.ok){
        //location.reload();
        if(boton.hasClass('btn-danger')){
          boton.removeClass("btn-danger");
          boton.addClass("btn-success");
        }

      }else{
        alert(data.message);
      }
      
    })
    .catch(err => {
      let message = err.statusText || "Ocurrió un error";
      console.log(err);
    })    
  }
</script>