<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
    Esto es una prueba
    <script>
      let datos = {
        fullName: "Roberto Reyes",
        email: "aux2.sistemas@empacados.com",
        levelId: 4,
        empNum: "411203",
        positionId: 1,
        paymentVar: 1000,
        recDate: "20220901"
      }

      let fd = new FormData();
      
      for(var key in datos){
        fd.append(key, datos[key]);
      }
      
      fetch('altas/subir_empleado.php', {
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
    </script>
  </body>
</html>