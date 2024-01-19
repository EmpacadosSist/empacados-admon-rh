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
    <button onclick="subir_actualizar()">Probar</button>
    <script>

      const subir_actualizar = () => {
        let datos = {
          userId: 4, 
          fullName: "Armin Arlert",
          email: "aux2.sistemas@empacados.com",
          levelId: 4,
          empNum: "411206",
          positionId: 1,
          paymentVar: 993.50,
          recDate: "20231106"
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

      const reenviar_pass = () => {
        let datos = {
          userId: 1,
          email: "aux2.sistemas@empacados.com",
          empNum: "411203"
        }

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }        

        fetch('cambios/reenviar_pass.php', {
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

      const actualizar_var = () => {
        let datos = {
          userId: 1,
          paymentVar: 995.50
        }

        let fd = new FormData();
        
        for(var key in datos){
          fd.append(key, datos[key]);
        }        

        fetch('cambios/actualizar_variable.php', {
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

    </script>
  </body>
</html>