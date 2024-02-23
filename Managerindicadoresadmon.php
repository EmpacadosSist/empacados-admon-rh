<?php require 'layout/libreriasdatatable.php';?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>
<?php $indicadores=Consultas::listIndicatorVPM($conn); ?>
<?php $formatos = Consultas::listValueTypes($conn); ?>
<?php $reglas = Consultas::listBonusRules($conn); ?>

<style>
  /* Estilos para reducir el tamaño de la tabla */


  /* Estilos adicionales para hacer la tabla más compacta */
  .table-rule {
    font-size: 12px;
  }

  .table-rule th,
  .table-rule td {
    text-align: center;
  }
</style>

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

<div class="container mt-4 contenedor-form" style="display: none;">
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
            <table class="table table-rule">
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
                for ($i=0; $i < count($reglas); $i++) { ?>
                  <tr data-id="<?=$reglas[$i]['id']?>">
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
                }
                ?>                              
              </tbody>
            </table>
          </div>

          <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
              <button class="btn btn-primary form-control" id="btnActualizarIndicador">Actualizar</button>
            </div>
            <div class="col-3"></div>
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
              <th>Nombres</th>
              <th>Reglas Bonos GyD</th>
              <th>Reglas Bonos SyL</th>
              <th>Comentarios</th>
              <th></th>
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
                    <td>                    
                      <button type="button" class="btn btn-primary editar-ind" data-bs-toggle="modal" >
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger eliminar-ind" data-bs-toggle="modal" >
                        <i class="bi bi-trash-fill"></i>
                      </button>
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
    $(document).ready(function(){
      //alert("si");
    });

    $(".editar-ind").click(function(){
      $(".contenedor-form").show();
    })

    $("#btnActualizarIndicador").click(function(){
      $(".contenedor-form").hide();
    })
  </script>