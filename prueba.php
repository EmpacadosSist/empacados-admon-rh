<?php 
  session_name('rh_admon');
  session_start();
	if(isset($_SESSION['identity'])){
		unset($_SESSION['identity']);
	}
	if(isset($_SESSION['permisos'])){
		unset($_SESSION['permisos']);
	}		

	header("Location: index.php");
?>
<?php require 'nav.php'; ?>
<?php require 'layout/sidebar.php';?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Animated Table Row</title>
<style>
    /* Define la transición que se aplicará cuando cambie el número de empleado */
    .employee-number {
        transition: background-color 0.5s ease;
    }
</style>
</head>
<body>

<table>
    <tr>
        <td><i class="fas fa-id-card"></i> No. de empleado</td>
        <!-- Añade una clase al label para poder seleccionarlo con CSS -->
        <td><label for="employeeNumber" class="employee-number">4344</label></td>
    </tr>
</table>

<!-- Agrega el enlace a Font Awesome para que el ícono se muestre correctamente -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    // Aquí puedes agregar algún código JavaScript si deseas cambiar dinámicamente el número de empleado
    // Por ejemplo:
    // document.querySelector('.employee-number').textContent = 'Nuevo número de empleado';
</script>

</body>
</html>
