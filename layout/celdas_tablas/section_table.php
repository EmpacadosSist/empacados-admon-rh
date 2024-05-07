<?php require_once('../../helpers/consultas.php'); ?>
<?php require_once('../../helpers/utils.php'); ?>
<?php require_once('../../conexion/conexion.php');

  //consulta para ver un solo usuario con el id  
  $areaId=isset($_POST['parentId']) ? $_POST['parentId'] : false;

  $sections=Consultas::listSections($conn, $areaId);

  ?>

<table class="table table-bordered">
            <thead>
              <tr>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < count($sections); $i++) { ?>
                  <tr data-id="<?=$sections[$i]['departamentoId']?>" data-name="<?=$sections[$i]['nombreDepartamento']?>">
                    <td>
                      <?=$sections[$i]['nombreDepartamento']?>
                    </td>
                    <td><button class="btn btn-primary btn-editar"><i class="bi bi-pencil-square ms-auto"></i></button> </td>
                    <td><button class="btn btn-danger btn-eliminar"><i class="bi bi-trash-fill ms-auto"></i></button> </td>                    
                  </tr>
                <?php 
                }
                ?>

            </tbody>
          </table>