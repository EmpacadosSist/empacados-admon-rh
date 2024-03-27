<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $sectionId=isset($_POST['sectionId']) ? $_POST['sectionId'] : false;

  $positions=Consultas::listPositions($conn, $sectionId);
  
  for ($i=0; $i < count($positions); $i++) { 
  ?>
    <option value="<?=$positions[$i]['puestoId']?>"><?=$positions[$i]['nombrePuesto']?></option>
                      <?php 
                      }
                      ?>