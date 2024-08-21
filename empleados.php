<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empleados</title>
  <?php require 'layout/libreriasdatatable.php';?>


  <?php require 'nav.php'; ?>
  <?php require 'layout/sidebar.php';?>
  <?php $empleados = Consultas::listUsers($conn); ?>
  <?php $autorizaciones = Consultas::listAuthorizations($conn); ?>  


</head>

<body>
  <!-- jQuery y Bootstrap JS -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>

  <!-- Importar anime.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    /* Estilos opcionales para el elemento h2 */
    #vacaciones {
      font-size: 24px;
      /* Tamaño de fuente inicial */
      opacity: 0;
      /* Opacidad inicial */
    }
  </style>


  <style type="text/css">
    button.active {

      background-color: green;
      /* Cambia el color de fondo cuando el botón está activo */
      color: white;
      /* Cambia el color del texto cuando el botón está activo */
    }

    .btn-info {
      color: #fff !important;
      background-color: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }

    .btn-danger {
      color: #fff !important;
      background-color: #dc3545 !important;
      border-color: #dc3545 !important;
    }

    .btn-success {
      color: #fff !important;
      background-color: #218838 !important;
      border-color: #1e7e34 !important;
    }

    div.dt-button-collection {
      top: -195px !important;
      left: -193.146px !important;
    }

    .button.dt-button,
    div.dt-button,
    a.dt-button,
    input.dt-button {
      position: relative;
      background-color: #4CAF50 !important;
      border: none !important;
      font-size: 28px !important;
      color: #FFFFFF !important;
      padding: 20px !important;
      width: 200px;
      text-align: center;
      transition-duration: 0.4s;
      text-decoration: none;
      overflow: hidden;
      cursor: pointer;
    }

    .button:after {
      content: "";
      background: #f1f1f1;
      display: block;
      position: absolute;
      padding-top: 300%;
      padding-left: 350%;
      margin-left: -20px !important;
      margin-top: -120%;
      opacity: 0;
      transition: all 0.8s
    }

    .button:active:after {
      padding: 0;
      margin: 0;
      opacity: 1;
      transition: 0s
    }
  </style>


  <style type="text/css">
    .h4,
    h4 {
      font-size: 2rem;
    }

    .container {
      width: 100%;
      padding-right: 13px;
      padding-left: 25px;
      margin-right: 28px;
      margin-left: -2px;
    }

    .mt-5,
    .my-5 {
      margin-top: 0rem !important;
    }

    body {
      font-family: "Open Sans", sans-serif;
      background: #052668;
      color: 'black;';
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
      margin: 0 10px;
      /* Margen entre las imágenes y el texto */
      vertical-align: middle;
      /* Alineación vertical con el texto */
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
              <div style="float: right;">
                <p>
                <p>
                <div class="corner-container">
                  <img src="assets/img/arroz12.png" width="200" height="50" alt="Arroz" id="as">
                </div>
              </div>
              <h2 align="text-center" id="title" class="animate__animated animate__bounceInRight card-title">Información
                de mis Empleados
                <img style="text-align: center;" src="assets/img/lounger.gif" width="50" alt="">
              </h2>
              <div>
                Mostrar/Ocultar columna:
                <a class="toggle-vis" data-column="0"><button>Nombre</button></a>
                <a class="toggle-vis" data-column="1"><button>Apellido Paterno</button></a>
                <a class="toggle-vis" data-column="2"><button>Apellido Materno</button></a>
                <a class="toggle-vis" data-column="3"><button>Fecha de Nacimiento</button></a>
                <a class="toggle-vis" data-column="4"><button>Fecha Ingreso</button></a>


              </div>
              <br>

              <div>
                <div class="container mt-4">
                  <!-- Pestañas -->
                  <ul class="nav nav-tabs" id="pestanas" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pestaña1-tab" data-toggle="tab" href="#contenido1" role="tab"
                        aria-controls="contenido1" aria-selected="true">Empleados</a>
                    </li>
                    <!--

                      <li class="nav-item">
                        <a class="nav-link" id="pestaña2-tab" data-toggle="tab" href="#contenido2" role="tab"
                        aria-controls="contenido2" aria-selected="false">Empleados-planta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pestaña2-tab" data-toggle="tab" href="#contenido2" role="tab"
                        aria-controls="contenido2" aria-selected="false">Empleados
                        años anteriores</a>
                    </li>
                    -->

                    <!-- Add more tabs as needed -->
                  </ul>
                  <br>
                  <!-- Contenido de las pestañas -->
                  <div class="tab-content" id="contenidoPestanas">
                    <!-- Contenido de la Pestaña 1 -->
                    <div class="tab-pane fade show active" id="contenido1" role="tabpanel"
                      aria-labelledby="pestaña1-tab">
                      <table class="table table-striped table-bordered display nowrap" id="myTable1" style="font-size:74%;width:100%;">
                        <thead>
                          <tr>
                            <th>Permisos</th>
                            <th>Editar empleado</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Estado Civil</th>
                            <!--
                              <th>Dirección</th>
                            -->                            
                            <th>Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th>Departamento</th>
                            <th>Puesto</th>
                            <th>Fecha de Ingreso</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          for ($i=0; $i < count($empleados); $i++) { 
                            //$empleadoNombre=$empleados[$i]['nombre']." ".$empleados[$i]['apellido1']." ".$empleados[$i]['apellido2'];  
                            $empId=$empleados[$i]['usuarioId'];
                          ?>
                            <tr data-empId="<?=$empId?>">
                              <td class="text-center"><button class="btn btn-success btn-sm select-permisos"><i class="bi bi-pencil-square"></i></button></td>
                              <td class="text-center"> <a href="editar-empleado.php?id=<?=$empId?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>                              
                              <td><?=$empleados[$i]['nombre']?></td>
                              <td><?=$empleados[$i]['apellido1']?></td>
                              <td><?=$empleados[$i]['apellido2']?></td>
                              <td><?=$empleados[$i]['fechaNacimiento']?></td>
                              <td><?=$empleados[$i]['genero']?></td>                              
                              <td><?=$empleados[$i]['estadoCivil']?></td>
                              <td><?=$empleados[$i]['telefono']?></td>
                              <td><?=$empleados[$i]['correo']?></td>
                              <td><?=$empleados[$i]['departamento']?></td>
                              <td><?=$empleados[$i]['puesto']?></td>
                              <td><?=$empleados[$i]['fechaIngreso']?></td>
                            </tr>
                        <?php 
                          }
                          ?>                        

                        </tbody>
                      </table>
                    </div>

                    <!-- Contenido de la Pestaña 2 -->

                    

                    <!-- Agrega más contenidos de pestañas según sea necesario -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
  </main><!-- End #main -->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="permisosModalLabel"
  aria-hidden="true" id="modalPermisos">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="permisosModalLabel">Permisos</h4>
          <button type="button" class="close" aria-label="Close" id="modalPermisosClose">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?php for ($j=0; $j < count($autorizaciones); $j++) { ?>
              <div class="form-check">
                <input class="form-check-input auth-input" type="checkbox" value="<?=$autorizaciones[$j]['autorizacionId']?>" id="auth<?=$j?>">
                <label class="form-check-label" for="auth<?=$j?>">
                  <?=$autorizaciones[$j]['nombreAutorizacion']?>
                </label>
              </div>
          <?php } ?>
          <input type="hidden" id="empId" value="0">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="guardarModalPermisos">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS -->

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
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script>  
    $(document).ready(function () {
      var table = $('#myTable1').DataTable({
    "pageLength": 0,
    "lengthMenu": [5, 15, 25, 50, 100],
    scrollX: true,
    order: [[2, 'asc']],
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


      $(".select-permisos").click(function(){
        //let fd = new FormData();
        //let empId=$(this).parent().parent().attr('data-empId');
        //let authId;
        //fd.append('userId', empId);
        //$("#empId").val(empId);
        //
        //$(".auth-input").each(async function() {
        //  authId=$(this).val();
        //  fd.append('authorizationId', authId);        
        //  await consulta_permiso(fd,$(this));
        //});
        //
        //$('#modalPermisos').modal('show');
        //console.log("asi origen");
      });    
      
      table.on('click', 'tbody tr .select-permisos', function () {
        let fd = new FormData();
        let empId=$(this).parent().parent().attr('data-empId');
        let authId;
        fd.append('userId', empId);
        $("#empId").val(empId);
        
        $(".auth-input").each(async function() {
          authId=$(this).val();
          fd.append('authorizationId', authId);        
          await consulta_permiso(fd,$(this));
        });
        
        $('#modalPermisos').modal('show');
        //console.log("asi");
      });      

      $("#guardarModalPermisos").click(function(){
        let fd = new FormData();
        let empId=$("#empId").val();
        let authId;
        fd.append('userId', empId);

        $(".auth-input").each(function() {
          authId=$(this).val();
          fd.append('authorizationId', authId);  

          if($(this).prop('checked')){
            fd.append('tipo', 1);            
          }else{
            fd.append('tipo', 0);            
          }

          subirAutorizacion(fd);

        });

        $('#modalPermisos').modal('hide');
      });

      $("#modalPermisosClose").click(function(){
        $('#modalPermisos').modal('hide');
      });

      const subirAutorizacion = (fd) => {
        fetch('altas/subir_autorizacion_usuario.php', {
            method: "POST",
            body: fd
          }) 
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            console.log(data);
            //location.reload();
          })
          .catch(err => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err);
          })   
      }    
      
      const consulta_permiso = async(fd, elemento) => {
        let resultado;
        elemento.prop('checked',false);
        await fetch('helpers/permiso_seleccionado.php', {
            method: "POST",
            body: fd
          })
          .then(response => {
            return response.ok ? response.json() : Promise.reject(response);
          })
          .then(data => {
            //console.log(data);
            if(data.rows>0){
              elemento.prop('checked',true);
            }
          })
          .catch(err => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err);

          })          

      }

      // Función para formatear el contenido de las filas secundarias
      function format(data) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
          '<tr>' +
          '<td>Enero:</td>' +
          '<td>' + data[4] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Febrero:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Marzo:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Abril:</td>' +
          '<td>' + data[4] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Mayo:</td>' +
          '<td>' + data[5] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Junio:</td>' +
          '<td>' + data[6] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Julio:</td>' +
          '<td>' + data[7] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Agosto:</td>' +
          '<td>' + data[8] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Septiembre:</td>' +
          '<td>' + data[9] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Octubre:</td>' +
          '<td>' + data[10] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Noviembre:</td>' +
          '<td>' + data[11] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Diciembre:</td>' +
          '<td>' + data[6] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Edad:</td>' +
          '<td>' + data[3] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Fecha de inicio:</td>' +
          '<td>' + data[14] + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Salario:</td>' +
          '<td>' + data[15] + '</td>' +
          '</tr>' +
          '</table>';
      }
      // Agregar evento clic a los botones para mostrar u ocultar columnas
      $('.toggle-vis').on('click', function () {
        var column = table.column($(this).data('column'));
        column.visible(!column.visible());

        // Alternar la clase activa del botón
        $(this).find('button').toggleClass('active');
      });


      document.querySelectorAll('a.toggle-vis').forEach((el) => {
        el.addEventListener('click', function (e) {
          e.preventDefault();

          let columnIdx = e.target.getAttribute('data-column');
          let column = table.column(columnIdx);

          // Toggle the visibility
          column.visible(!column.visible());
        });



      });

    });


  </script>


  <script>
    // Obtener el elemento h2 a animar
    var vacaciones = document.getElementById('vacaciones');

    // Animación utilizando anime.js
    anime({
      targets: vacaciones, // Elemento a animar
      fontSize: '30px',    // Tamaño de fuente final
      opacity: 1,           // Opacidad final
      duration: 1000       // Duración de la animación en milisegundos (1 segundo)
    });
  </script>
  <!-- Script para la animación -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var cornerContainers = document.querySelectorAll('.corner-container');
      var images = document.querySelectorAll('.image-container');

      function animateImages() {
        cornerContainers.forEach(function (container, index) {
          var options = {
            targets: container,
            translateY: ['100%', 0],
            scale: [0, 1], // Efecto de escala
            rotate: [180, 0], // Efecto de rotación
            duration: 1000,
            easing: 'easeInOutQuad',
            delay: 300 * index,
            complete: function (anim) {
              anime({
                targets: '#as',
                opacity: [0, 1],
                duration: 500,
                easing: 'easeInOutQuad',
              });
            }
          };

          anime(options);
        });
      }

      animateImages();
    });
  </script>

</body>

</html>