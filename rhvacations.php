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
<?php require 'layout/sidebar.php';?>
<?php require 'nav.php'; ?>


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

<!-- Modal -->
<div id="modalEmpleado" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Empleado Semanal o Quincenal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->
        <div class="mb-3">
          <label for="tipoEmpleado" class="form-label">Tipo de Empleado:</label>
          <select class="form-select" id="tipoEmpleado">
            <option value="semanal">Empleado Semanal</option>
            <option value="quincenal">Empleado Quincenal</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
           <div class="container mt-5" align="left">
           <br>
    <form id="form_id" method="post" action="pdfpuesto.php">
        <h2  align="" id="title" class="animate__animated animate__bounceInDown card-title">
                Datos de Empleado
           <img src="assets/img/empleadoempacados.png" alt="" width="60">
        </h2>
     <div class="form-row">
     <table class="mdl-data-table" id="myTable" style="font-size:74%;">
       <thead>
          <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Oficina</th>
            <th>Edad</th>
            <th>Fecha de inicio</th>
            <th>Salario</th>
        </tr>
        </thead>
         <tbody>
            <tr>

                <td><a href="prueba1.php"><img src="assets/img/idempleado.png" width="35" height="35" alt="mas"></a>Kimberly Blanco</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                 <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012-12-02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012-08-06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010-10-14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009-09-15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008-12-13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008-12-19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013-03-03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008-10-16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012-12-18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010-03-17</td>
                <td>$385,750</td>
            </tr>
          
        </tbody>
      
    </table>
          


    </div>
    </div>





                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

</html>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <!-- Aquí puedes agregar los campos para ingresar los datos del hijo -->
    <p>Ingrese los datos del hijo:</p>
    <!-- Por ejemplo -->
    <input type="text" id="nombreHijo" placeholder="Nombre del hijo">
    <input type="text" id="edadHijo" placeholder="Edad del hijo">
    <button id="guardarHijo">Guardar</button>
  </div>
</div>



<style type="text/css">
  
       <style>
       .medium-button {
        font-size: 10px;
        padding: 11px 21px;
        background-color: #e61d1dbf; /* Replace with your desired color code */
        font-weight: bold;

      }
    </style>
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

    function updateDepartments() {
      var area = document.getElementById('work_area').value;
      var departmentSelect = document.getElementById('department');
      var positionsSelect = document.getElementById('position');

      // Limpiar opciones actuales
      departmentSelect.innerHTML = '';
      positionsSelect.innerHTML = '';

      // Agregar nuevas opciones para el departamento
      departmentsByArea[area].forEach(function (department) {
        var option = document.createElement('option');
        option.value = department;
        option.text = department;
        departmentSelect.add(option);
      });

      // Llamar a la función de actualización de puestos para inicializar los puestos
      updatePositions();
    }

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

<script>
    // JavaScript para habilitar o deshabilitar el campo de texto según el estado del checkbox
    document.getElementById('hasChildren').addEventListener('change', function() {
        var childrenInput = document.getElementById('children');
        childrenInput.disabled = !this.checked;
        if (!this.checked) {
            childrenInput.value = '';  // Limpiar el campo si el checkbox no está marcado
        }
    });
</script>

<script>
document.getElementById('children').addEventListener('change', function() {
    var numHijos = parseInt(this.value);
    if (numHijos >= 4 && numHijos <= 6) {
        // Mostrar el modal
        var modal = document.getElementById('myModal');
        modal.style.display = "block";
        
        // Agregar un evento al botón de guardar en el modal
        document.getElementById('guardarHijo').addEventListener('click', function() {
            // Aquí puedes obtener los datos ingresados del hijo
            var nombreHijo = document.getElementById('nombreHijo').value;
            var edadHijo = document.getElementById('edadHijo').value;
            
            // Aquí puedes hacer lo que necesites con los datos del hijo, como enviarlos a un servidor
            
            // Cerrar el modal
            modal.style.display = "none";
        });
        
        // Agregar un evento para cerrar el modal si se hace clic en la "X"
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    }
});
</script>

</body>
<?php require 'layout/footer.php';?>

</html>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
