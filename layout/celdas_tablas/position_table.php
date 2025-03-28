<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $sectionId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $positions=Consultas::listPositions($conn, $sectionId);

  ?>

<table class="table table-bordered">
            <thead>
              <tr>
                <th>Puestos</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Accountability</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < count($positions); $i++) { ?>
                  <tr data-id="<?=$positions[$i]['puestoId']?>" data-name="<?=$positions[$i]['nombrePuesto']?>" data-sup="<?=$positions[$i]['Nombre']?>" data-level="<?=$positions[$i]['nivelId']?>">
                    <td>
                      <?=$positions[$i]['nombrePuesto']?>
                    </td>
                    <td><button class="btn btn-primary btn-editar"><i class="bi bi-pencil-square ms-auto"></i></button> </td>
                    <td><button class="btn btn-danger btn-eliminar"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                    
                    <td><button class="btn btn-primary btn-funciones"><i class="bi bi-list-check ms-auto"></i></button> </td>                    
                  </tr>
                <?php 
                }
                ?>

            </tbody>
          </table>