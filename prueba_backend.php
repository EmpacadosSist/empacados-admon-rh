<?php 
require_once('conexion/conexion.php');
require_once('helpers/consultas.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
  <h1>Prueba</h1>

    <script>

      const probar_vacac_multiple_update = () => {
        // si no se va a ocupar tipoMedioDia: '0', se puede omitir y el archivo actualizar_vacaciones_multiple.php lo recibe como NULL y el campo en la base de datos se queda como NULL
        let datos = {
          vacationsPeriodIds: '1,2,3,4,5,6',
          medioDia: '1',
          tipoMedioDia: '0'
        }
        
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('cambios/actualizar_vacaciones_multiple.php', {
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

      //probar_vacac_multiple_update();

      const probar_vacac_multiple_cancelar = () => {
        //esta funcion es para cancelar vacaciones, pasando como parametro los ids de los periodos de vacaciones
        let datos = {
          vacationsPeriodIds: '1,2,3,4,5,6'
        }
        
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('bajas/cancelar_vacaciones_multiple.php', {
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

      probar_vacac_multiple_cancelar();

      

      const probar_vacac_multiple = () => {
        //1,2,4,5,8,
        let datos = {
          userIds: '1,2,4,5,8,9',
          fechaInicio: '2025-03-24',
          fechaFin: '2025-03-28',
          tipoHorario: 'A',
          medioDia: '0',
          vacationsType: 'E',
          vacationsStatus: 'A'
        }
        
        let fd = new FormData();

        for(var key in datos){
          fd.append(key, datos[key]);
        }

        fetch('altas/subir_vacaciones_multiple.php', {
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

      //probar_vacac_multiple();


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