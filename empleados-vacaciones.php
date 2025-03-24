<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control de vacaciones</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- DataTables Bootstrap 4 JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
  <link rel="stylesheet" href="assets/css/normalize.css">
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>
<?php $empleadosVacaciones=Consultas::listVacationsUsers($conn); ?>
<?php $solicitudesAprobadas = Consultas::listVacationsPeriodsAll($conn, 'V', 'A');  ?>
<?php $solicitudesAprobadasE = Consultas::listVacationsPeriodsAll($conn, 'E', 'A');  ?>
<?php //parametro 2 de la siguiente funcion es el id del usuario actual 
$userId=$_SESSION['identity']->userId;

$fechaActual=date('Y-m-d');
?>


<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>ADMINISTRACIÓN DE VACACIONES</h1>
      <hr>
    </div><!-- End Page Title -->
    <div class="container mt-4">
      <!-- Pestañas -->
      <ul class="nav nav-tabs" id="pestanas" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab"
            aria-controls="contenido1" aria-selected="true">Información general</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pestaña2" data-toggle="tab" href="#contenido2" role="tab" aria-controls="contenido2"
            aria-selected="false">Asignación de días</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pestaña3" data-toggle="tab" href="#contenido3" role="tab" aria-controls="contenido3"
            aria-selected="false">Vacaciones aprobadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pestaña4" data-toggle="tab" href="#contenido4" role="tab" aria-controls="contenido4"
            aria-selected="false">Empleados ausentes</a>
        </li>
      </ul>

      <!-- Contenido de las pestañas -->
      <div class="tab-content" id="contenidoPestanas">
        <!-- Contenido de la Pestaña 1 -->



        <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">

          <div class="row mt-3">
            <div class="col-3">
              <select id="numEmpFilter" name="numEmpFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
            <div class="col-3">
              <select id="nombreFilter" name="nombreFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
            <div class="col-3">
              <select id="departamentoFilter" name="departamentoFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
            <div class="col-3">
              <select id="areaFilter" name="areaFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>

          </div>
          <div class="row mt-3">
            <div class="col-4">
              <select id="fechaIngresoFilter" name="fechaIngresoFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
            <div class="col-4">
              <select id="diasPendientesFilter" name="diasPendientesFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
            <div class="col-4">
              <select id="diasTomadosFilter" name="diasTomadosFilter[]" multiple="multiple" class="form-control">
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col"></div>
            <div class="col">
              <input class="form-control" type="file" name="archivo" id="archivo" accept=".xls,.xlsx">
            </div>
            <div class="col-1 d-flex justify-content-end">
              <button class="btn btn-success subir-archivo">Subir</button>
            </div>
          </div>
          <br>

          <div class="table-responsive">

            <table class="table table-striped table-bordered" id="myTable" style="font-size:85%;">
              <thead>
                <tr>
                  <th>Número de empleado</th>
                  <th>Nombre</th>
                  <th>Departamento</th>
                  <th>Area</th>
                  <th>Fecha de ingreso</th>
                  <th>Días pendientes</th>
                  <th>Días tomados</th>
                </tr>
              </thead>
              <tbody>
                <?php $current_date = date('Y-m-d'); 
                      $current_date= new DateTime($current_date);
                ?>
                <?php for ($i=0; $i < count($empleadosVacaciones); $i++) { 
                  $dateFormatIngreso = strtotime($empleadosVacaciones[$i]['fechaIngreso']); 
                  $fechaIngreso = date('d/m/Y', $dateFormatIngreso);

                  $proximo_periodo=$empleadosVacaciones[$i]['siguienteAniv'];
                  //$proximo_periodo = $yr.substr($_SESSION['identity']->recDate, 4, 6); 
                  
                  $proximo_periodo = new DateTime($proximo_periodo);
                  $diferencia = $current_date->diff($proximo_periodo);
                  
                  $dif_anio=$diferencia->y;
                  $dif_mes=$diferencia->m;
                  $dif_dias=$diferencia->d;                  
                ?>
                <tr>
                  <td><?=$empleadosVacaciones[$i]['numEmpleado']?></td>
                  <td><?=$empleadosVacaciones[$i]['nombre']?></td>
                  <td><?=$empleadosVacaciones[$i]['departamento']?></td>
                  <td><?=$empleadosVacaciones[$i]['area']?></td>
                  <td><?=$fechaIngreso?></td>
                  <td
                    <?=(($dif_mes==3 && $dif_anio==0 && $dif_dias==0) || ($dif_mes<3)) ? 'style="background-color: #FFF751;"' : '' ?>>
                    <?=$empleadosVacaciones[$i]['diasPendientes']?></td>
                  <td><?=$empleadosVacaciones[$i]['diasTomados']?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>


            <!--pintar a 3 meses como en la ventana de solicitud #FFF751-->

          </div>
        </div>
        <!-- Contenido de la Pestaña 2 -->
        <div class="tab-pane fade" id="contenido2" role="tabpanel" aria-labelledby="pestaña2">
          <div class="container mt-3">
            <div class="row">
              <div class="col-2">
                <label for="fechaInicio">Fecha de inicio:</label>
                <input class="form-control" type="date" id="fechaInicio">
                <span id="error_fechasAnt" class="text-danger"></span>
              </div>
              <div class="col-2">
                <label for="fechaFin">Fecha de fin:</label>
                <input class="form-control" type="date" id="fechaFin">
              </div>
              <div class="col-2">
                <label for="tipoHorario">Tipo de horario:</label>
                <select class="form-select" name="tipoHorario" id="tipoHorario">
                  <option value="A">A</option>
                  <option value="B">B</option>
                </select>
              </div>
              <div class="col-2">
                <label for="numDias">Días:</label>
                <input class="form-control" type="text" value="0" id="txtNumDias" disabled>
                <span id="error_numDias" class="text-danger"></span>
                <input type="hidden" id="numDias" value="0">
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>Medios días:</label>
                  <div>
                    <label class="switch">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="medioDia">
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rdMorningEvening" value="0" id="rdMorning" checked
                    disabled>
                  <label class="form-check-label" for="rdMorning">
                    Mañana
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rdMorningEvening" value="1" id="rdEvening"
                    disabled>
                  <label class="form-check-label" for="rdEvening">
                    Tarde
                  </label>
                </div>
              </div>
            </div>



            <div class="row mt-3">
              <div class="col-12">
                <h4>Seleccionar Empleados</h4>
                <div class="d-flex mb-2">
                  <input type="text" id="search" class="form-control me-2" placeholder="Buscar empleado...">
                  <button id="selectAll" class="btn btn-secondary">Seleccionar Todo</button>
                </div>

                <div class="border p-2" style="max-height: 300px; overflow-y: auto;">
                  <ul class="list-group" id="employeeList">
                    <!-- Lista de empleados generada dinámicamente -->
                    <?php for ($j=0; $j < count($empleadosVacaciones); $j++) { ?>
                    <li class="list-group-item" data-userid="<?=$empleadosVacaciones[$j]['userId']?>">
                      <input class="form-check-input me-2 emp-checkbox" type="checkbox"
                        value="<?=$empleadosVacaciones[$j]['numEmpleado']?>"
                        id="emp<?=$empleadosVacaciones[$j]['numEmpleado']?>">
                      <label class="form-check-label" for="emp<?=$empleadosVacaciones[$j]['numEmpleado']?>">
                        <?=$empleadosVacaciones[$j]['numEmpleado']?> - <?=$empleadosVacaciones[$j]['nombre']?> -
                        <?=$empleadosVacaciones[$j]['area']?> - <?=$empleadosVacaciones[$j]['departamento']?>
                      </label>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-4"></div>
              <div class="col-4">
                <button class="btn btn-success form-control" id="asignar">Asignar</button>
              </div>
              <div class="col-4"></div>
            </div>



          </div>
        </div>
                    <!-- pestaña de vacaciones aprobadas -->
        <div class="tab-pane fade" id="contenido3" role="tabpanel" aria-labelledby="pestaña3" style="font-size:85%;">
          <div class="row mt-3">
            <div class="col" style="text-align:center;"><button class="btn btn-primary" id="edSeleccion">Editar periodos seleccionados</button></div>
            <div class="col" style="text-align:center;"><button class="btn btn-danger" id="cancSeleccion">Cancelar periodos seleccionados</button></div>
            <div class="col"></div>
            <div class="col" style="text-align:center;"><button class="btn btn-secondary" id="btnSeleccionarTodo">Seleccionar todo</button></div>       

          </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable2">
            <thead>
              <tr>
                <th>Seleccionar</th>
                <th>Id de solicitud</th>                
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Periodo</th>
                <th>Número de días</th>  
                <th>Medios días</th>
                <th>Horario de medio día</th>                   
                <th>Tipo de horario</th>   
              </tr>                
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($solicitudesAprobadas); $i++) {  
              if(!check_in_range($solicitudesAprobadas[$i]['fechaInicio'], $solicitudesAprobadas[$i]['fechaFinal'], $fechaActual)){
              ?>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadas[$i]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadas[$i]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>                
              <tr data-vp="<?=$solicitudesAprobadas[$i]['periodoId']?>" data-correo="<?=$solicitudesAprobadas[$i]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesAprobadas[$i]['nombre']?>" data-numemp="<?=$solicitudesAprobadas[$i]['numEmpleado']?>">
                <td>
                  <div class="form-check" style="text-align:center;">
                    <input class="form-check-input" type="checkbox" disabled>
                  </div>
                </td>
                <td><?=$solicitudesAprobadas[$i]['periodoId']?></td>
                <td><?=$solicitudesAprobadas[$i]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadas[$i]['nombre']?></td>
                <td><?=$solicitudesAprobadas[$i]['departamento']?></td>
                <td><?=$requestedDays?></td>
                <td><?= $solicitudesAprobadas[$i]['mediosDias']=='Si' ? number_format($solicitudesAprobadas[$i]['numDias']/2,2) : $solicitudesAprobadas[$i]['numDias']?></td>
                <td><?=$solicitudesAprobadas[$i]['mediosDias']?></td>
                <td><?=$solicitudesAprobadas[$i]['horarioMedioDia']?></td> 
                <td><?=$solicitudesAprobadas[$i]['tipoHorario']?></td>
              </tr>  
              <?php 
                }
              
              } ?>

            <?php for ($j=0; $j < count($solicitudesAprobadasE); $j++) {  
              if(!check_in_range($solicitudesAprobadasE[$j]['fechaInicio'], $solicitudesAprobadasE[$j]['fechaFinal'], $fechaActual)){
              ?>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadasE[$j]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadasE[$j]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                  $requestedDays=$fechaInicio." - ".$fechaFinal; 
                ?>                
              <tr data-vp="<?=$solicitudesAprobadasE[$j]['periodoId']?>" data-correo="<?=$solicitudesAprobadasE[$j]['correo']?>" data-rdias="<?=$requestedDays?>" data-nombre="<?=$solicitudesAprobadasE[$j]['nombre']?>" data-numemp="<?=$solicitudesAprobadasE[$j]['numEmpleado']?>">
                <td>
                  <div class="form-check" style="text-align:center;">
                    <input class="form-check-input border border-dark" type="checkbox" name="vpCheck">
                  </div>
                </td>
                <td><?=$solicitudesAprobadasE[$j]['periodoId']?></td>
                <td><?=$solicitudesAprobadasE[$j]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadasE[$j]['nombre']?></td>
                <td><?=$solicitudesAprobadasE[$j]['departamento']?></td>
                <td><?=$requestedDays?></td>
                <td><?= $solicitudesAprobadasE[$j]['mediosDias']=='Si' ? number_format($solicitudesAprobadasE[$j]['numDias']/2,2) : $solicitudesAprobadasE[$j]['numDias']?></td>
                <td><?=$solicitudesAprobadasE[$j]['mediosDias']?></td>
                <td><?=$solicitudesAprobadasE[$j]['horarioMedioDia']?></td> 
                <td><?=$solicitudesAprobadasE[$j]['tipoHorario']?></td>                              
              </tr>  
              <?php 
                }
              
              } ?>              
              <!--
              <tr>
                <td>105207</td>
                <td>Armin Arlert</td>
                <td>20/05/2024 - 27/05/2024</td>
                <td>5 días</td>
                <td class="text-center"><button class="btn btn-danger"><i class="bi bi-arrow-left-circle-fill"></i></i></button></td>
              </tr>
              -->
                                      
            </tbody>
          </table>
        </div>
        </div>
            <!-- pestaña de empleados ausentes -->
        <div class="tab-pane fade" id="contenido4" role="tabpanel" aria-labelledby="pestaña4" style="font-size:85%;">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="myTable4">
            <thead>
              <tr>
                <th>Id de solicitud</th>
                <th>Número de empleado</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Periodo</th>
                <th>Número de días</th>  
                <th>Medios días</th>
                <th>Horario de medio día</th>                     
                <th>Tipo de horario</th>    
              </tr>                
            </thead>
            <tbody>
              <?php for ($k=0; $k < count($solicitudesAprobadas); $k++) {  
                  if(check_in_range($solicitudesAprobadas[$k]['fechaInicio'], $solicitudesAprobadas[$k]['fechaFinal'], $fechaActual)){
              ?>
              <tr>
                <td><?=$solicitudesAprobadas[$k]['periodoId']?></td>
                <td><?=$solicitudesAprobadas[$k]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadas[$k]['nombre']?></td>
                <td><?=$solicitudesAprobadas[$k]['departamento']?></td>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadas[$k]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadas[$k]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                ?>
                <td><?=$fechaInicio?> - <?=$fechaFinal?></td>
                <td><?= $solicitudesAprobadas[$k]['mediosDias']=='Si' ? number_format($solicitudesAprobadas[$k]['numDias']/2,2) : $solicitudesAprobadas[$k]['numDias']?></td>
                <td><?=$solicitudesAprobadas[$k]['mediosDias']?></td>
                <td><?=$solicitudesAprobadas[$k]['horarioMedioDia']?></td> 
                <td><?=$solicitudesAprobadas[$k]['tipoHorario']?></td>
              </tr>   

              <?php 
                  }
                } 
              ?>
              <?php for ($l=0; $l < count($solicitudesAprobadasE); $l++) {  
                  if(check_in_range($solicitudesAprobadasE[$l]['fechaInicio'], $solicitudesAprobadasE[$l]['fechaFinal'], $fechaActual)){
              ?>
              <tr>
                <td><?=$solicitudesAprobadasE[$l]['periodoId']?></td>
                <td><?=$solicitudesAprobadasE[$l]['numEmpleado']?></td>
                <td><?=$solicitudesAprobadasE[$l]['nombre']?></td>
                <td><?=$solicitudesAprobadasE[$l]['departamento']?></td>
                <?php 
                  $dateFormatInicio = strtotime($solicitudesAprobadasE[$l]['fechaInicio']); 
                  $fechaInicio = date('d/m/Y', $dateFormatInicio);

                  $dateFormatFinal = strtotime($solicitudesAprobadasE[$l]['fechaFinal']); 
                  $fechaFinal = date('d/m/Y', $dateFormatFinal);  
                ?>
                <td><?=$fechaInicio?> - <?=$fechaFinal?></td>
                <td><?= $solicitudesAprobadasE[$l]['mediosDias']=='Si' ? number_format($solicitudesAprobadasE[$l]['numDias']/2,2) : $solicitudesAprobadasE[$l]['numDias']?></td>
                <td><?=$solicitudesAprobadasE[$l]['mediosDias']?></td>
                <td><?=$solicitudesAprobadasE[$l]['horarioMedioDia']?></td> 
                <td><?=$solicitudesAprobadasE[$l]['tipoHorario']?></td>
              </tr>   

              <?php 
                  }
                } 
              ?>              
              <!--
                <tr>
                  <td>105207</td>
                  <td>Roberto Carlos Reyes Medrano</td>
                  <td>20/05/2024 - 27/05/2024</td>
                  <td>5</td>
                  <td>A</td>
                  <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#rechazarModal"><i class="bi bi-x-circle-fill"></i></button></td>
                  <td class="text-center"><button class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button></td>
                </tr> 
                -->

            </tbody>
          </table>
        </div>
        </div>        
      </div>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar vacaciones</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label>Medios días:</label>
                  <div>
                    <label class="switch">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="modalMedioDia">
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="modalRdMorningEvening" value="0" id="modalRdMorning" checked
                    disabled>
                  <label class="form-check-label" for="modalRdMorning">
                    Mañana
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="modalRdMorningEvening" value="1" id="modalRdEvening"
                    disabled>
                  <label class="form-check-label" for="modalRdEvening">
                    Tarde
                  </label>
                </div>
              </div>              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btnModalAceptarHalf">Aceptar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalCancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <!-- Contenido del modal para eliminar -->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <h5>Confirmación</h5>
          </div>
          <div class="modal-body">
                <p>¿Está seguro(a) de que desea cancelar los periodos seleccionados?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btnModalCancelar">Si</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>    


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/i18n/es.js"></script>

    <?php 
    function check_in_range($fecha_inicio, $fecha_fin, $fecha){

      $fecha_inicio = strtotime($fecha_inicio);
      $fecha_fin = strtotime($fecha_fin);
      $fecha = strtotime($fecha);

      if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
          return true;
      else
          return false;
    }

    function old_dates($fecha_fin, $fecha){

      $fecha_fin = strtotime($fecha_fin);
      $fecha = strtotime($fecha);

      if(($fecha > $fecha_fin))
          return false;
      else
          return true;
    }     
    ?>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
    $(document).ready(function() {
      //let objOptions=;

      let objOptions={
          lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
          "order": [[ 1, "desc" ]],
          language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
          }          
        };    
        
        let objOptions2={
          lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
          "order": [[ 0, "desc" ]],
          language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
          }          
        };         

        var table2 = $('#myTable2').DataTable(objOptions);
        var table4 = $('#myTable4').DataTable(objOptions2);

      var table1 = $('#myTable').DataTable({
        "order": [
          [0, "desc"]
        ],

        layout: {
          topStart: {
            pageLength: {
              menu: [5, 10, 25, 50, 100]
            },
            buttons: [{
              extend: 'excelHtml5',
              titleAttr: 'Exportar a Excel',
              className: 'btn btn-success',
              text: '<i class="fas fa-file-excel"></i>',
              title: null,
              //en este caso, customize se utilizara para pintar celdas del excel a partir de lo pintado del datatable
              customize: function(xlsx) {
                //estos archivos, xml se modifican desde aqui con las siguientes lineas de codigo. estos vienen de buttons.html5.min.js
                var sSh = xlsx.xl['styles.xml'];
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                var lastXfIndex = $('cellXfs xf', sSh).length - 1;
                var lastFillIndex = $('fills fill', sSh).length - 1;

                var fill1 =
                  '<fill><patternFill patternType="solid"><fgColor rgb="FFfff751" /><bgColor indexed="64" /></patternFill></fill>';
                var s1 = '<xf numFmtId="0" fontId="0" fillId="' + (lastFillIndex + 1) +
                  '" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/>';

                sSh.childNodes[0].childNodes[2].innerHTML += fill1;
                sSh.childNodes[0].childNodes[5].innerHTML += s1; //new styles                  


                var numAmarillo = lastXfIndex + 1;

                var count = 0;
                var skippedHeader = false;
                $('row', sheet).each(function() {
                  var row = this;

                  if (skippedHeader) {
                    //var colour = $('tbody tr:eq('+parseInt(count)+') td:eq(2)').css('background-color');

                    // Output first row
                    if (count === 0) {
                      console.log(this);
                    }


                    // Output cell contents for first row
                    if (count === 0) {
                      console.log($('c[r^="F"]', row).text());
                    }
                    var colour = $(table1.cell(':eq(' + count + ')', 5).node()).css(
                      'background-color');
                    if (colour === 'rgb(255, 247, 81)') {
                      $('c[r^="F"]', row).attr('s', numAmarillo);
                    }
                    console.log(colour);
                    count++;
                  } else {
                    skippedHeader = true;
                  }
                });
              }
            }]
          }
        },
        language: {
          "processing": "Procesando...",
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "emptyTable": "Ningún dato disponible en esta tabla",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "infoThousands": ",",
          "loadingRecords": "Cargando...",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
        }
      });

      $.fn.select2.defaults.set('language', 'es');

      let numEmp = jQuery.unique(table1.columns(0).data().toArray()[0].sort());
      let nombre = jQuery.unique(table1.columns(1).data().toArray()[0].sort());
      let departamento = jQuery.unique(table1.columns(2).data().toArray()[0].sort());
      let area = jQuery.unique(table1.columns(3).data().toArray()[0].sort());
      let fechaIngreso = jQuery.unique(table1.columns(4).data().toArray()[0].sort());
      let diasPendientes = jQuery.unique(table1.columns(5).data().toArray()[0].sort());
      let diasTomados = jQuery.unique(table1.columns(6).data().toArray()[0].sort());

      numEmp.forEach(function(a) {
        append_select('numEmpFilter', a);
      });

      nombre.forEach(function(a) {
        append_select('nombreFilter', a);
      });

      departamento.forEach(function(a) {
        append_select('departamentoFilter', a);
      });

      area.forEach(function(a) {
        append_select('areaFilter', a);
      });

      fechaIngreso.forEach(function(a) {
        append_select('fechaIngresoFilter', a);
      });

      diasPendientes.forEach(function(a) {
        append_select('diasPendientesFilter', a);
      });

      diasTomados.forEach(function(a) {
        append_select('diasTomadosFilter', a);
      });


      $('#numEmpFilter').select2({
        placeholder: 'Número de empleado',
        maximumSelectionLength: 15
      });


      $('#nombreFilter').select2({
        placeholder: 'Nombre',
        maximumSelectionLength: 15
      });

      $('#departamentoFilter').select2({
        placeholder: 'Departamento',
        maximumSelectionLength: 15
      });

      $('#areaFilter').select2({
        placeholder: 'Área',
        maximumSelectionLength: 15
      });

      $('#fechaIngresoFilter').select2({
        placeholder: 'Fecha de ingreso',
        maximumSelectionLength: 15
      });

      $('#diasPendientesFilter').select2({
        placeholder: 'Días pendientes',
        maximumSelectionLength: 15
      });

      $('#diasTomadosFilter').select2({
        placeholder: 'Días tomados',
        maximumSelectionLength: 15
      });

      $("#edSeleccion").click(function(){
        let cont=0;
        $('input[name="vpCheck"]:checked').each(function () {
          cont++;
        });
        if(cont>0){
          $("#modalEditar").modal('show');

        }

      })

      $("#cancSeleccion").click(function(){
        let cont=0;
        $('input[name="vpCheck"]:checked').each(function () {
          cont++;
        });
        if(cont>0){
          $("#modalCancelar").modal('show');

        }        
      })



      $('#numEmpFilter').on('change', function() {
        recargar_tabla($(this), table1, 0);
      })

      $('#nombreFilter').on('change', function() {
        recargar_tabla($(this), table1, 1);
      })

      $('#departamentoFilter').on('change', function() {
        recargar_tabla($(this), table1, 2);
      })

      $('#areaFilter').on('change', function() {
        recargar_tabla($(this), table1, 3);
      })

      $('#fechaIngresoFilter').on('change', function() {
        recargar_tabla($(this), table1, 4);
      })

      $('#diasPendientesFilter').on('change', function() {
        recargar_tabla($(this), table1, 5);
      })

      $('#diasTomadosFilter').on('change', function() {
        recargar_tabla($(this), table1, 6);
      })

      $("#fechaInicio").on('change', function() {
        mostrarCambiosPantalla();
        mostrarErrorDias('');
      });

      $("#fechaFin").on('change', function() {
        mostrarCambiosPantalla();
        mostrarErrorDias('');
      });

      $("#tipoHorario").on('change', function() {
        mostrarCambiosPantalla();
      });

      $("#medioDia").on('change', function() {
        console.log("cambia", $(this).is(':checked'));
        alternarAct();
        mostrarCambiosPantalla();
        logSelectedRadioButton();
      });

      const alternarAct = () => {
        $("input[name='rdMorningEvening']").each(function() {
          $(this).prop("disabled", !$(this).prop("disabled"));
        });
      }

      const logSelectedRadioButton = () => {
        var selectedValue = $("input[name='rdMorningEvening']:checked").val();
        console.log("Opción seleccionada:", selectedValue);
      }


      $("#modalMedioDia").on('change', function() {
        console.log("cambia", $(this).is(':checked'));
        alternarActModal();
        logSelectedRadioButtonModal();
      });

      const alternarActModal = () => {
        $("input[name='modalRdMorningEvening']").each(function() {
          $(this).prop("disabled", !$(this).prop("disabled"));
        });
      }

      const logSelectedRadioButtonModal = () => {
        var selectedValue = $("input[name='modalRdMorningEvening']:checked").val();
        console.log("Opción seleccionada:", selectedValue);
      }      


      $('#asignar').click(function() {
        subir_vacac_multiple();
      });
      
    });

    const mostrarCambiosPantalla = () => {
      let fechaInicioVal = $("#fechaInicio").val();
      let fechaFinVal = $("#fechaFin").val();
      let tipoHorario = $("#tipoHorario").val();

      let fechaInicio = new Date(fechaInicioVal);
      let fechaFin = new Date(fechaFinVal);

      //funcion para convertir fechas a fechas locales
      fechaInicio.setTime(fechaInicio.getTime() + fechaInicio.getTimezoneOffset() * 60 * 1000);
      fechaFin.setTime(fechaFin.getTime() + fechaFin.getTimezoneOffset() * 60 * 1000);

      let cantDias = calcularDiasHabiles(fechaInicio, fechaFin, tipoHorario);

      let medDias = cantDias / 2;

      $("#numDias").val(cantDias);

      if ($("#medioDia").is(':checked')) {
        $("#txtNumDias").val(medDias);

      } else {
        $("#txtNumDias").val(cantDias);

      }

    }

    const calcularDiasHabiles = (fechaInicial, fechaFinal, tipoHorario) => {
      var diasHabiles = 0;
      var currentDate = fechaInicial;

      while (currentDate <= fechaFinal) {
        var dayOfWeek = currentDate.getDay();

        if (tipoHorario == "A") {
          if (dayOfWeek !== 0 && dayOfWeek !== 6) {
            diasHabiles++;
          }
        } else {
          if (dayOfWeek !== 0) {
            diasHabiles++;
          }
        }

        currentDate.setDate(currentDate.getDate() + 1);
      }

      return diasHabiles;
    }

    $(".subir-archivo").click(function() {
      let archivovac = $('#archivo');

      let archivo = archivovac[0].files[0];
      if ((archivo === undefined)) {
        console.log("Archivo vacio")
      } else {
        let formData = new FormData();
        formData.append('archivo', archivo);

        $.ajax({
          url: "cambios/actualizar_dias_vacaciones_excel.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $('.loader').show();
          }
        }).done(function(response) {
          console.log(response);
          window.location.reload();
        });
      }
    });

    const append_select = (filtro, element) => {
      $('#' + filtro).append('<option value="' + element + '">' + element + '</option>');
    }

    const recargar_tabla = (objFiltro, table, numColumna) => {
      var data = $.map(objFiltro.select2('data'), function(value, key) {
        return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
      });

      //if no data selected use ""
      if (data.length === 0) {
        data = [""];
      }

      //join array into string with regex or (|)
      var val = data.join('|');

      //search for the option(s) selected
      table.column(numColumna)
        .search(val ? val : '', true, false)
        .draw();
      console.log(val);
    }


    /// segunda pestaña, de asignacion de dias

    // Filtrar empleados por búsqueda
    $("#search").on("keyup", function() {
      const value = $(this).val().toLowerCase();
      $("#employeeList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().includes(value));
      });
    });

    // Función para actualizar el botón de Seleccionar/Deseleccionar
    function updateSelectAllButton() {
      const total = $(".emp-checkbox").length;
      const checked = $(".emp-checkbox:checked").length;
      $("#selectAll").text(checked === total ? "Deseleccionar Todo" : "Seleccionar Todo");
    }

    // Evento para seleccionar/deseleccionar todos los empleados visibles
    $("#selectAll").on("click", function() {
      const visibleEmployees = $("#employeeList li:visible .emp-checkbox");
      const allChecked = visibleEmployees.length === visibleEmployees.filter(":checked").length;
      visibleEmployees.prop("checked", !allChecked);
      updateSelectAllButton();
    });
    

    $('#btnSeleccionarTodo').click(function () {
      var checkboxes = $('input[name="vpCheck"]:visible');
        
        if (checkboxes.filter(':checked').length === checkboxes.length) {
            checkboxes.prop('checked', false);
            $(this).text('Seleccionar Todos');
        } else {
            checkboxes.prop('checked', true);
            $(this).text('Deseleccionar Todos');
        }
    });

    $("#btnModalAceptarHalf").click(function(){
      actualizar_vacac_multiple();
    });

    $("#btnModalCancelar").click(function(){
      cancelar_vacac_multiple();
    });    


    const subir_vacac_multiple = () => {

      var selectedUserIds = [];
      $("#employeeList li .emp-checkbox:checked").each(function() {
        var userId = $(this).closest("li").data("userid");
        selectedUserIds.push(userId);
      });

      //console.log(selectedUserIds.toString());      
      let userIds=selectedUserIds.toString();
      let fechaInicio=$("#fechaInicio").val();
      let fechaFin=$("#fechaFin").val();
      let tipoHorario=$("#tipoHorario").val();
      let medioDia = $("#medioDia").is(':checked') ? 1 : 0;       
      let tipoMedioDia = $("input[name='rdMorningEvening']:checked").val();      
      let numDias = $("#txtNumDias").val()
      console.log($("#txtNumDias").val());

      if(numDias<=0){
        mostrarErrorDias('Agregar al menos 1 día');
      }

      if(userIds!='' && fechaInicio!='' && fechaFin!='' && numDias>0){
        let datos = {
          userIds,
          fechaInicio,
          fechaFin,
          tipoHorario,
          medioDia,
          vacationsType: 'E',
          vacationsStatus: 'A'
        }
        if (medioDia==1) datos.tipoMedioDia = tipoMedioDia;


        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('altas/subir_vacaciones_multiple.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          console.log(data['ok']);
          if(data['ok']){
            location.reload();
          }else{
            alert(data['message']);
          }
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })
      }else{
        console.log("variables vacias");
      }

    }   
    
    const actualizar_vacac_multiple = () => {
      // si no se va a ocupar tipoMedioDia: '0', se puede omitir y el archivo actualizar_vacaciones_multiple.php lo recibe como NULL y el campo en la base de datos se queda como NULL
      console.log('entramos a actualizar_vacac_multiple');
      var selectedVPIds = [];
        
      $('input[name="vpCheck"]:checked').each(function () {
          var vpValue = $(this).closest('tr').data('vp');
          selectedVPIds.push(vpValue);
      });
      
      let medioDia = $("#modalMedioDia").is(':checked') ? 1 : 0;       
      let tipoMedioDia = $("input[name='modalRdMorningEvening']:checked").val();           

      //var vacationsPeriodIds = valores.join(',');
      let vacationsPeriodIds=selectedVPIds.toString();

      let datos = {
        vacationsPeriodIds,
        medioDia
      }

      if (medioDia==1) datos.tipoMedioDia = tipoMedioDia;      

      
      let fd = new FormData();

      for(var key in datos){
        fd.append(key, datos[key]);
      }

      fetch('cambios/actualizar_vacaciones_multiple.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })


    }
    
    const cancelar_vacac_multiple = () => {
      //esta funcion es para cancelar vacaciones, pasando como parametro los ids de los periodos de vacaciones
      console.log('entramos a actualizar_vacac_multiple');
      var selectedVPIds = [];
        
      $('input[name="vpCheck"]:checked').each(function () {
          var vpValue = $(this).closest('tr').data('vp');
          selectedVPIds.push(vpValue);
      });      
      
      let vacationsPeriodIds=selectedVPIds.toString();      
      
      let datos = {
        vacationsPeriodIds
      }
      
      let fd = new FormData();

      for(var key in datos){
        fd.append(key, datos[key]);
      }

      fetch('bajas/cancelar_vacaciones_multiple.php', {
        method: "POST",
        body: fd
      })
      .then(response => {
        return response.ok ? response.json() : Promise.reject(response);
      })
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch(err => {
        let message = err.statusText || "Ocurrió un error";
        console.log(err);
      })

    }         


    const mostrarErrorDias = (mensaje) => {
      if(mensaje!=''){
        $('#error_numDias').text(mensaje);
        $('#txtNumDias').css('border-color', '#cc0000');
      }else{
        $('#error_numDias').text('');
        $('#txtNumDias').css('border-color', '');          
      }
    }    
    </script>

  </main>
  <?php require 'layout/footer.php';?>
</body>

</html>