<?php require 'nav.php'; ?>
<?php require 'sidebar.php';?>


  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<body>

<!-- Aquí agregamos el formulario de alta de empleados -->
 <div class="container container-form mt-2">
    <h2>Alta de Empleados</h2>
    <form id="altaEmpleadoForm">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
      </div>
      <div class="mb-3">
        <label for="posicion" class="form-label">Posición:</label>
        <input type="text" class="form-control" id="posicion" name="posicion" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" pattern="[0-9]{10}">
        <small class="form-text text-muted">Ingrese el número de teléfono sin espacios ni guiones.</small>
      </div>
      <div class="mb-3">
        <label for="avatar" class="form-label">Avatar:</label>
        <input type="file" class="form-control-file" id="avatar" name="avatar">
        <small class="form-text text-muted">Selecciona una imagen de perfil.</small>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <button type="reset" class="btn btn-secondary">Limpiar</button>
    </form>
  </div>

 <!-- Datagrid para mostrar los empleados -->
  <div class="container mt-4">
    <h2>Lista de Empleados</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Posición</th>
          <th>Correo Electrónico</th>
          <th>Teléfono</th>
          <th>Avatar</th>
        </tr>
      </thead>
      <tbody id="empleadosTableBody">
        <!-- Aquí se llenarán dinámicamente los datos de los empleados -->
      </tbody>
    </table>
  </div>

<!-- Script para manejar el envío del formulario y la actualización de la datagrid -->
 <!-- Script para manejar el envío del formulario y la actualización de la datagrid -->
  <script>
    document.getElementById('altaEmpleadoForm').addEventListener('submit', function(event) {
      event.preventDefault();

      // Obtener datos del formulario
      var nombre = document.getElementById('nombre').value;
      var apellido = document.getElementById('apellido').value;
      var posicion = document.getElementById('posicion').value;
      var email = document.getElementById('email').value;
      var telefono = document.getElementById('telefono').value;
      var avatar = document.getElementById('avatar').value; // Aquí se debería manejar el archivo de imagen

      // Agregar datos a la datagrid
      var empleadosTableBody = document.getElementById('empleadosTableBody');
      var newRow = empleadosTableBody.insertRow();
      newRow.innerHTML = `<td>${nombre}</td><td>${apellido}</td><td>${posicion}</td><td>${email}</td><td>${telefono}</td><td><img src="${avatar}" class="avatar" alt="Avatar"></td>`;

      // Limpiar formulario
      document.getElementById('altaEmpleadoForm').reset();
    });
  </script>
          




</body>
</html>


 <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- PRUEBA JAVASCRIPT-->
<script>
  // Definir una variable
var texto = window.location.pathname;
// Recortar los primeros 5 caracteres
var resultado = texto.substring(20);
//console.log(resultado); // Salida: "Hola,"
  // Obtener la ruta de la página actual
  // Obtener todos los elementos de la lista
  var sidebarLinks = document.querySelectorAll('#sidebar-nav a');

  // Iterar sobre los elementos y agregar la clase 'active' si coincide con la página actual
  sidebarLinks.forEach(function (link) {
    if (link.getAttribute('href') === resultado) {
      link.classList.add('active');
    }
  });
</script>
