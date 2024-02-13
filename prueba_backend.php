<?php 
require_once('conexion/conexion.php');
require_once('helpers/consultas.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
    Esto es una prueba
    -----------------------
    <br>
    <?php 
      
      $res=Consultas::listUsers($conn);
      foreach ($res as $valor){
        echo $valor['numEmpleado'];
        echo "<br>";
        echo $valor['nombreCompleto'];
        echo "<br>";
        echo $valor['nivel'];
        echo "<br>";
        echo $valor['puesto'];
        echo "<br>";
        echo $valor['fechaIngreso'];
        echo "<br>";
        echo $valor['correo'];
        echo "<br>";
        echo $valor['variable'];
        echo "<br>";
        echo "------------------------------";
        echo "<br>";
      }
    ?>
    <button onclick="subir_autorizacion()">Probar</button>
    <script>

      const subir_autorizacion = () => {
        let datos = {
          authorizationName: "Autorizacion de prueba"
        }
        
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('altas/subir_autorizacion.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          console.log(data);
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })

      }


const subir_objetivo = () => {
        let datos = {
          activityName: "Soporte a SAP",
          positionId: 2,
          defaultPer: "20"
        }
        
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('altas/subir_objetivo.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          console.log(data);
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })

      }

      const subir_actualizar = () => {
        let datos = { 
          fullName: "Roberto Reyes",
          email: "aux2.sistemas@empacados.com",
          empNum: "411203",
          positionId: 3,
          paymentVar: 1000.00,
          recDate: "20220901"
        }
  
        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }
        
        fetch('altas/subir_actualizar_empleado.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          console.log(data);
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })
      }


      const subir_autorizacion_usuario = () => {
        let datos = {
          authorizationId: "4",
          userId: "6"
        }
  
        let fd = new FormData();
        for(var key in datos){
          fd.append(key, datos[key]);
        }
        
        fetch('altas/subir_autorizacion_usuario.php', {
          method: "POST",
          body: fd
        })
        .then(response => {
          return response.ok ? response.json() : Promise.reject(response);
        })
        .then(data => {
          console.log(data);
        })
        .catch(err => {
          let message = err.statusText || "Ocurrió un error";
          console.log(err);
        })
      }      

      console.log("prueba");
    </script>
  </body>
</html>