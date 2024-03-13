<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal para ingresar nombre y edad</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="mostrarModal">
    <label class="form-check-label" for="mostrarModal">
      Mostrar Modal
    </label>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar Nombre y Edad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="nombre" class="font-weight-bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group">
            <label for="edad" class="font-weight-bold">Edad:</label>
            <input type="number" class="form-control" id="edad" placeholder="Ingrese su edad">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarDatos">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="container mt-5">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody id="tablaDatos">
      <!-- Aquí se mostrarán los datos ingresados -->
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#mostrarModal').click(function() {
      $('#exampleModal').modal('toggle');
    });

    $('#guardarDatos').click(function() {
      var nombre = $('#nombre').val();
      var edad = $('#edad').val();

      if ($('#guardarDatos').text() == 'Guardar') {
        $('#tablaDatos').append('<tr><td>' + nombre + '</td><td>' + edad + '</td><td><button class="btn btn-danger eliminar">Eliminar</button> <button class="btn btn-primary editar">Editar</button></td></tr>');
      } else {
        var filaEditada = $('#guardarDatos').attr('fila-editada');
        $('#tablaDatos tr').eq(filaEditada).find('td').eq(0).text(nombre);
        $('#tablaDatos tr').eq(filaEditada).find('td').eq(1).text(edad);
        $('#guardarDatos').text('Guardar');
      }

      $('#nombre').val('');
      $('#edad').val('');
    });

    // Evento para eliminar una fila
    $('#tablaDatos').on('click', '.eliminar', function() {
      $(this).closest('tr').remove();
    });

    // Evento para editar una fila
    $('#tablaDatos').on('click', '.editar', function() {
      var nombre = $(this).closest('tr').find('td').eq(0).text();
      var edad = $(this).closest('tr').find('td').eq(1).text();

      $('#nombre').val(nombre);
      $('#edad').val(edad);

      var filaEditada = $(this).closest('tr').index();
      $('#guardarDatos').attr('fila-editada', filaEditada);
      $('#guardarDatos').text('Actualizar');
      $('#exampleModal').modal('show');
    });
  });
</script>

</body>
</html>
