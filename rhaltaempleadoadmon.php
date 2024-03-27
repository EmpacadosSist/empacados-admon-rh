<?php 
  require_once('layout/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Alta Empleados Empacados</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<?php require_once('layout/sidebar.php'); ?>
<?php require 'nav.php'; ?>
<?php $areas = Consultas::listAreas($conn); ?>
<?php $cecos = Consultas::listCecos($conn); ?>

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
    
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <h2 id="title" class="animate__animated animate__bounceInDown card-title">          
                Datos de Empleado
                <img src="assets/img/empleadoempacados.png" alt="" width="60">
              </h2>
            </div>
          </div>
        </div>
      </div>
    
  </section>
</main>

</html>


<style type="text/css">
  
       .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
</style>
 <script>
    // Datos de ejemplo para departamentos y puestos
    var departmentsByArea = {
      'Operaciones': ['Almacen','Calidad', 'Distribución', 'Producción','Desarrollo','Mantenimiento'],
      'Admón': ['Facturación','Inventarios', 'Compras', 'Contabilidad', 'RH','Sistemas'],
      'Comercial': ['Industrial','Ventas', 'Marketing','Autoservicios','Comercial','Líder Trade Marketing','Industrial','Institucional','Mayoreo']
    };

   var positionsByDepartment = {
      'Almacen': ['Lider de Almacenes'],
      'Inventarios': ['Lider de Inventarios y Costos','Auditor de Inventarios','Analista de Inventarios'],

    
      'Sistemas': ['Ingeniero Sistemas'],

      'Desarrollo': ['Líder Innovación y Desarrollo','Ingeniero de Innovación & Desarrollo','Ingeniero Jr de Innovación & Desarrollo'],

      'Contabilidad': ['Auxiliar Contable','Auditor Fiscal','Analista Tesorería y Contabilidad','Analista Fiscal','Analista Contable', 'Líder de Contabilidad', 'Staff de Contabilidad'],

      'RH': ['Lider de Recursos Humanos','Analista de Reclutamiento','Analista de Capacitación',  'Analista de Recursos Humanos','Coordinación Seguridad de Higiene'],
      
      'Mantenimiento': ['Líder de Mantenimiento e Ingeniería','Supervisor de Mantenimiento','Staff de Mantenimiento e Ingeniería'],


      'Facturación': ['Lider Credito y Cobranza','Analista de Facturación','Analista de Créditos','Staff de Facturación'],
      'Compras':['Líder de Compras Nacional y Planeación','Analista de Compras Internacionales','Líder de Compras Internacionales','Asistente de Compras'],

      'Comercial': ['Líder Export y Conveniencia'],

      'Autoservicios': ['KAE Norte','KAE Cadenas Regionales','Gerente Nacional Retail'],

      'Mayoreo': ['Líder Ventas Mayoreo','Vendedor Monterrey La Costa','Vendedor Chihuahua','Vendedor Centro','Vendedor Guadalajara'],

      'Marketing': ['Analista de Inteligencia de Mercados','Digital Content Manager','Líder Marketing','Líder Experiencia del Cliente','Diseñador'],

      'Líder Trade Marketing': ['Líder Trade Marketing'],

      'Ventas': ['Director Comercial','Líder Coordinación de Servicio','Staff de Servicio','KAE Centro','Planner Comercial'],
      'Industrial': ['Director Industrial','KAE Industrial CDMX','KAE Industrial Guadalajara','KAE Industrial Norte','Staff de Industrial'],

       'Institucional': ['KAE Institucional'],

      'Calidad': ['Lider Calidad e Inocuidad','Staff de Calidad e Inocuidad MIP','Staff de Calidad e Inocuidad SGC','Analista de Microbiología', 'Inspector de Calidad en Procesos','Inspector de Calidad en Materia Prima'],

      'Distribución': ['Lider de Distribución', 'Staff de Distribución General', 'Staff de Distribución Institucional','Staff de Distribución Mayoreo','Staff de Retail Distribución'],

      'Producción': ['Líder de Producción','Master Planner Producción','Staff de Producción','Supervisor de Producción'],
     

};
    function updatePositions() {
      var department = document.getElementById('department').value;
      var positionsSelect = document.getElementById('position');

      // Limpiar opciones actuales
      positionsSelect.innerHTML = '';

      // Agregar nuevas opciones para el puesto
      positionsByDepartment[department].forEach(function (position) {
        var option = document.createElement('option');
        option.value = position;
        option.text = position;
        positionsSelect.add(option);
      });
    }

    // Llamar a la función de actualización de departamentos al cargar la página
    updateDepartments();


  
  </script>




<script>
    $(document).ready(function() {
        $('#work_contract').click(function() {
            $('#form_id').attr('action', 'pdfpuesto.php');
        });
    });

    
</script>



<!-- Modal para mostrar información -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">
          <i class="fas fa-info-circle"></i> Información Adicional
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- Contenido del modal -->
        <form id="personalForm">
          <div class="form-group"> 
            <div class="form-group">
              <label for="apellido">Apellido Paterno:</label>
              <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido">
            </div>
            <div class="form-group">
              <label for="apellidomaterno">Apellido Materno:</label>
              <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese su apellido materno">
            </div>
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group">
            <label for="fechaNacimientoconyuge">Fecha de nacimiento :</label>
            <input type="date" class="form-control" id="fechaNacimientoconyuge">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" readonly>
          </div>
          <button type="button" class="btn btn-primary" id="guardarDatos">Guardar</button>
          <div class="form-check"> <br>
            <!-- Tabla para mostrar datos HIJOS -->
            <input class="form-check-input" type="checkbox" id="tieneHijos">
            <label class="form-check-label" for="tieneHijos">Tiene hijos</label>
          </div>
          <div class="form-group" id="datosHijo" style="display: none;">
            <label for="nombreHijo">Nombre del hijo:</label>
            <input type="text" class="form-control" id="nombreHijo" placeholder="Ingrese el nombre del hijo">
            <label for="apellidohijo"></label>
            <input type="text" class="form-control" id="apellidohijo" placeholder="Ingrese el nombre del hijo">
            <label for="apellidomaternohijo"></label>
            <input type="text" class="form-control" id="apellidomaternohijo" placeholder="Ingrese el nombre del hijo">
            <label for="fechaNacimiento">Fecha de nacimiento del hijo:</label>
            <input type="date" class="form-control" id="fechaNacimiento">
            <label for="edadHijo">Edad del hijo:</label>
            <input type="text" class="form-control" id="edadHijo" readonly>
          </div>
          <button type="button" class="btn btn-primary" id="guardarDatosHijo">Guardar</button>
        </form>
        <hr>
        <!-- Tabla para mostrar datos -->
        <h5>Datos Personales:</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Edad</th>     
              <th>Fecha de Nacimiento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tablaDatos">
            <!-- Aquí se mostrarán los datos ingresados -->
          </tbody>
        </table>
        <!-- Fin de la tabla -->
        <div id="tabHijo" style="display: none;">
          <h5>Datos del Hijo:</h5>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>      
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tablaHijo">
              <!-- Aquí se mostrarán los datos del hijo -->
            </tbody>
          </table>
        </div>
        <!-- Fin del Tab Content para los datos del hijo -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para advertir campos vacíos -->
<div class="modal fade" id="advertenciaModal" tabindex="-1" role="dialog" aria-labelledby="advertenciaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="advertenciaModalLabel">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Por favor complete todos los campos.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</body>
<?php require 'layout/footer.php';?>

</html>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>


 $(document).ready(function() {
  $('#estadoCivil').change(function() {
    var estadoCivil = $(this).val();
    if (estadoCivil === 'casado') {
      $('#tab1').addClass('show active');
      $('#tab2').removeClass('show active');
      $('#infoModal').modal('show');
    } else {
      $('#tab2').addClass('show active');
      $('#tab1').removeClass('show active');
      $('#infoModal').modal('show');


      }
    });

var usuarioRegistrado = false;

$('#guardarDatos').click(function() {
  var nombre = $('#nombre').val();
  var apellido = $('#apellido').val();
  var apellidomaterno = $('#apellidomaterno').val();
  var edad = $('#edad').val();
  var fechaNacimientoconyuge = $('#fechaNacimientoconyuge').val();

  // Verificar si los campos no están vacíos
  if (nombre.trim() !== '' && apellido.trim() !== '' && edad.trim() !== '' && fechaNacimientoconyuge.trim() !== '') {
    if ($('#tablaDatos tr').length === 0) {
      $('#tablaDatos').append('<tr><td>' + nombre + '</td><td>' + apellido + ' '+ apellidomaterno + '</td><td>' + edad + '</td><td>' + fechaNacimientoconyuge + '</td><td><button class="btn btn-danger eliminar">Eliminar</button> <button class="btn btn-primary editar">Editar</button></td></tr>');
    } else {
      alert('Solo se permite un registro. Para editar, haz clic en "Editar".');
    }

    $('#nombre').val('');
    $('#apellido').val('');
    $('#apellidomaterno').val('');
    $('#edad').val('');
    $('#fechaNacimientoconyuge').val('');

    // Bloquear el modal después del primer registro
    if (!usuarioRegistrado) {
      usuarioRegistrado = true;
    }
  } else {
    // Mostrar el modal de advertencia
    $('#advertenciaModal').modal('show');
  }
});

// Evento para eliminar una fila de la tabla de datos personales
$('#tablaDatos').on('click', '.eliminar', function() {
  $(this).closest('tr').remove();
  
  // Habilitar el campo de estado civil si se elimina el único registro
  if ($('#tablaDatos tr').length === 0) {
    usuarioRegistrado = false;
    // Habilitar los campos si no hay registros
    $('#nombre').prop('disabled', false);
    $('#apellido').prop('disabled', false);
    $('#apellidomaterno').prop('disabled', false);
    $('#edad').prop('disabled', false);
    $('#fechaNacimientoconyuge').prop('disabled', false);
  }
});

// Evento para editar una fila de la tabla de datos personales
$('#tablaDatos').on('click', '.editar', function() {
  var nombre = $(this).closest('tr').find('td').eq(0).text();
  var apellidos = $(this).closest('tr').find('td').eq(1).text().split(' ');
  var apellido = apellidos[0];
  var apellidomaterno = apellidos.length > 1 ? apellidos[1] : '';
  var edad = $(this).closest('tr').find('td').eq(2).text();
  var fechaNacimientoconyuge = $(this).closest('tr').find('td').eq(3).text();

  $('#nombre').val(nombre);
  $('#apellido').val(apellido);
  $('#apellidomaterno').val(apellidomaterno);
  $('#edad').val(edad);
  $('#fechaNacimientoconyuge').val(fechaNacimientoconyuge);

  // Habilitar los campos para edición
  $('#nombre').prop('disabled', false);
  $('#apellido').prop('disabled', false);
  $('#apellidomaterno').prop('disabled', false);
  $('#edad').prop('disabled', false);
  $('#fechaNacimientoconyuge').prop('disabled', false);

  // Eliminar la fila actual
  $(this).closest('tr').remove();

  // Habilitar los campos si no hay registros después de la eliminación
  if ($('#tablaDatos tr').length === 0) {
    usuarioRegistrado = false;
  }
});


                                                            // DATOS PERSONALES HIJOS////////////////

    // Mostrar campos del hijo cuando se marque el checkbox
    $('#tieneHijos').change(function() {
      if ($(this).is(':checked')) {
        $('#datosHijo').show();
        $('#tabHijo').show();
      } else {
        $('#datosHijo').hide();
        $('#tabHijo').hide();
      }
    });

 $('#guardarDatosHijo').click(function() {
      var nombreHijo = $('#nombreHijo').val();
      var apellidoHijo = $('#apellidohijo').val();
      var apellidomaternoHijo = $('#apellidomaternohijo').val();
      var fechaNacimiento = $('#fechaNacimiento').val();

      // Verificar si el nombre del hijo y la fecha de nacimiento no están vacíos
      if (nombreHijo.trim() !== '' && apellidoHijo.trim() !== '' && apellidomaternoHijo.trim() !== '' && fechaNacimiento.trim() !== '') {
        var hoy = new Date();
        var fechaNac = new Date(fechaNacimiento);
        var edadHijo = hoy.getFullYear() - fechaNac.getFullYear();

        $('#tablaHijo').append('<tr><td>' + nombreHijo + '</td><td>' + apellidoHijo + ' ' + apellidomaternoHijo + '</td><td>' + fechaNacimiento + '</td><td>' + edadHijo + '</td><td><button class="btn btn-danger eliminarHijo">Eliminar</button> <button class="btn btn-primary editarHijo">Editar</button></td></tr>');

        // Limpiar los campos después de agregar la fila
        $('#nombreHijo').val('');
        $('#apellidohijo').val('');
        $('#apellidomaternohijo').val('');
        $('#fechaNacimiento').val('');
        $('#edadHijo').val(edadHijo);
      } else {
        // Mostrar un mensaje de alerta si algún campo está vacío
        $('#advertenciaModal').modal('show');
      }


    });

    // Evento para eliminar un hijo de la tabla de datos de hijos
    $('#tablaHijo').on('click', '.eliminarHijo', function() {
      $(this).closest('tr').remove();
    });

    // Evento para editar un hijo de la tabla de datos de hijos
    $('#tablaHijo').on('click', '.editarHijo', function() {
      var row = $(this).closest('tr');
      var nombreHijo = row.find('td:eq(0)').text();
      var apellidosHijo = row.find('td:eq(1)').text().split(' ');
      var apellidoHijo = apellidosHijo[0];
      var apellidomaternoHijo = apellidosHijo[1];
      var fechaNacimiento = row.find('td:eq(2)').text();
      var edadHijo = row.find('td:eq(3)').text();




      $('#nombreHijo').val(nombreHijo);
      $('#apellidohijo').val(apellidoHijo);
      $('#apellidomaternohijo').val(apellidomaternoHijo);
      $('#fechaNacimiento').val(fechaNacimiento);
      $('#edadHijo').val(edadHijo);
      $('#tieneHijos').prop('checked', true);
      $('#datosHijo').show();
      $('#tabHijo').show();
  console.log('Nombre del hijo:', nombreHijo);
  console.log('Apellidos del hijo:', apellidosHijo);
  console.log('Apellido del hijo:', apellidoHijo);
  console.log('Apellido Materno del hijo:', apellidomaternoHijo);
  console.log('Fecha de Nacimiento del hijo:', fechaNacimiento);
  console.log('Edad del hijo:', edadHijo);

      // Eliminar la fila actual
      row.remove();
    });

    // Calcular automáticamente la edad del hijo
    $('#fechaNacimiento').change(function() {
      var fechaNac = new Date($(this).val());
      var hoy = new Date();
      var diff = hoy.getTime() - fechaNac.getTime();
      var edadAnios = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
      var mesesRestantes = diff % (1000 * 60 * 60 * 24 * 365.25);
      var edadMeses = Math.floor(mesesRestantes / (1000 * 60 * 60 * 24 * 30.44));

      $('#edadHijo').val(edadAnios + " años y " + edadMeses + " meses");

     
    });
  });

  $("#area").on('change', function(){
    let area_id=$(this).val();
    recargar_section(area_id);
  });

  $("#section").on('change', function(){
    let section_id=$(this).val();
    recargar_position(section_id);
  });  

  const recargar_section = (areaId) => {
    $.ajax({
      url: "layout/select_options/section.php",
      type: "POST",
      data: { areaId }
    }).done(function(response){
      $("#section").empty();
      $("#section").append('<option value="">- Seleccione -</option>');
      $("#section").append(response);
      console.log(response);
    });
  }

  const recargar_position = (sectionId) => {
    $.ajax({
      url: "layout/select_options/position.php",
      type: "POST",
      data: { sectionId }
    }).done(function(response){
      $("#position").empty();
      $("#position").append('<option value="">- Seleccione -</option>');
      $("#position").append(response);
      console.log(response);
    });
  }  

</script>
<script>
$(document).ready(function() {
    $('#fechaNacimientoconyuge').change(function() {
        var fechaNacimiento = new Date($(this).val());
        var hoy = new Date();
        var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        var mes = hoy.getMonth() - fechaNacimiento.getMonth();
        var dia = hoy.getDate() - fechaNacimiento.getDate();

        // Verificar si todavía no ha pasado el cumpleaños este año
        if (mes < 0 || (mes === 0 && dia < 0)) {
            edad--;
        }

        // Calcular la diferencia de meses
        var meses = (hoy.getMonth() + 12) - fechaNacimiento.getMonth();
        if (dia < 0) {
            meses--;
        }

        $('#edad').val(edad + " años y " + meses + " meses");
    });
});

</script>