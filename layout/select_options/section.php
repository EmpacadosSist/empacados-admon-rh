<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $areaId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $sections=Consultas::listSections($conn, $areaId);
  
  for ($i=0; $i < count($sections); $i++) { 
  ?>
    <option value="<?=$sections[$i]['departamentoId']?>"><?=$sections[$i]['nombreDepartamento']?></option>
                      <?php 
                      }
                      ?>