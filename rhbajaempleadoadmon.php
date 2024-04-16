<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  Utils::redirectSinPermiso(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baja de Empleados Empacados</title>
</head>  <!-- Incluir Bootstrap CSS -->
<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<style type="text/css">
  .h4, h4 {
    font-size: 2rem;
}
 .container {
    width: 100%;
    padding-right: 13px;
    padding-left: 25px;
    margin-right: 28px;
    margin-left: -2px;
}
.mt-5, .my-5 {
    margin-top: 0rem!important;
}

.card-title {
    padding: -3px 0 19px 0;
    font-size: 34px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
        padding: -4px 0 15px 0;
}
   .title-container img {
            margin: 0 10px; /* Margen entre las imágenes y el texto */
            vertical-align: middle; /* Alineación vertical con el texto */
        }
  .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        /* background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
</style>

  <main id="main" class="main">
    <section class="section"> 
      <div class="row">
        <div class="col-lg-12">
          <div class="card">   
            <div class="card-body">
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Datos de Empleado
                <img style="text-align: center;" src="assets/img/ecluir.gif" width="50" alt="">
              </h2>
              <div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="employeeNumber"><i class="fas fa-id-card"></i> No. de empleado</label>
                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" inputmode="numeric" pattern="[0-9]+" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="lastName"><i class="fas fa-user"></i> Apellido Paterno</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="secondName"><i class="fas fa-user"></i> Apellido Materno</label>
                    <input type="text" class="form-control" id="secondName" name="secondName" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="name"><i class="fas fa-user"></i> Nombre(s)</label>
                    <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="age"><i class="fas fa-birthday-cake"></i> Edad</label>
                    <input type="text" class="form-control" id="age" name="age" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="datebirthday"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
                    <input type="text" class="form-control" id="datebirthday" name="datebirthday" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="placebirth"><i class="fas fa-map-marker-alt"></i> Lugar de nacimiento</label>
                    <input type="text" class="form-control" id="placebirth" name="placebirth" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="sex"><i class="fas fa-venus-mars"></i> Sexo</label>
                    <input type="text" class="form-control" id="sex" name="sex" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <!-- Agrega más campos según sea necesario -->
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="dateadmission"><i class="fas fa-calendar-alt"></i> Fecha de Ingreso</label>
                    <input type="text" class="form-control" id="dateadmission" name="dateadmission" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="work_area"><i class="fas fa-building"></i> Área</label>
                    <select class="form-control" id="work_area" name="work_area">
                      <option value="Operaciones" id="Operaciones">Operaciones</option>
                      <option value="Admón">Administración</option>
                      <option value="Comercial">Comercial</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="department"><i class="fas fa-building"></i> Departamento</label>
                    <select class="form-control" id="department" name="department">
                      <option value="Admon">Administración</option>
                    </select>        
                  </div>
                  <div class="form-group col-md-5">
                    <label for="position"><i class="fas fa-user-tie"></i> Puesto</label>
                    <select class="form-control" id="position" name="position">
                      <option value="analista_capacitacion">Analista de Capacitación</option>         
                    </select>    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Costs"><i class="fas fa-dollar-sign"></i> Centro de Costos</label>
                    <select class="form-control" id="Costs" name="Costs" on>
                      <option value="ONLINE">ON LINE</option>              
                    </select>
                  </div>
                  <!-- Agrega más campos según sea necesario -->
                </div>      
                
                <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">          
                  Información de Baja Personal
                  <img src="assets/img/cancelar.gif" alt="" width="60">
                </h2> 

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="datedownpersonal"><i class="fas fa-calendar-alt"></i> Fecha de Baja</label>
                    <input type="date" class="form-control" id="datedownpersonal" name="datedownpersonal" pattern="[A-Za-z]+" title="Solo se permiten caracteres">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="datebirthday"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="datebirthday" name="datebirthday">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="motivo_separacion"><i class="fas fa-sign-out-alt"></i> Motivo de Separación</label>
                    <input type="text" class="form-control" id="motivo_separacion" name="motivo_separacion">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="recontratable"><i class="fas fa-undo-alt"></i> Recontratable</label>
                    <select class="form-control" id="recontratable" name="recontratable">
                      <option value="si">Sí</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="rfc"><i class="fas fa-id-badge"></i> RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cp_rfc"><i class="fas fa-map-marker-alt"></i> C.P. del RFC</label>
                    <input type="text" class="form-control" id="cp_rfc" name="cp_rfc">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sueldo_base"><i class="fas fa-dollar-sign"></i> Sueldo Base</label>
                    <input type="text" class="form-control" id="sueldo_base" name="sueldo_base">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bonos_despensa"><i class="fas fa-gift"></i> Bonos de Despensa</label>
                    <input type="text" class="form-control" id="bonos_despensa" name="bonos_despensa">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fondo_ahorro"><i class="fas fa-piggy-bank"></i> Fondo de Ahorro (quincenal)</label>
                    <input type="text" class="form-control" id="fondo_ahorro" name="fondo_ahorro">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="comentarios"><i class="fas fa-comments"></i> Comentarios</label>
                    <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                  </div>
                  <div><br><br><br><br><br></div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
    </section>

      </div>

     

      <!-- Botón de envío -->
    </form>
  </div>



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>
<?php require 'layout/footer.php';?>
</html>
