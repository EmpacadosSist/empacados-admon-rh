<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Abrir Modal
</button>

<div class="form-group col-md-3">
    <label for="hasChildren">¿Tiene hijos?</label>
    <input type="checkbox" class="form-check-input" id="hasChildren" name="hasChildren">
</div>

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="openModalBtn" style="display: none;">
  Abrir Modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de los hijos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Edad</th>
               <th>Editar</th>

            </tr>
          </thead>
          <tbody id="tablaHijos">
            <!-- Aquí se agregarán las filas de la tabla -->
          </tbody>
        </table>
        <!-- Formulario para agregar un nuevo hijo -->
        <form id="formNuevoHijo">
          <div class="form-group">
            <input type="text" class="form-control" id="nombreHijo" placeholder="Nombre del hijo">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="edadHijo" placeholder="Edad del hijo">
          </div>
          <button type="submit" class="btn btn-primary">Agregar Hijo</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- Podrías agregar un botón de "Guardar" aquí si lo necesitas -->
      </div>
    </div>
  </div>
</div>

<!-- Modal para la edición de datos -->
<div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos del hijo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->
        <form id="formEditarHijo">
          <div class="form-group">
            <label for="nombreHijoEdit">Nombre del hijo:</label>
            <input type="text" class="form-control" id="nombreHijoEdit" placeholder="Nombre del hijo">
          </div>
          <div class="form-group">
            <label for="edadHijoEdit">Edad del hijo:</label>
            <input type="text" class="form-control" id="edadHijoEdit" placeholder="Edad del hijo">
          </div>
          <!-- Aquí puedes agregar campos adicionales para la edición si lo necesitas -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarEdicionBtn">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Pestañas -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contacto</a>
  </li>
</ul>

<!-- Contenido de las pestañas -->
<div class="tab-content" id="myTabContent">
  <!-- Pestaña Inicio -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    Contenido de la pestaña Inicio
  </div>

  <!-- Pestaña Perfil -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    Contenido de la pestaña Perfil
  </div>

<!-- Contenido de la pestaña Contacto -->
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
    </tr>
    </thead>
    <tbody id="tablaHijosPrincipal">
     <td>
    <button class="btn btn-primary editarBtn" data-nombre="Nombre" data-edad="Edad">Editar</button>
  </td>  
    </tbody>
  </table>
</div>
</div>


<script>
  // Función para manejar el envío del formulario y agregar un nuevo hijo a la tabla del modal y de la página principal
  document.getElementById('formNuevoHijo').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe y recargue la página
    var nombreHijo = document.getElementById('nombreHijo').value;
    var edadHijo = document.getElementById('edadHijo').value;

    // Verifica que se hayan ingresado valores válidos
    if (nombreHijo.trim() !== '' && edadHijo.trim() !== '') {
      // Crea una nueva fila para la tabla del modal
      var nuevaFilaModal = document.createElement('tr');
      nuevaFilaModal.innerHTML = '<td>' + nombreHijo + '</td><td>' + edadHijo + '</td>';
      // Agrega la fila a la tabla del modal
      document.getElementById('tablaHijos').appendChild(nuevaFilaModal);

      // Crea una nueva fila para la tabla de la página principal
      var nuevaFilaPrincipal = document.createElement('tr');
      nuevaFilaPrincipal.innerHTML = '<td>' + nombreHijo + '</td><td>' + edadHijo + '</td>';
      // Agrega la fila a la tabla de la página principal
      document.getElementById('tablaHijosPrincipal').appendChild(nuevaFilaPrincipal);

      // Limpia los campos del formulario
      document.getElementById('nombreHijo').value = '';
      document.getElementById('edadHijo').value = '';
    } else {
      alert('Por favor ingresa el nombre y la edad del hijo.');
    }
  });

// Función para manejar el evento de clic en el botón de editar en cada fila
function handleEditarClick(nombre, edad) {
  // Rellena los campos del formulario de edición con los datos de la fila seleccionada
  document.getElementById('nombreHijoEdit').value = nombre;
  document.getElementById('edadHijoEdit').value = edad;

  // Muestra el modal de edición
  $('#myModalEditar').modal('show');
}

// Asigna el evento de clic a cada botón de "Editar" en la tabla principal
document.querySelectorAll('#tablaHijosPrincipal .editarBtn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var nombre = this.dataset.nombre;
    var edad = this.dataset.edad;
    handleEditarClick(nombre, edad);
  });
});

// Función para manejar el envío del formulario de edición y actualizar la tabla
document.getElementById('formEditarHijo').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe y recargue la página
  
  // Obtiene los nuevos valores de nombre y edad desde el formulario de edición
  var nombreHijoEdit = document.getElementById('nombreHijoEdit').value;
  var edadHijoEdit = document.getElementById('edadHijoEdit').value;

  // Verifica que se hayan ingresado valores válidos
  if (nombreHijoEdit.trim() !== '' && edadHijoEdit.trim() !== '') {
    // Actualiza los valores en la tabla principal
    var filaActualizada = document.querySelector('#tablaHijosPrincipal td[data-nombre="' + nombreHijoEdit + '"]').parentNode;
    filaActualizada.innerHTML = '<td>' + nombreHijoEdit + '</td><td>' + edadHijoEdit + '</td><td><button class="btn btn-primary editarBtn" data-nombre="' + nombreHijoEdit + '" data-edad="' + edadHijoEdit + '">Editar</button></td>';
    
    // Limpia los campos del formulario
    document.getElementById('nombreHijoEdit').value = '';
    document.getElementById('edadHijoEdit').value = '';

    // Cierra el modal de edición
    $('#myModalEditar').modal('hide');
  } else {
    alert('Por favor ingresa el nombre y la edad del hijo.');
  }
});


</script>



</body>
</html>

<!-- Script para abrir el modal cuando se marca el checkbox -->
<script>
  document.getElementById('hasChildren').addEventListener('change', function() {
    // Verificar si el checkbox está marcado
    if (this.checked) {
      $('#myModal').modal('show'); // Abrir el modal
    }
  });
</script>