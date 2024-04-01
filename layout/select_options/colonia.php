<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $municipioId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $colonias=Consultas::listColonias($conn, $municipioId);
  
  for ($i=0; $i < count($colonias); $i++) { 
  ?>
    <option value="<?=$colonias[$i]['coloniaId']?>" data-cp="<?=$colonias[$i]['codigoPostal']?>"><?=$colonias[$i]['nombreColonia']?></option>
                      <?php 
                      }
                      ?>