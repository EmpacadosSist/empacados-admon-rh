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
    
    <?php
    		$message =	'<center style="background-color:#F2F2F2;">';
        $message .= '<table border="0" cellpadding="5px" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">';
        
        $message .= '<tr>';

        $message .= '<td>';
        $message .= '</td>';                        
        $message .= '<td>';
        $message .= '<b>No. de empleado:</b> 150024';		
        $message .= '</td>';        
        $message .= '<td>';
        $message .= '</td>';        
        
        $message .= '</tr>';		
        
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';                
        $message .= '<td>';
        $message .= '<b>Nombre:</b> Roberto Carlos Reyes Medrano';		
        $message .= '</td>';
        $message .= '<td>';
        $message .= '</td>';                
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '<td>';
        $message .= '<b>Puesto:</b> Ingeniero en sistemas';		
        $message .= '</td>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '<td>';
        $message .= '<b>Departamento:</b> Administración';		
        $message .= '</td>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '<td>';
        $message .= '<b>Días solicitados:</b> 20/06/2024 - 27/07/2024';		
        $message .= '</td>';  
        $message .= '<td>';
        $message .= '</td>';                                      
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '</tr>';        
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '</td>';        
        $message .= '<td style="text-align: center;">';
        $message .= '<a style="color:#000000;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:135%;" href="#" target="_blank">Ver en la web</a>';        
        $message .= '</td>';  
        $message .= '<td>';
        $message .= '</td>';                      
        $message .= '</tr>';        
        $message .= '</table>';
        
        echo $message;
    //get_tree($conn, 2);
    $validacion = validarLongitud("0.00", 1, 100); 

    function validarLongitud($valor, $min, $max){
    
      $validar = (strlen($valor) > $max || strlen($valor) < $min || (empty($valor)&&$valor!="0"));
  
      if(!$validar){
        return true;
      }else{
        return false;      
      }
    }

    function get_tree($conn, $id)
    {
      $rec=$conn;
      $sqlSP="CALL select_user_position_by_supervisor($id)";
      /*
      alias de los campos
      	   u.userId as 'usuarioId',
	   u.name as 'nombre', 
  	   u.lastName1 as 'apellido1', 
   	   u.lastName2 as 'apellido2', 
      */
      $resultSP=$conn->query($sqlSP, MYSQLI_STORE_RESULT);
      
      $resultado=[];
      //condicion para verificar si se hizo la insercion en la bd
      if($resultSP){        
        while($row = $resultSP->fetch_assoc()){
          echo $row['nombre']." ".$row['apellido1']." ".$row['apellido2'];
          echo "<br>";
          
          get_tree($rec, $row['usuarioId']);
          //array_push($resultado, $row);
        }
      }
      //$conn->next_result();
      //return $resultado;


      //////////////////////////////////
      /*
      $result = mysql_query('SELECT id, title FROM elements WHERE parent_id='.$id);
      while ($row = mysql_fetch_array($result))
      {
        echo str_repeat(' ', $level), $row['title'], "\r\n";
        get_tree($row['id'], $level + 1);
      }
      */
    }
    
    ?>
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