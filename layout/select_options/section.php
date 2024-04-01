<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');
  $indicadores=Consultas::listIndicator($conn); 

  //consulta para ver un solo usuario con el id  
  $areaId=isset($_POST['areaId']) ? $_POST['areaId'] : false;

  $sections=Consultas::listSections($conn, $areaId);
  
  for ($i=0; $i < count($sections); $i++) { 
  ?>
    <option value="<?=$sections[$i]['departamentoId']?>"><?=$sections[$i]['nombreDepartamento']?></option>
                      <?php 
                      }
                      ?>