<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal y Tab Content</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <style type="text/css">
    /* Estilos para reducir el tamaño de la fuente */
    .modal-content,
    select,
    input,
    .form-check-label,
    .btn {
      font-size: 12px; /* Tamaño de fuente reducido */
    }

    /* Estilos para alinear el checkbox con el texto */
    .form-check-inline .form-check-input {
      margin-top: 0; /* Ajusta el margen superior del checkbox */
    }

    /* Estilos para reducir el tamaño de los inputs */
    input[type="text"],
    input[type="number"],
    select,
    .form-check-input {
      height: 30px; /* Altura de los inputs */
      font-size: 12px; /* Tamaño de fuente reducido */
      padding: 6px 10px; /* Espacio interno de los inputs */
    }

    /* Estilos para ajustar el tamaño de los botones */
    .btn {
      padding: 4px 12px; /* Espacio interno de los botones */
      height: 30px; /* Altura de los botones */
    }

    /* Estilos para reducir el tamaño del modal */
    .modal-dialog {
      max-width: 80%; /* Ajusta el ancho máximo del modal */
    }

    /* Ajustes adicionales */
    .form-group {
      margin-bottom: 1rem; /* Espacio entre grupos de formulario */
    }

    input[type="text"],
    input[type="number"],
    select,
    .form-check-input {
      height: 32px; /* Altura ligeramente aumentada */
      font-size: 13px; /* Tamaño de fuente ajustado */
      padding: 5px 10px; /* Espacio interno ajustado */
    }

    .form-check-label {
      margin-bottom: 6px; /* Espacio entre etiqueta y checkbox */
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="form-group col-md-6">
    <label for="estadoCivil">Estado civil</label>
    <select class="form-control" id="estadoCivil">
      <option value="soltero" id="soltero">Soltero(a)</option>
      <option value="unionLibre" id="unionLibre">Unión Libre</option>
      <option value="casado">Casado(a)</option>
    </select>
  </div>
</div>

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

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
</body>
</html>
