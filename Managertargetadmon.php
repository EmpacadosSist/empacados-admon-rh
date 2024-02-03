<?php require 'nav.php'; ?>
<?php require 'sidebarfinal.php';?>

 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla con DataTables</title>
  <!-- Incluye jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Incluye DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<style>
  #miTabla {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
  }

  #miTabla th, #miTabla td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }

  #miTabla th {
    background-color: #4CAF50;
    color: white;
  }

  #miTabla tbody tr:hover {
    background-color: #f5f5f5;
  }

  #miTabla button {
    padding: 8px 12px;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
  }

  #miTabla button:hover {
    background-color: #45a049;
  }
</style>


<style>
    textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 5px;
      resize: vertical; /* Permite redimensionar verticalmente */
    }

    textarea:focus {
      border-color: #4CAF50;
      outline: none;
    }

    /* Estilos adicionales para resaltar el área de enfoque */
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
  </style>
 <style>
    .btn-agregar {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      text-align: center;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-agregar:hover {
      background-color: #45a049;
    }
  </style>
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>AGREGAR OBJETIVO</h1>
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
      <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">OBJETIVOS</a>
    </li>
   
    <!-- Agrega más pestañas según sea necesario -->
  </ul>

  <!-- Contenido de las pestañas -->
  <div class="tab-content" id="contenidoPestanas">
    <!-- Contenido de la Pestaña 1 -->
    
<label for="miTextarea">Comentario:</label>
  <textarea id="miTextarea" rows="4" placeholder="Escribe aquí tu comentario"></textarea>
  <button class="btn-agregar">Agregar</button>


       
   <table id="miTabla" border="1">
  <thead>
    <tr>
      <th>Objetivos</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Objetivo 1</td>
      <td><button onclick="editarFila(1)">Editar</button></td>
      <td><button onclick="eliminarFila(1)">Eliminar</button></td>
    </tr>
    <tr>
      <td>Objetivo 2</td>
      <td><button onclick="editarFila(2)">Editar</button></td>
      <td><button onclick="eliminarFila(2)">Eliminar</button></td>
    </tr>
 
  </tbody>
</table>


    <!-- Agrega más contenidos de pestañas según sea necesario -->

  </div>
</div>

</div>
 <script>
  $(document).ready(function() {
    $('#miTabla').DataTable();
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

