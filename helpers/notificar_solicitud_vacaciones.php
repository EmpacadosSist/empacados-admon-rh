<?php 
require_once('../lib/phpmailer/PHPMailer.php');
require_once('../lib/phpmailer/SMTP.php');
require_once('../conexion/conexion.php');

function notificarSolicitud($datos)
{
	//count($datos)>0
	if(count($datos)>0){

		$mail=new PHPMailer();
	  $mail->isSMTP();
		$mail->CharSet = 'UTF-8';

		//cambiar cuando se necesite
	  $mail->Host = 'smtp.gmail.com';
	  $mail->SMTPAuth = true;
	  $mail->Username = ''; // Coloca aquí tu dirección de correo de Gmail
	  $mail->Password = ''; // Coloca aquí tu contraseña de Gmail
	  $mail->SMTPSecure = 'ssl';
	  $mail->Port = 465;

		$message =	'<center style="background-color:#F2F2F2;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:135%;">';
		$message .= '<table border="0" cellpadding="5px" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';                        
		$message .= '<td>';
		$message .= '<img src="data:image/png;base64,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" width="245px">';		
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '</td>';

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';
		$message .= '<td style="text-align: center;">';

		//esto le llega al jefe
		//si es solicitud de vacaciones normal es: $message .= '<h2>Solicitud de vacaciones</h2>';
		//si es solicitud de cancelación es: $message .= '<h2>Solicitud de cancelación</h2>';		
		//si es solicitud de cancelación de vacaciones aun no aprobadas: $message .= '<h2>Solicitud de vacaciones cancelada</h2>';		
		$tab="";
		if(isset($datos['cancelacion'])){
			$message .= '<h2>Solicitud de cancelación</h2>';
			$tab='?tab=contenido5';
		}else{
			$message .= '<h2>Solicitud de vacaciones</h2>';
		}
		
		$message .= '</td>';
		$message .= '<td>';
		$message .= '</td>';

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';                        
		$message .= '<td>';
		$message .= '<b>No. de empleado:</b> '.$datos['numEmpleado'];		
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '</td>';        

		$message .= '</tr>';		

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';                
		$message .= '<td>';
		$message .= '<b>Nombre:</b> '.$datos['nombre'];		
		$message .= '</td>';
		$message .= '<td>';
		$message .= '</td>'; 

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '<b>Puesto:</b> '.$datos['puesto'];		
		$message .= '</td>';
		$message .= '<td>';
		$message .= '</td>';  

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '<b>Departamento:</b> '.$datos['departamento'];		
		$message .= '</td>';
		$message .= '<td>';
		$message .= '</td>';   

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '<b>Días solicitados:</b> '.$datos['requestedDays'];		
		$message .= '</td>';  
		$message .= '<td>';
		$message .= '</td>';  

		$message .= '</tr>';

		$message .= '<tr>';

		$message .= '<td>';
		$message .= '</td>';        
		$message .= '<td>';
		$message .= '<b>Número de días:</b> '.$datos['numDias'];		
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
		$message .= '<td bgcolor="#C2C2C2" style="text-align: center;">';
		$message .= '<a style="color:#000000;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:135%;" href="http://localhost/empacados-admon-rh/control-vacaciones.php'.$tab.'" target="_blank">Ver en la web para autorizar</a>';        
		$message .= '</td>';
		$message .= '<td>';
		$message .= '</td>';

		$message .= '</tr>';

		$message .= '</table>';
		/*
		$message = '<html><body>';
	  $message .= '<p style=font-size:14px;">Buen d&iacute;a</p>';
	  $message .= '<p style=font-size:14px;">Numero de empleado: '.$datos['numEmpleado'].'</p>';
		$message .= '<p style=font-size:14px;">Nombre: '.$datos['nombre'].'</p>';
		$message .= '<p style=font-size:14px;">Puesto: '.$datos['puesto'].'</p>';
		$message .= '<p style=font-size:14px;">Departamento: '.$datos['departamento'].'</p>';
		$message .= '<p style=font-size:14px;">Días soliciatados: '.$datos['dias'].'</p>';
		$message .= '<p style=font-size:14px;">Este es un mensaje automático, favor de <u>NO</u> responder. </p>';
	  $message .= '</body></html>';
		*/
		
		$mail->SetFrom('general@empacados.com', "Empacados - Admon RH");
		$mail->AddReplyTo('no-reply@empacados.com','no-reply');

		//si es solicitud de vacaciones normal es: $mail->Subject = "Solicitud de vacaciones";
		//si es solicitud de cancelación es: $mail->Subject = "Solicitud de cancelación"; 		
		//si es solicitud de cancelación de vacaciones aun no aprobadas: $mail->Subject = "Solicitud de vacaciones cancelada";	

		if(isset($datos['cancelacion'])){
			$resp="cancelación";
		}else{
			$resp="vacaciones";
		}			
		$mail->Subject = "Solicitud de ".$resp;

		$mail->MsgHTML($message);
		
		$email = $datos['correoJefe'];
    $mail->AddAddress($email);
		
    $exito=$mail->send();
		
		if($exito){
			return ["ok"=>true, "message"=>"enviado"];

		}else{
			return ["ok"=>false, "message"=>"error al enviar"];
		}
	}else{
    return ["ok"=>false, "message"=>"error, sin correo"];
	}
}