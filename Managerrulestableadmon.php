<?php require 'nav.php'; ?>
<?php require 'layout/sidebarfinal.php';?>


 <style>

    .table th, .table td {
        text-align: center;
    }

    .table thead th {
        vertical-align: middle;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
        margin-bottom: 15px;
    }

    .table {
        font-size: 14px;
        color: #333;
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 12px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary, .table-primary > th, .table-primary > td {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover > td, .table-hover .table-primary:hover > th {
        background-color: #9fcdff;
    }


       /* Tus estilos aquí */

        /* Estilos para los botones de editar y eliminar */
        .btn-editar,
        .btn-eliminar {
            padding: 5px 10px;
            margin-right: 5px;
        }


          .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-guardar {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-guardar:hover {
            background-color: #218838;
        }
</style>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EMPACADOS INDICADORES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<body>

<div class="container mt-4">


  <!-- Pestañas -->
  <ul class="nav nav-tabs" id="pestanas" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Bonos</a>
    </li>
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

<div class="container">
    <br>
    <h2>Reglas de bono</h2>
    <div class="row">
        <div class="col-4 form-group">
            <label for="campo1">Todo lo mínimo
                <input type="checkbox" id="checkboxCampo1" name="checkboxCampo1">
                Rango mínimo
            </label>
            <input type="text" id="campo1" name="campo1" class="form-control">
        </div>
        <div class="col-4 form-group">
            <label for="campo2">Todo lo máximo
                <input type="checkbox" id="checkboxCampo2" name="checkboxCampo2">
                Rango máximo
            </label>
            <input type="text" id="campo2" name="campo2" class="form-control">
        </div>
        <div class="col-4 form-group">
            <label for="campo3"> Proporcional
                <input type="checkbox" id="checkboxCampo3" name="checkboxCampo3">
                Bono
            </label>
            <input type="text" id="campo3" name="campo3" class="form-control">
        </div>
    </div>
    <button class="btn btn-guardar">Guardar</button>
</div>



  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
  
      <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>    
                <th>Regla bono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>95% - 99% = 50%</td>
              <td> <button class="btn btn-primary btn-editar">Editar</button> </td> 
                <td><button class="btn btn-danger btn-eliminar">Eliminar</button> </td> 
            </tr>
            <tr>
                <td>100% o más = proporcional</td>
                <td> <button class="btn btn-primary btn-editar">Editar</button> </td> 
                <td><button class="btn btn-danger btn-eliminar">Eliminar</button> </td> 
            </tr>
            <tr>
                <td>100% o más = 100%</td>
                <td> <button class="btn btn-primary btn-editar">Editar</button> </td> 
                <td><button class="btn btn-danger btn-eliminar">Eliminar</button> </td> 
            </tr>
           
        </tbody>
        </table>

      </div>

    <!-- Agrega más contenidos de pestañas según sea necesario -->

  </div>
</div>

</div>
 


<script>
  $(document).ready(function() {
    // Configuración común para todas las tablas
    var commonConfig = {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ],
      language: {
        search: '<i class="fas fa-search"></i>',
        searchPlaceholder: 'Buscar...',
        lengthMenu: 'Mostrar _MENU_ registros por página',
        zeroRecords: 'No se encontraron registros',
        info: 'Mostrando página _PAGE_ de _PAGES_',
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtrados de un total de _MAX_ registros)',
        paginate: {
          first: 'Primera',
          previous: 'Anterior',
          next: 'Siguiente',
          last: 'Última'
        }
      }
    };

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

