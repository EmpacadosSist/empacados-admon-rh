<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $estadoId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $municipios=Consultas::listMunicipios($conn, $estadoId);
  
  for ($i=0; $i < count($municipios); $i++) { 
  ?>
    <option value="<?=$municipios[$i]['municipioId']?>"><?=$municipios[$i]['nombreMunicipio']?></option>
                      <?php 
                      }
                      ?>