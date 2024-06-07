<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(2);
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
<?php $reglas = Consultas::listBonusRules($conn); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>EMPACADOS INDICADORES</h1>
    <hr>
  </div><!-- End Page Title -->

  <body>

    <div class="container mt-4">


      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Bonos</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <div class="container">
        <!--

          <br>
          <h2>Reglas de bono</h2>
        -->
        <div class="row mt-3">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" name="checkRule1" id="checkRule1">
              <label class="form-check-label" for="checkRule1">
                Todo lo mínimo
              </label>
            </div>

          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" name="checkRule2" id="checkRule2">
              <label class="form-check-label" for="checkRule2">
                Todo lo máximo
              </label>
            </div>

          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" name="checkRule3" id="checkRule3">
              <label class="form-check-label" for="checkRule3">
                Proporcional
              </label>
            </div>

          </div>
          <div class="col"></div>
        </div>
        <div class="row mt-3">
          <input type="hidden" value="0" id="bonusId">
          <div class="col form-group">
            <input type="number" id="minPer" name="minPer" class="form-control">
            Rango mínimo
          </div>
          <div class="col form-group">
            <input type="number" id="maxPer" name="maxPer" class="form-control">
            Rango máximo
          </div>
          <div class="col form-group">
            <input type="number" id="bonusPer" name="bonusPer" class="form-control">
            Bono
          </div>
          <div class="col">
            <button class="btn btn-success form-control" id="btnGuardarRegla">Guardar</button>
          </div>
        </div>

        <div class="row mt-3 mb-3">
          <div class="col-6">              
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="checkCalcType">
              <label class="form-check-label" for="checkCalcType">
                Activar cálculo alternativo de reglas de bono
              </label>
            </div>
          </div>
        </div>        

        <div class="row mt-3 mb-3" id="rowEdicion" style="display: none;">
          <div class="col">
            <b>Editando: <label id="lblR1"></label> <label id="lblR2"></label> <label id="lblR3"></label></b> <a class="btn btn-secondary btn-sm" href="#" id="limpiar">Limpiar</a>
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
                <th>Regla bono</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < count($reglas); $i++) { 
                  if($reglas[$i]['tipoCalculo']=='0'):
                  ?>
                  <tr data-calculo="<?=$reglas[$i]['tipoCalculo']?>" data-id="<?=$reglas[$i]['id']?>" data-min="<?=$reglas[$i]['minimo']?>" data-max="<?=$reglas[$i]['maximo']?>" data-bonus="<?=$reglas[$i]['bonus']?>"  class="type_0">
                    <td>
                      <?php
                        $mid="-";
                        if($reglas[$i]['minimo']=='T'||$reglas[$i]['maximo']=='T'){
                          $mid="";
                        } 
                        if($reglas[$i]['minimo']=='T'){
                          echo "Menor o igual a";
                        }else{
                          echo $reglas[$i]['minimo']."% ";
                        }
                        echo $mid;
                        if($reglas[$i]['maximo']=='T'){
                          echo "o más";
                        }else{
                          echo " ".$reglas[$i]['maximo']."%";
                        }
                        echo " = ";
                        if($reglas[$i]['bonus']=='T'){
                          echo "Proporcional";
                        }else{
                          echo $reglas[$i]['bonus']."%";
                        }
                      ?>
                    </td>
                    <td><button class="btn btn-primary btn-editar"><i class="bi bi-pencil-square ms-auto"></i></button> </td>
                    <td><button class="btn btn-danger btn-eliminar"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                    
                  </tr>
              
              <?php 
                else:
              ?>
                  <tr data-calculo="<?=$reglas[$i]['tipoCalculo']?>" data-id="<?=$reglas[$i]['id']?>" data-min="<?=$reglas[$i]['minimo']?>" data-max="<?=$reglas[$i]['maximo']?>" data-bonus="<?=$reglas[$i]['bonus']?>" class="type_1" style="display: none;">
                    <td>
                      <?php
                        $mid="a";
                        if($reglas[$i]['minimo']=='T'||$reglas[$i]['maximo']=='T'){
                          $mid="";
                        } 
                        if($reglas[$i]['minimo']=='T'){
                          echo "Menor o igual a";
                        }else{
                          echo $reglas[$i]['minimo']." ";
                        }
                        echo $mid;
                        if($reglas[$i]['maximo']=='T'){
                          echo "o más";
                        }else{
                          echo " ".$reglas[$i]['maximo'];
                        }
                        echo " = ";
                        if($reglas[$i]['bonus']=='T'){
                          echo "Proporcional";
                        }else{
                          echo $reglas[$i]['bonus']."%";
                        }
                      ?>
                    </td>
                    <td><button class="btn btn-primary btn-editar"><i class="bi bi-pencil-square ms-auto"></i></button> </td>
                    <td><button class="btn btn-danger btn-eliminar"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                    
                  </tr>

                <?php
                  endif;
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
      <input type="hidden" value="0" id="bonusEliminarId">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Regla</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar la regla seleccionada?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="btnModalEliminar">Eliminar</button>
          </div>
        </div>
      </div>
    </div>


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
    document.title = "Agregar reglas de bono";

    $("#btnGuardarRegla").click(function(){
      //todo lo minimo
      let checkRule1=$("#checkRule1").is(':checked');
      //todo lo maximo
      let checkRule2=$("#checkRule2").is(':checked');
      //proporcional
      let checkRule3=$("#checkRule3").is(':checked');        

      //valor del rango minimo
      let minPer=checkRule1 ? 'T' : $("#minPer").val();
      //valor del rango maximo
      let maxPer=checkRule2 ? 'T' : $("#maxPer").val();
      //valor del porcentaje del bono      
      let bonusPer=checkRule3 ? 'T' : $("#bonusPer").val();      
      
      let bonusId=$("#bonusId").val();

      let calculationType=$("#checkCalcType").is(':checked');    

      let url='altas/subir_regla_bono.php';

      let datos={
        bonusId,
        minPer,
        maxPer,
        bonusPer,
        calculationType
      }

      if(minPer!=""&&maxPer!=""&&bonusPer!=""){

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }

        if(bonusId!='0'){
          url='cambios/actualizar_regla_bono.php';
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
      let min = $(this).parent().parent().attr('data-min');
      let max = $(this).parent().parent().attr('data-max');
      let bonus = $(this).parent().parent().attr('data-bonus');
      let calculo = $(this).parent().parent().attr('data-calculo');      
      
      let minPer=$("#minPer");
      let maxPer=$("#maxPer");
      let bonusPer=$("#bonusPer");
      let checkRule1=$("#checkRule1");
      let checkRule2=$("#checkRule2");
      let checkRule3=$("#checkRule3");
      let lblR1=$("#lblR1");
      let lblR2=$("#lblR2");
      let lblR3=$("#lblR3");                                    
      
      minPer.val('');
      maxPer.val('');
      bonusPer.val('');
      $("#bonusId").val(id);

      $("#rowEdicion").show();

      $("#checkCalcType").prop('disabled', true);
      //checkRule1
      //checkRule2
      //checkRule3

      if(min!="T"){
        minPer.val(min);
        minPer.prop('disabled', false);
        checkRule1.prop('checked', false);

        if(calculo=='0'){
          lblR1.text(min+' %');

        }else{
          lblR1.text(min+' ');          
        }
      }else{
        minPer.prop('disabled', true); 
        checkRule1.prop('checked', true);
        lblR1.text('Menor o igual ');   
      }
      if(max!="T"){
        maxPer.val(max); 
        maxPer.prop('disabled', false);
        checkRule2.prop('checked', false);

          
        if(calculo=='0'){
          lblR2.text('a '+max+' %');

        }else{
          lblR2.text('a '+max+' ');          
        }             
      }else{
        maxPer.prop('disabled', true);   
        checkRule2.prop('checked', true);
        lblR2.text(' o más');     
      }
      if(bonus!="T"){
        bonusPer.val(bonus);  
        bonusPer.prop('disabled', false);
        checkRule3.prop('checked', false);
        lblR3.text('= '+bonus+' %');      
      }else{
        bonusPer.prop('disabled', true); 
        checkRule3.prop('checked', true);
        lblR3.text('= Proporcional');       
      }            

      console.log({
        id,
        min,
        max,
        bonus
      });
    });

    $(".btn-eliminar").click(function(){
      let id = $(this).parent().parent().attr('data-id');
      $("#bonusEliminarId").val(id);
      $("#modalEliminar1").modal('show');
      //alert(id);
    });

    $("#limpiar").click(function(){
      let minPer=$("#minPer");
      let maxPer=$("#maxPer");
      let bonusPer=$("#bonusPer");
      let checkRule1=$("#checkRule1");
      let checkRule2=$("#checkRule2");
      let checkRule3=$("#checkRule3");     
      
      $("#bonusId").val(0);
      $("#checkCalcType").prop('disabled', false);
      //$("#checkCalcType").val('checked', false);

      minPer.val('');
      minPer.prop('disabled', false);
      checkRule1.prop('checked', false);
      maxPer.val(''); 
      maxPer.prop('disabled', false);
      checkRule2.prop('checked', false);
      bonusPer.val('');  
      bonusPer.prop('disabled', false);
      checkRule3.prop('checked', false);      
      $("#rowEdicion").hide();
    });

    $("#btnModalEliminar").click(function(){
      let bonusId=$("#bonusEliminarId").val();
      if(bonusId!="0"){
        let datos = {
          bonusId
        }
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('bajas/eliminar_regla_bono.php', {
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

    $("#checkCalcType").on('change', function(){

      if($(this).is(':checked')){
        $(".type_0").hide();
        $(".type_1").show();
      }else{
        $(".type_0").show();
        $(".type_1").hide();
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