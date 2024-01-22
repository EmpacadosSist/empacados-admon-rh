<?php
require 'nav.php';
?>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bx bxs-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    <!-- aqui inicia sidebar -->




         <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-user-follow-fill"></i><span>Manager</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">      
           <li>
            <a class="bi bi-person-fill-add"  href="rhaltaempleadoadmon.php">
              <i  ></i><span>Alta Empleados</span>
            </a>
          <li>
          <li>
              <a class="bi bi-people-fill"  href="tables-data.php">
              <i  ></i><span>Empleados</span>
            </a>
          </li>
           <li>
            <a class="bi bi-person-vcard-fill"  href="rhposicionesadmon.php">
              <i  ></i><span>Posiciones</span>
            </a>
          </li>
            <li>
            <a class="bi bi-diagram-3-fill active"  href="rhorganigramaadmon.php">
              <i  ></i><span>Organigrama</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->



    
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/vis-network/standalone/umd/vis-network.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
  <title>Organigrama Relacional</title>
  <style>

       body {
      margin: 0;
      padding: 0;
      overflow: hidden; /* Evitar scroll horizontal */
      display: flex; /* Utilizar el modelo de caja flexible para el cuerpo */
    }
       #network-container {
      flex: 1; /* El contenedor del organigrama se expandirá para llenar el espacio restante */
      height: 100vh;
    }

    #network {
      height: 97vh;
      width: 100%; /* Ancho del 100% del contenedor padre */
      max-width: 2040px; /* Ajusta el valor según sea necesario */
    }

    .modal-dialog {
      max-width: 800px;
    }

    .modal-body img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>

      <h1 class="text-center mt-4">Organigrama Relacional</h1>
      <div id="network"></div>


<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="employeeModalImage" src="" alt="Employee Photo">
        <p id="employeeModalDescription"></p>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const nodes = new vis.DataSet([
      { id: 1, label: 'CEO\nJohn Doe', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 2, label: 'Manager\nAlice Johnson', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 3, label: 'Employee\nEva White', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 4, label: 'Employee\nBob Smith', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 5, label: 'Employee\nJane Doe', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 6, label: 'Employee\nMike Johnson', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 7, label: 'Employee\nEmily White', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 8, label: 'Employee\nCharlie Smith', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 9, label: 'Employee\nOlivia Doe', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 10, label: 'Employee\nDavid Johnson', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 11, label: 'Employee\nEva White', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 12, label: 'Employee\nBob Smith', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 13, label: 'Employee\nJane Doe', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 14, label: 'Employee\nMike Johnson', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 15, label: 'Employee\nEmily White', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 16, label: 'Employee\nCharlie Smith', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 17, label: 'Employee\nOlivia Doe', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 18, label: 'Employee\nDavid Johnson', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 19, label: 'Employee\nEva White', shape: 'image', image: 'https://placekitten.com/120/120' },
      { id: 20, label: 'Employee\nBob Smith', shape: 'image', image: 'https://placekitten.com/120/120' },
       ]);

    const edges = new vis.DataSet([
      { from: 1, to: 2 },
      { from: 2, to: 3 },
      { from: 2, to: 4 },
      { from: 2, to: 5 },
      { from: 2, to: 6 },
      { from: 2, to: 7 },
      { from: 1, to: 8 },
      { from: 8, to: 9 },
      { from: 8, to: 10 },
      { from: 8, to: 11 },
      { from: 8, to: 12 },
      { from: 8, to: 13 },
      { from: 8, to: 14 },
      { from: 1, to: 15 },
      { from: 15, to: 16 },
      { from: 15, to: 17 },
      { from: 15, to: 18 },
      { from: 15, to: 19 },
      { from: 15, to: 20 },
    ]);


    const container = document.getElementById('network');
    const data = { nodes, edges };
    const options = {
      layout: {
        hierarchical: {
          direction: 'UD',
          levelSeparation: 100, // Ajusta el valor según sea necesario
          nodeSpacing: 100,     // Ajusta el valor según sea necesario
        },
      },
    };

    const network = new vis.Network(container, data, options);

    network.on('click', function (event) {
      const { nodes } = event;
      if (nodes.length > 0) {
        const node = nodes[0];
        const selectedNode = nodes.get(node);
        showModal(selectedNode);
      }
    });

    function showModal(node) {
      const modalTitle = document.getElementById('employeeModalLabel');
      const modalImage = document.getElementById('employeeModalImage');
      const modalDescription = document.getElementById('employeeModalDescription');

      modalTitle.textContent = node.label.split('\n')[1];
      modalImage.src = node.image;
      modalDescription.textContent = node.label.split('\n')[0];

      $('#employeeModal').modal('show');
    }
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




