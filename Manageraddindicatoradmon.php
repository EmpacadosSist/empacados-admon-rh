<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Agregar indicador</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<style>
  /* Estilos para reducir el tamaño de la tabla */
  .table-sm th,
  .table-sm td {
    padding: 0.4rem;
  }

  .table-responsive {
    max-width: 100%;
    overflow-x: auto;
    margin-bottom: 15px;
  }

  /* Estilos adicionales para hacer la tabla más compacta */
  .table {
    font-size: 12px;
  }

  .table th,
  .table td {
    text-align: center;
  }
</style>

<?php $formatos = Consultas::listValueTypes($conn); ?>
<?php $reglas = Consultas::listBonusRules($conn); ?>

<body>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>AGREGAR INDICADOR</h1>
    <hr>
  </div><!-- End Page Title -->


    <div class="container mt-4">
      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Indicadores</a>
        </li>

        <!-- Agrega más pestañas según sea necesario -->
      </ul>

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->

        

        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
          <div class="row mt-3">
            <div class="col">
              <label for="indicatorName">Nombre de indicador:</label>
              <input class="form-control" type="text" id="indicatorName" name="indicatorName" maxlength="100">
              <span id="error_indicatorName" class="text-danger"></span>
            </div>
            <div class="col">
              <label for="valueTypeId">Formato:</label>
              <select id="valueTypeId" name="valueTypeId" class="form-select" required>
                <?php 
                for ($i=0; $i < count($formatos); $i++) { ?>
                  <option value="<?=$formatos[$i]['id']?>"><?=$formatos[$i]['nombreFormato']?></option>
                <?php 
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="realValue">Real:</label>
              <input class="form-control" type="number" id="realValue" name="realValue">
              <span id="error_realValue" class="text-danger"></span>
            </div>
            <div class="col">
              <label for="targetValue">Objetivo:</label>
              <input class="form-control" type="number" id="targetValue" name="targetValue">
              <span id="error_targetValue" class="text-danger"></span>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-6"> 
              
              <select class="form-select" name="calcType" id="calcType">
                <option value="0">Cálculo de porcentaje de completado</option>
                <option value="1">Cálculo de objetivo</option>
                <option value="2">Cálculo de diferencia</option>
              </select>              
              <!--
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="checkCalcType">
                <label class="form-check-label" for="checkCalcType">
                  Activar cálculo alternativo de reglas de bono
                </label>
              </div>
              -->
              
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkAllYear">
                <label class="form-check-label" for="checkAllYear">
                  Establecer objetivo para todo el año
                </label>
              </div>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col">
              <label for="comments">Comentarios (Opcional):</label>
              <textarea id="comments" name="comments" class="form-control" maxlength="255" required></textarea>
            </div>
          </div>

          <div class="row mt-3">
            <table class="table">
              <thead>
                <tr>
                  <th>Regla bono</th>
                  <th>Agregar</th>
                  <th>GyD</th>
                  <th>SyL</th>                                    
                </tr>
              </thead>
              <tbody>
              <?php 
                for ($i=0; $i < count($reglas); $i++) { 
                  if($reglas[$i]['tipoCalculo']=='0'):
              ?>
                  <tr data-id="<?=$reglas[$i]['id']?>" class="type_0">
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
                    <td><input type="checkbox" class="agregar"></td>
                    <td><input type="checkbox" class="gyd" disabled></td>
                    <td><input type="checkbox" class="syl" disabled></td>                    
                  </tr>
              <?php 
                elseif($reglas[$i]['tipoCalculo']=='1'):
              ?>
                  <tr data-id="<?=$reglas[$i]['id']?>" class="type_1" style="display: none;">
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
                    <td><input type="checkbox" class="agregar"></td>
                    <td><input type="checkbox" class="gyd" disabled></td>
                    <td><input type="checkbox" class="syl" disabled></td>                    
                  </tr>              
              <?php 
                else:
                  ?>
                      <tr data-id="<?=$reglas[$i]['id']?>" class="type_2" style="display: none;">
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
                        <td><input type="checkbox" class="agregar"></td>
                        <td><input type="checkbox" class="gyd" disabled></td>
                        <td><input type="checkbox" class="syl" disabled></td>                    
                      </tr>              
                  <?php 
                      endif;
                }
              ?>
              </tbody>
            </table>
          </div>

          <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
              <button class="btn btn-primary form-control" id="btnGuardarIndicador">Guardar</button>
            </div>
            <div class="col-3"></div>
          </div>
        </div>

        <!-- Agrega más contenidos de pestañas según sea necesario -->

      </div>
    </div>

  </div>
  </main>
  <?php require 'layout/footer.php';?>
  </body>

  </html>


  <!-- Vendor JS Files -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    let arrRules=[];
    $("#btnGuardarIndicador").click(function(){
      
      mostrarError($("#indicatorName"),'Nombre de indicador obligatorio','error_indicatorName');
      mostrarError($("#realValue"),'Valor real obligatorio','error_realValue');
      mostrarError($("#targetValue"),'Valor objetivo obligatorio','error_targetValue');            
      
      let valueTypeId=$("#valueTypeId").val();
      let indicatorName=$("#indicatorName").val();
      let realValue=$("#realValue").val();
      let targetValue=$("#targetValue").val();
      let comments = $("#comments").val();
      let allYear=$("#checkAllYear").is(':checked');
      //let calculationType=$("#checkCalcType").is(':checked'); 
      let calculationType = $("#calcType").val();     
      $( ".loader" ).show(); 
      if(indicatorName != "" && realValue != "" && targetValue != ""){
        //aqui va el codigo para agregar a la bd la informacion despues de validar
        subir_indicador({
        //console.log({
          valueTypeId,
          indicatorName,
          realValue,
          targetValue,
          calculationType,
          comments
        }, allYear);
      }
    });

    $("#valueTypeId").on('change', function(){
      let op=$("#valueTypeId").val();
      switch(op){
        case "1":
          resetFormat("",true);                    
        break;
        case "2":
          resetFormat("%");        
        break;
        case "3":
          resetFormat("$");
        break;
      }
    });

    $(".agregar").on('change', function(){
      let ruleId = $(this).parent().parent().attr('data-id');
      let agregado=$(this).is(':checked');
      let gyd=$(this).parent().parent().find('.gyd');
      let syl=$(this).parent().parent().find('.syl');      
      if(agregado){
        gyd.prop('disabled', false);
        syl.prop('disabled', false);        
      }else{
        gyd.prop('disabled', true);
        syl.prop('disabled', true);      
        gyd.prop('checked', false);
        syl.prop('checked', false);  
        arrRules = arrRules.filter(function (el) { return (el.rule != ruleId); });
      }
    });

    $(".gyd").on('change', function(){
      arrayRules($(this), 'gyd');
    });

    $(".syl").on('change', function(){
      arrayRules($(this), 'syl');
    });


    $("#calcType").on('change', function(){
      //arrayRules($(this), 'syl');
      //console.log($(this).is(':checked'));
      let agregado=$(".agregar");
      let gyd= $(".gyd");
      let syl= $(".syl");
      agregado.prop('checked', false);
      gyd.prop('checked', false);
      syl.prop('checked', false);
      
      gyd.prop('disabled', true);
      syl.prop('disabled', true);
      
      let type = $(this).val();
      switch (type) {
        case '0':
          $(".type_0").show();
          $(".type_1").hide();
          $(".type_2").hide();
        break;
        case '1':
          $(".type_0").hide();
          $(".type_1").show();
          $(".type_2").hide();
        break;
        case '2':
          $(".type_0").hide();
          $(".type_1").hide();
          $(".type_2").show();        
        break;                        
        default:
          return false;
        break;
      }
    });
  
  /*
    $("#checkCalcType").on('change', function(){
      //arrayRules($(this), 'syl');
      //console.log($(this).is(':checked'));
      let agregado=$(".agregar");
      let gyd= $(".gyd");
      let syl= $(".syl");
      agregado.prop('checked', false);
      gyd.prop('checked', false);
      syl.prop('checked', false);
      
      gyd.prop('disabled', true);
      syl.prop('disabled', true);
      if($(this).is(':checked')){
        $(".type_0").hide();
        $(".type_1").show();
      }else{
        $(".type_0").show();
        $(".type_1").hide();
      }
    });    
  */



    const arrayRules = (_this, type) => {
      let ruleId = _this.parent().parent().attr('data-id');
      let checked=_this.is(':checked');

      if(checked){
        arrRules.push({rule: ruleId, type: type});      

      }else{
        arrRules = arrRules.filter(function (el) { return !(el.rule == ruleId && el.type == type); });
      }        
    }

    const resetFormat = (simb, el=false) => {
      $('#realValue').val("");
      $('#targetValue').val("");         
      if(!el){
        $("#realValue").attr("placeholder", simb);
        $("#targetValue").attr("placeholder", simb);      
      }else{
        $('#realValue').removeAttr('placeholder');
        $('#targetValue').removeAttr('placeholder');
      } 
    }

    const mostrarError = (vali, msg, errorEl) => {
      if(vali.val() == ''){
        $('#'+errorEl).text(msg);
        vali.css('border-color', '#cc0000');
        //CuentaMayor = '';
      }else{
        msg = '';
        $('#'+errorEl).text(msg);
        vali.css('border-color', '');        
      }   
    }
    
    const subir_indicador = (datos, subirIndicador) => {
       
      let fd = new FormData();

      for(var key in datos){
        fd.append(key, datos[key]);
      }
      let subirIndStr='subir_indicador_x_mes';
      if(subirIndicador){
        subirIndStr='subir_indicador_x_anio';
      }

      fetch('altas/'+subirIndStr+'.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data.indId);
        //asignar_regla(data.indId, );
        if(arrRules.length>0){
          for(let key in arrRules){
            //console.log(arrRules[key].rule);
            asignar_regla(data.indId, arrRules[key].rule, arrRules[key].type);
          }
        }
        
      })
      .then(data => {
        location.reload();
        console.log(data);
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })

    }

    const asignar_regla = (indicadorId, bonusRuleId, type) => {
      let fd = new FormData();

      fd.append('indicatorId', indicadorId);
      fd.append('bonusRuleId', bonusRuleId);
      fd.append('type', type);

      fetch('altas/subir_regla_bono_indicador.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })
    }
  </script>
