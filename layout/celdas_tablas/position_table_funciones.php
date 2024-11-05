<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');?>

<?php
  //consulta para ver un solo usuario con el id  
  $sectionId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $tasks=Consultas::listFunctions($conn, $sectionId);

?>

<table class="table table-bordered" style="flex-direction:column;">
            <thead>
              <tr>
                <th>Funciones</th>
                <th>Eliminar funcion</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < count($tasks); $i++) { ?>
                  <tr data-id="<?=$tasks[$i]['id_task']?>" data-name="<?=$tasks[$i]['name_task']?>">
                    <td>
                      <?=$tasks[$i]['name_task']?>
                    </td>
                    <td><button class="btn btn-danger btn-eliminar_funcion"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                                       
                  </tr>
                <?php 
                }
                ?>
            </tbody>
          </table>
