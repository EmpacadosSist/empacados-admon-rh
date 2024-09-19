<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(8);
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>


<style>
  .table th,
  .table td {
    text-align: center;
  }

  .table thead th {
    vertical-align: middle;
  }

  .table tbody td {
    vertical-align: middle;
  }

  .table-responsive {
    max-width: 100%;
    overflow-x: auto;
    margin-bottom: 15px;
  }

  .table {
    font-size: 14px;
    color: #333;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  .table th,
  .table td {
    padding: 12px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .table th {
    background-color: #f8f9fa;
    color: #495057;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-primary,
  .table-primary>th,
  .table-primary>td {
    background-color: #b8daff;
  }

  .table-hover .table-primary:hover {
    background-color: #9fcdff;
  }

  .table-hover .table-primary:hover>td,
  .table-hover .table-primary:hover>th {
    background-color: #9fcdff;
  }


  /* Tus estilos aquí */

  /* Estilos para los botones de editar y eliminar */
  .btn-editar,
  .btn-eliminar {
    padding: 5px 10px;
    margin-right: 5px;
  }


  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    font-weight: bold;
  }

  .form-group input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .btn-guardar {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-guardar:hover {
    background-color: #218838;
  }
</style>
<?php $areas = Consultas::listAreas($conn); ?>

<body>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>SUBIR ÁREA</h1>
    <hr>
  </div><!-- End Page Title -->


    <div class="container mt-4">


      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Áreas</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <div class="container">
        <div class="row mt-3">
          <input type="hidden" value="0" id="areaId">
          <div class="col form-group">
            <input type="text" id="areaNombre" name="areaNombre" class="form-control">
            Nombre
          </div>
          <div class="col">
            <button class="btn btn-success form-control" id="btnGuardarArea">Guardar</button>
          </div>
        </div>

        <div class="row mt-3 mb-3" id="rowEdicion" style="display: none;">
          <div class="col">
            <b>Editando: <label id="lblEd"></label></b> <a class="btn btn-secondary btn-sm" href="#" id="limpiar">Limpiar</a>
          </div>
        </div>
      </div>



      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Área</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < count($areas); $i++) { ?>
                  <tr data-id="<?=$areas[$i]['areaId']?>" data-name="<?=$areas[$i]['nombreArea']?>">
                    <td>
                      <?=$areas[$i]['nombreArea']?>
                    </td>
                    <td><button class="btn btn-primary btn-editar"><i class="bi bi-pencil-square ms-auto"></i></button> </td>
                    <td><button class="btn btn-danger btn-eliminar"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                    
                  </tr>
                <?php 
                }
                ?>

            </tbody>
          </table>

        </div>

        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>

    </div>

    <div class="modal fade" id="modalEliminar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <input type="hidden" value="0" id="areaEliminarId">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Área</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar el área seleccionada?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="btnModalEliminar">Eliminar</button>
          </div>
        </div>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    document.title = "Subir área";

    $("#btnGuardarArea").click(function(){
      //todo lo minimo
      let areaName=$("#areaNombre").val();            
      let areaId=$("#areaId").val();

      let url='altas/subir_area.php';

      let datos={
        areaName,
        areaId
      }
      if(areaName!=""){

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }

        if(areaId!='0'){
          url='cambios/actualizar_area.php';
        }
        console.log(datos);
        fetch(url, {
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
      }else{
        //aqui va el codigo de lo que se mostrara en caso de que falten datos
        alert("Falta un dato");
      }                  

    });

    //evento de cambio del check1
    $("#checkRule1").on('change', function(){
      cambioChecks(this, '2');
    });

    //evento de cambio del check2    
    $("#checkRule2").on('change', function(){
      cambioChecks(this, '1');
    });    

    //evento de cambio del check3        
    $("#checkRule3").on('change', function(){
      let campo=$("#bonusPer");
      if($(this).is(':checked')){
        campo.prop('disabled', true);
        campo.val('');
      }else{
        campo.prop('disabled', false);
      }
    });
    
    $(".btn-editar").click(function(){
      let id = $(this).parent().parent().attr('data-id');
      let oldName = $(this).parent().parent().attr('data-name');      

      let areaNombre=$("#areaNombre");

      let lblEd=$("#lblEd");
                                 
      $("#areaId").val(id);

      $("#rowEdicion").show();
      lblEd.text(oldName);     
      areaNombre.val(oldName);  

      console.log({
        id,
        areaNombre,
        lblEd
      });
    });

    $(".btn-eliminar").click(function(){
      let id = $(this).parent().parent().attr('data-id');
      $("#areaEliminarId").val(id);
      $("#modalEliminar1").modal('show');
      //alert(id);
    });

    $("#limpiar").click(function(){
      let areaName=$("#areaNombre");   
      
      $("#areaId").val(0);
      
      areaName.val(''); 
      $("#rowEdicion").hide();
    });

    $("#btnModalEliminar").click(function(){
      let areaId=$("#areaEliminarId").val();
      if(areaId!="0"){
        let datos = {
          areaId
        }
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('bajas/eliminar_area.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          if(data.ok){
            location.reload();
          }else{
            alert(data.message);
          }
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        }) 
      }else{
        //aqui va el codigo de lo que se mostrara en caso de que falten datos
        alert("Falta un dato");
      }  
    });

    //funcion de cambio de checks
    const cambioChecks = (_this, numCheckOp) => {
      let check1=$(_this).is(':checked');
      let check2=$("#checkRule"+numCheckOp).is(':checked');
      let campoMinPer=$("#minPer");
      let campoMaxPer=$("#maxPer");

      //si el check actual es true
      if(check1){
        //si el check opuesto es el 1 o si es el otro se deshabilita los campos de min y max
        if(numCheckOp=='1'){
          campoMaxPer.prop('disabled', true);
          campoMaxPer.val('');
        }else{
          campoMinPer.prop('disabled', true);
          campoMinPer.val('');        
        }
        //si el segundo check esta en true
        if(check2){
          //se quita el check del segundo
          $("#checkRule"+numCheckOp).prop('checked', false);
          //si el segundo check es el 1 o 2 se habilita de nuevo el campo correspondiente
          if(numCheckOp=='1'){
            campoMinPer.prop('disabled', false);
          }else{
            campoMaxPer.prop('disabled', false);
          }
        }
      }else{
        //en caso de que se quite el check, se habilitan los campos correspondientes
        if(numCheckOp=='1'){
          campoMaxPer.prop('disabled', false);

        }else{
          campoMinPer.prop('disabled', false);
        }
      }      
    }

  </script>