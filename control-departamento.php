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
    <h1>SUBIR DEPARTAMENTO</h1>
    <hr>    
  </div><!-- End Page Title -->


    <div class="container mt-4">


      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Departamentos</a>
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
          <input type="hidden" value="0" id="departamentoId">
          <div class="col form-group">
            <input type="text" id="departamentoNombre" name="departamentoNombre" class="form-control">
            Nombre
          </div>
          <div class="col">
            <button class="btn btn-success form-control" id="btnGuardarDepartamento">Guardar</button>
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

        <div class="table-responsive tabla-section">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Eliminar</th>
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
      <input type="hidden" value="0" id="departamentoEliminarId">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar el departamento seleccionada?</p>
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
  <link rel="stylesheet" href="assets/css/normalize.css">

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>

    document.title = "Subir departamento";

    $("#btnGuardarDepartamento").click(function(){
      //todo lo minimo
      let sectionName=$("#departamentoNombre").val();      
      let sectionId=$("#departamentoId").val();      
      let areaId=$("#areaId").val();

      let url='altas/subir_departamento.php';

      let datos={
        sectionId,
        sectionName,
        areaId
      }

      if(sectionName!=""&&areaId!=""){

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }

        if(sectionId!='0'){
          url='cambios/actualizar_departamento.php';
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

    /*
    $(".btn-editar").click(function(){
      let id = $(this).parent().parent().attr('data-id');
      let oldName = $(this).parent().parent().attr('data-name');      
      
      let departamentoNombre=$("#departamentoNombre");
      
      let lblEd=$("#lblEd");
      
      $("#departamentoId").val(id);
      
      $("#rowEdicion").show();
      lblEd.text(oldName);     
      departamentoNombre.val(oldName);  
      
      console.log({
        id,
        departamentoNombre,
        lblEd
      });
    });
    */

    $(document).on('click', '.btn-editar', function(){ 
      // Your Code
      let id = $(this).parent().parent().attr('data-id');
      let oldName = $(this).parent().parent().attr('data-name');      

      let departamentoNombre=$("#departamentoNombre");

      let lblEd=$("#lblEd");
                                 
      $("#departamentoId").val(id);

      $("#rowEdicion").show();
      lblEd.text(oldName);     
      departamentoNombre.val(oldName);  

      console.log({
        id,
        departamentoNombre,
        lblEd
      });    
    });

    $("#areaId").on('change', function(){
      let areaId = $(this).val() != "" ? $(this).val() : "0";
      limpiar();
      recargar_tabla(areaId);
    });

    $(document).on('click', '.btn-eliminar', function(){ 
      let id = $(this).parent().parent().attr('data-id');
      $("#departamentoEliminarId").val(id);
      $("#modalEliminar1").modal('show');
      //alert(id);
    });

    $("#limpiar").click(function(){
      limpiar();
    });

    $("#btnModalEliminar").click(function(){
      let sectionId=$("#departamentoEliminarId").val();
      if(sectionId!="0"){
        let datos = {
          sectionId
        }
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('bajas/eliminar_departamento.php', {
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
        url: "layout/celdas_tablas/section_table.php",
        type: "POST",
        data: { parentId }   
      }).done(function(response){
        $(".tabla-section").empty();
        $(".tabla-section").append(response);
      });
    }

    const limpiar = () => {
      let departamentoName=$("#departamentoNombre");   
      
      $("#departamentoId").val(0);
      
      departamentoName.val(''); 
      $("#rowEdicion").hide();
    }

  </script>