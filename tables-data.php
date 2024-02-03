<?php require 'nav.php'; ?>
<?php require 'sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS EMPLEADOS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Empleados</h5>
            
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ombre
                    </th>
                    <th>Contacto</th>
                    <th>Estatus</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Cumpleaños</th>
                    <th>Ingreso</th>
                     <th>Acciones</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Unity Pugh</td>
                    <td>9958</td>
                    <td>Curicó</td>
                    <td>2005/02/11</td>
                    <td>37%</td>
 <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar1">
          <i class="bi bi-pencil-square"></i>
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar1">
          <i class="bi bi-trash-fill"></i>
        </button>
      </td>
                          </tr>
                  <tr>
                    <td>Theodore Duran</td>
                    <td>8971</td>
                    <td>Dhanbad</td>
                    <td>1999/04/07</td>
                    <td>97%</td>
                  </tr>
                  <tr>
                    <td>Kylie Bishop</td>
                    <td>3147</td>
                    <td>Norman</td>
                    <td>2005/09/08</td>
                    <td>63%</td>
                  </tr>
                  <tr>
                    <td>Blossom Dickerson</td>
                    <td>5018</td>
                    <td>Kempten</td>
                    <td>2006/11/09</td>
                    <td>17%</td>
                  </tr>
                  <tr>
                    <td>Mira Rocha</td>
                    <td>4393</td>
                    <td>Port Harcourt</td>
                    <td>2002/04/10</td>
                    <td>14%</td>
                  </tr>
                  <tr>
                    <td>Drew Phillips</td>
                    <td>2931</td>
                    <td>Goes</td>
                    <td>2011/18/10</td>
                    <td>58%</td>
                  </tr>
                                
                  <tr>
                    <td>Zelenia Roman</td>
                    <td>7516</td>
                    <td>Redwater</td>
                    <td>2012/03/03</td>
                    <td>31%</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


<!-- Modales -->
<style type="text/css">
  
<style scoped>
/* Estilos personalizados para el modal */
.modal-header {
  background-color: #343a40; /* Fondo oscuro */
  color: #ffffff; /* Texto blanco */
  border-bottom: 1px solid #454d55; /* Borde inferior más oscuro */
}

.modal-title {
  font-size: 1.5rem; /* Tamaño de fuente más grande */
}

.btn-close {
  color: #ffffff; /* Color del botón cerrar */
}

/* Estilo para las pestañas (tabs) */
.nav-tabs {
  border-bottom: 1px solid #343a40; /* Borde inferior más oscuro */
}

.nav-link {
  color: 'black;'; /* Color de texto blanco */
}

.nav-link.active {
  background-color: #495057; /* Fondo más oscuro para la pestaña activa */
  border-color: #495057 #495057 #343a40; /* Borde más oscuro en la pestaña activa */
}

/* Estilos para el contenido de las pestañas */
.tab-content {
  background-color: #f8f9fa; /* Fondo gris claro */
  padding: 15px; /* Espaciado interno */
  border: 1px solid #dee2e6; /* Borde más claro */
  border-top: 0; /* Elimina el borde superior */
}

/* Estilo para el cuerpo del modal */
.modal-body {
  padding: 20px; /* Aumenta el espaciado interno */
}

/* Estilos para el pie del modal */
.modal-footer {
  background-color: #343a40; /* Fondo oscuro */
  border-top: 1px solid #454d55; /* Borde superior más oscuro */
  padding: 15px; /* Espaciado interno */
}

/* Color de fondo para la pestaña activa */
.tab-pane.active {
  background-color: #f8f9fa; /* Fondo gris claro */
}
</style>

</style>

<div class="modal fade" id="modalEditar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- Contenido del modal para editar -->
  <div class="modal-dialog modal-dialog-slideout">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Imagen en el encabezado -->
        <img src="ceo.jpg" alt="Encabezado" class="img-fluid" style="max-height: 100px;">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Pestañas (tabs) -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="datos-tab" data-bs-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Datos</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="imagen-tab" data-bs-toggle="tab" href="#imagen" role="tab" aria-controls="imagen" aria-selected="false">Imagen</a>
          </li>
        </ul>
        <!-- Contenido de las pestañas -->
        <div class="tab-content mt-2">
          <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <!-- Formulario de edición con campos prellenados -->
            <form>
              <div class="mb-3">
                <label for="nombreEdit" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombreEdit" value="Unity Pugh">
              </div>
              <div class="mb-3">
                <label for="contactoEdit" class="form-label">Contacto:</label>
                <input type="text" class="form-control" id="contactoEdit" value="9958">
              </div>
              <!-- Otros campos... -->
            </form>
          </div>
          <div class="tab-pane fade" id="imagen" role="tabpanel" aria-labelledby="imagen-tab">
            <!-- Contenido de la pestaña de imagen -->
            <p>Aquí puedes agregar el contenido relacionado con la imagen del empleado.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEliminar1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<!-- Contenido del modal para eliminar -->
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <p>¿Estás seguro de que deseas eliminar al empleado "Unity Pugh"?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      <button type="button" class="btn btn-danger">Eliminar</button>
    </div>
  </div>
</div>
</div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>


  
