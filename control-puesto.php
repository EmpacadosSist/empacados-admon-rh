<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(8);
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<?php $tareas = Consultas::listTasks($conn); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
<?php $levels = Consultas::listLevels($conn); ?>

<body>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>SUBIR PUESTO</h1>
    <hr>
  </div><!-- End Page Title -->


    <div class="container mt-4">


      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Puestos</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <div class="container">
        <div class="row mt-3">
          <div class="col-6 form-group">
          <select class="form-select" id="areaId">
                  <option value="">- Seleccione -</option>
                  <?php 
                    for ($i=0; $i < count($areas); $i++) { ?>
                  <option value="<?=$areas[$i]['areaId']?>">
                    <?=$areas[$i]['nombreArea']?>
                  </option>
                  <?php 
                    }
                    ?>
                </select>
            Área
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6 form-group">
          <select class="form-select" id="departamentoId">
                  <option value="">- Seleccione -</option>
                </select>
            Departamento
          </div>
        </div>        
        <div class="row mt-3">
          <input type="hidden" value="0" id="puestoId">
          <div class="col form-group">
            <input type="text" id="puestoNombre" name="puestoNombre" class="form-control">
            Nombre
          </div>
          <div class="col form-group">
            <select class="form-select" id="nivelId">
                  <option value="">- Seleccione -</option>
                  <?php 
                    for ($i=0; $i < count($levels); $i++) { ?>
                  <option value="<?=$levels[$i]['Id']?>">
                    <?=$levels[$i]['nombreNivel']?>
                  </option>
                  <?php 
                    }
                    ?>                
                </select>
            Nivel
          </div>          

        </div>
        <div class="row mt-3 mb-3">
          <div class="col-3"></div>
          <div class="col">
            <button class="btn btn-success form-control" id="btnGuardarPuesto">Guardar</button>
          </div>
          <div class="col-3"></div>
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

        <div class="table-responsive tabla-position">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Puestos</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Funciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>

    </div>

    <div class="modal fade" id="modalEliminar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <input type="hidden" value="0" id="puestoEliminarId">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Puesto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar el puesto seleccionada?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="btnModalEliminar">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
  <!-- modal de bajas  -->
  <div class="modal fade bd-example-modal-ms" tabindex="-1" role="dialog" aria-labelledby="BajasModalLabel"
  aria-hidden="true" id="modalFunciones">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="FuncionesModallbl"></h4>
          <button type="button" class="close" aria-label="Close" id="modalFuncionesClose">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
        <section class="section"> 
      <div class="row">
        <div class="col-lg-12">
          <div class="card">   
            <div class="card-body">
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Funciones
              </h2>
              <div>
                <div class="form-row" style="flex-direction:column;">
                  <div class="form-group col-md-9">
                    <input type="text" id="idpuesto" class="form-control" hidden/>
                    <label for="tarea"><i class="bi bi-list-check"></i> Agregar funciones</label>
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Funcion..." />
                    <div><br></div>
                    <select class="form-control" id="TareaSelect" name="TareaSelect">
                    <option value="">Seleccione las funciones</option>
                      <?php for($i=0; $i<count($tareas); $i++) {?>
                      <option value="<?= $tareas[$i]['id_task'] ?>"><?= $tareas[$i]['name_task'] ?></option>
                      <?php } ?>
                    </select>
                    <span id="error_Task" class="text-danger"></span>
                    <div><br></div>
                    <button class="btn btn-success form-control addtaskbtn" id="AddTaskbtn">Agregar Funcion</button>
                  </div>
                  <div><br><br><br></div>
                    <div class="tab-content" id="contenidoPestanas">
                      <div class="table-responsive tabla-functions">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Puestos</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Funciones</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- <button type="submit" id="BtnModalBajaEmpleado" class="btn btn-primary">Guardar</button> -->
        </section>
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
  <link rel="stylesheet" href="assets/css/normalize.css">

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>

    document.title = "Subir puesto";

    $("#btnGuardarPuesto").click(function(){
      //todo lo minimo
      let positionName=$("#puestoNombre").val();      
      let positionId=$("#puestoId").val();      
      let sectionId=$("#departamentoId").val();
      let levelId=$("#nivelId").val();      

      let url='altas/subir_puesto.php';

      let datos={
        positionId,
        positionName,
        sectionId,
        levelId
      }

      if(positionName!=""&&sectionId!=""&&levelId!=""){

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }  

        if(positionId!='0'){
          url='cambios/actualizar_puesto.php';
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

    $(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var input = $(this).val().toLowerCase();
        $('#TareaSelect option').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
        });
      });
    });

    $(document).on('click', '.addtaskbtn', function(){

      let puesto = $('#idpuesto').val();
      let tarea = $('#TareaSelect').val();

      if(tarea == ""){
        mostrarError($("#TareaSelect"), 'seleccione una funcion', 'error_Task');
        $("#error_Task").attr("hidden", false);
      }else{        

        $("#error_Task").attr("hidden", true);
        console.log(puesto);
        console.log(tarea);
  
        let fd = new FormData();
  
        fd.append('puesto', puesto);
        fd.append('tarea', tarea);
  
        fetch('altas/subir_tareas_por_empleado.php',{
          method: 'POST',
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(datos => {
          if(datos.ok){
            recargar_tabla_funciones(puesto)
          }else{
            alert('la tarea ya existe')
          }
        })
      }

    })

    $("#modalFuncionesClose").click(function(){
        $('#modalFunciones').modal('hide');
      });

    $(document).on('click', '.btn-eliminar_funcion', function(){

      Swal.fire({
        title: "Esta seguro/a?",
        text: "Se removera la funcion del usuario",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "si, remover!"
      }).then((result) => {
        if (result.isConfirmed) {

          let id = $(this).parent().parent().attr('data-id');
          let puestoid = $('#idpuesto').val();
    
          let fd = new FormData();
          console.log(id)
          console.log(puestoid)
    
          fd.append('id', id);      
          fd.append('puestoid', puestoid)      
    
          fetch('bajas/eliminar_tarea_por_empleado', {
            method: 'POST',
            body: fd
          })
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            console.log(data);
            recargar_tabla_funciones(puestoid)
          })
          Swal.fire({
            title: "Eliminado",
            text: "La funcion ha sido removida.",
            icon: "success"
          });
          recargar_tabla_funciones(puestoid)
        }
      });
    })

    $(document).on('click', '.btn-editar', function(){ 
      // Your Code
      let id = $(this).parent().parent().attr('data-id');
      let level = $(this).parent().parent().attr('data-level');      
      let oldName = $(this).parent().parent().attr('data-name');      

      let puestoNombre=$("#puestoNombre");

      let lblEd=$("#lblEd");
      
      $("#nivelId").val(level);      
      $("#puestoId").val(id);


      $("#rowEdicion").show();
      lblEd.text(oldName);     
      puestoNombre.val(oldName);  

      console.log({
        id,
        level,
        puestoNombre,
        lblEd
      });    
    });

    $("#areaId").on('change', function(){
      let areaId = $(this).val() != "" ? $(this).val() : "0";
      limpiar();
      recargar_tabla(0);
      recargar_select(areaId);
      //recargar_tabla(areaId);
    });

    $("#departamentoId").on('change', function(){
      let sectionId = $(this).val() != "" ? $(this).val() : "0";
      limpiar();
      //recargar_select(areaId);
      recargar_tabla(sectionId);
    });    

    $(document).on('click', '.btn-eliminar', function(){ 
      let id = $(this).parent().parent().attr('data-id');
      $("#puestoEliminarId").val(id);
      $("#modalEliminar1").modal('show');
      //alert(id);
    });

    $(document).on('click', '.btn-funciones', function(){
      let id = $(this).parent().parent().attr('data-id');
      $('#idpuesto').val(id)
      $('#modalFunciones').modal('show');
      recargar_tabla_funciones(id)
    });

    $("#limpiar").click(function(){
      limpiar();
    });

    $("#btnModalEliminar").click(function(){
      let positionId=$("#puestoEliminarId").val();
      if(positionId!="0"){
        let datos = {
          positionId
        }
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('bajas/eliminar_puesto.php', {
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

    const recargar_tabla = (parentId) => {
      $.ajax({
        url: "layout/celdas_tablas/position_table.php",
        type: "POST",
        data: { parentId }   
      }).done(function(response){
        $(".tabla-position").empty();
        $(".tabla-position").append(response);
      });
    }

    const recargar_tabla_funciones = (parentId) => {

      $.ajax({
        url: "layout/celdas_tablas/position_table_funciones.php",
        type: "POST",
        data: { parentId }   
      }).done(function(response){
        $(".tabla-functions").empty();
        $(".tabla-functions").append(response);
      });
    }

    const limpiar = () => {
      let puestoName=$("#puestoNombre");   
      
      $("#puestoId").val(0);
      $("#nivelId").val('');      
      
      puestoName.val(''); 
      $("#rowEdicion").hide();
    }

    const recargar_select = (parentId) => {
      $.ajax({
        url: "layout/select_options/section.php",
        type: "POST",
        data: { parentId }
      }).done(function (response) {
        $("#departamentoId").empty();
        $("#departamentoId").append('<option value="">- Seleccione -</option>');
        $("#departamentoId").append(response);
        console.log(response);
      });
    } 

    const mostrarError = (vali, msg, errorEl, isText=false, inf=0, sup=0) => {
    let valor=vali.val();
    if (valor == '') {
      $('#' + errorEl).text(msg);
      vali.css('border-color', '#cc0000');
      //CuentaMayor = '';
    } else {
      msg = '';
      $('#' + errorEl).text(msg);
      vali.css('border-color', '');
      if(isText && (valor.length<inf||valor.length>sup)){
        $('#' + errorEl).text('Cantidad de carácteres inválida');
        vali.css('border-color', '#cc0000');        
      }
    }
  }

  </script>
