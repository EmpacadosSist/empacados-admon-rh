<?php require 'layout/libreriasdatatable.php';?>

<?php require 'nav.php'; ?>
<?php require 'layout/sidebar.php';?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
    .profile-img-container {
        width: 231px;
        height: 221px;
        border-radius: 60%;
        overflow: hidden;
        margin: -7px auto -44px;
    }
    .profile-img-container:hover {
        transform: scale(1.1);
        transition: transform 0.1s ease;
    }
    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .cv-section {
        background-color: #fff;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-title {
        padding: -5px 0 15px 0;
        font-size: 18px;
        font-weight: 500;
        color: #1c4794;
    }
    .cv-section {
        background-color: #fff;
        padding: 32px;
        margin-bottom: 9px;
        border-radius: 17px;
        box-shadow: 0 0 4px rgb(227 223 223 / 10%);
    }
    body {
        font-family: "Open Sans", sans-serif;
        background: #052668;
        color: 'black;';
    }
    .mb-3, .my-3 {
        margin-bottom: -3rem!important;
    }
    .table td, .table th {
        padding: -2.35rem;
        vertical-align: top;
        border-top: 1px solid #000d1a;
    }
     #dataTable {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<main id="main" class="main">
  

    <div class="row">
        <div class="col-lg-12">    
            <div class="cv-section">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="profile-img-container">
                            <img src="assets/img/profile-img.jpg" class="profile-img" alt="Foto del Empleado">
                        </div>
                    </div>                        

                    <div class="col-lg-10">
                        <p class="d-flex justify-content-end mb-6 card-title" style="font-size: 1.25rem;"><img src="assets/img/businessman.png" width="50" height="50" alt="Arroz" >Director del Área: Francisco Velarde</p>
                        <p class="d-flex justify-content-end mb-6 card-title">  <img src="assets/img/businessman1.png" width="50" height="50" alt="Arroz" >Líder del Departamento: Edgar Ruelas</p>
                    </div>          
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <button id="editarButton" class="btn btn-primary me-2" data-edit="edit">Editar</button>
                    <button id="eliminarButton" class="btn btn-danger me-2">Eliminar</button>
                    <button id="guardarButton" class="btn btn-success">Guardar</button>
                </div>

                <table id="dataTable" class="table-no-border center">
                   <br><br><br>
                    <div style="text-align: left;">
                        <img src="assets/img/arroz12.png" width="215" height="50" alt="Arroz" id="as">
                    </div>
    <h3 id="title" class="card-title" >
            <!-- Imagen 1 -->
            <img src="assets/img/Capturalog.ico" alt="" width="30">Información Personal
            <!-- Imagen 2 -->
            <img src="assets/img/cv.png" alt="" width="60">
        </h3>                    <tr>
                        <td><i class="fas fa-id-card"></i> No. de empleado</td>
                        <td><label for="employeeNumber">4344</label></td>
                    </tr>
                      <tr>
                            <td><i class="fas fa-user"></i> Apellido Paterno</td>
                            <td><label for="lastName">Medrano</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user"></i> Apellido Materno</td>
                            <td><label for="middleName">Perez</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user"></i> Nombre(s)</td>
                            <td><label for="firstName">Juan</label></td>
                        </tr>
                       <tr>
                            <td><i class="fas fa-calendar-alt"></i> Fecha de ingreso</td>
                            <td><label for="hireDate">2023-05-12</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-file-contract"></i> Contrato</td>
                            <td><label for="contract">Temporal</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-briefcase"></i> Puesto</td>
                            <td><label for="position">Analista de Datos</label></td>
                        </tr>

                        <tr>
                            <td><i class="fas fa-building"></i> Departamento</td>
                            <td><label for="department">Recursos Humanos</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-building"></i> Área</td>
                            <td><label for="area">Administrativa</label></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-coins"></i> Centro de Costos</td>
                            <td><label for="costCenter">CC123</label></td>
                        </tr>
                          <tr>
                             <td><i class="fas fa-birthday-cake"></i> Edad</td>
                             <td><label for="age">25</label></td>
                          </tr>
                           <tr>
                            <td><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</td>
                            <td><label for="datebirthday">12 de mayo de 1990</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-globe"></i> Lugar de Nacimiento</td>
                            <td><label for="placebirth">Madrid, España</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-venus-mars"></i> Sexo</td>
                            <td><label for="sex">Masculino</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-heart"></i> Estado civil</td>
                            <td><label for="married">Casado</label></td>
                          </tr>
                          <tr>
                            <td>¿Tiene hijos?</td>
                            <td><label for="hasChildren">Sí</label></td>
                          </tr>
                          <tr>
                            <td>Número de hijos</td>
                            <td><label for="children">2</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-shield-alt"></i> NSS</td>
                            <td><label for="socialSecurityNumber">1234567890</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-id-card"></i> CURP</td>
                            <td><label for="curp">CURP1234567890</label></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-id-card-clip"></i> RFC</td>
                            <td><label for="rfc">RFC1234567890</label></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-passport"></i>Código postal</td>
                            <td><label for="rfcPostalCode">12345</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-map"></i> Calle y número</td>
                            <td><label for="streetAndNumber">Calle Ejemplo 123</label></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-map-location"></i> Colonia</td>
                            <td><label for="colony">Colonia Ejemplo</label></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-magnifying-glass-location"></i> Municipio</td>
                            <td><label for="municipality">Municipio Ejemplo</label></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-map-marker-alt"></i> Estado</td>
                            <td> <label for="state"> Estado Ejemplo</label></td>
                          </tr>   
                           <tr>
                                <td><i class="fas fa-tshirt"></i> Talla de Camisa</td>
                                <td><label for="age">m</label></td>
                            </tr>
                            <tr>
                                <td><img src="assets/img/pantalones.png" width="20px"> Talla de Pantalón</td>
                                <td><label for="datebirtdday">32</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-shoe-prints"></i> Talla de Calzado</td>
                                <td><label for="placebirtd">10</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-heartbeat"></i> Enfermedades Crónicas</td>
                                <td><label for="">Ninguna</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-allergies"></i> Alergias</td>
                                <td><label for="">Polen</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-pills"></i> Toma algún medicamento</td>
                                <td><label for="">Ninguno</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-phone-alt"></i> Contacto de emergencia</td>
                                <td><label for="emergencyContact">555-123-4567</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-phone-alt"></i> Contacto de emergencia 2</td>
                                <td><label for="emergencyContact2">555-987-6543</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-money-bill-wave"></i> Sueldo base</td>
                                <td><label for="">$1000</label></td>
                            </tr>
                            <tr>
                                <td><i class="fa-solid fa-coins"></i> Tipo de Pago</td>
                                <td><label for="paymentType">Débito</label></td>
                            </tr>
                            <tr>
                                <td><i class="fa-solid fa-utensils"></i> Bonos de despensa</td>
                                <td><label for="foodAllowance">$200</label></td>
                            </tr>
                            <tr>
                                <td><i class="fa-solid fa-piggy-bank"></i> Fondo de ahorro (Quincenales)</td>
                                <td><label for="">$50</label></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-money-check"></i> Banco</td>
                                <td><label for="">Banco XYZ</label></td>
                            </tr>
                            <tr>
                                <td><i class="fa-solid fa-money-check-dollar"></i> Cuenta bancaria</td>
                                <td><label for="">1234567890</label></td>
                            </tr> 
                </table>
            </div>
        </div>
    </div>
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>

<!-- Scripts al final del archivo -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#editarButton').click(function() {
        if ($(this).data('edit') === 'edit') {
            $('#dataTable').find('td').each(function() {
                var label = $(this).find('label');
                var labelText = label.text();
                label.replaceWith('<input type="text" value="' + labelText + '">');
            });
            $(this).data('edit', ''); // Cambiar el atributo data-edit a vacío para indicar que se están editando los campos
        } else {
            $('#dataTable').find('input').each(function() {
                var input = $(this);
                var inputValue = input.val();
                input.replaceWith('<label>' + inputValue + '</label>');
            });
            $(this).data('edit', 'edit'); // Cambiar el atributo data-edit a 'edit' para indicar que se están restaurando los campos
        }
    });
});

</script>
<script>
    $(document).ready(function() {
        $('#as').addClass('animate__animated animate__fadeInLeft');
    });
</script>
