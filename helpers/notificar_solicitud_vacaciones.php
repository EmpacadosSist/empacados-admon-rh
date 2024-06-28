<?php 
require_once('../lib/phpmailer/PHPMailer.php');
require_once('../lib/phpmailer/SMTP.php');
require_once('../conexion/conexion.php');

function notificarSolicitud($datos)
{
	//count($datos)>0
	if(true){

		$mail=new PHPMailer();
	  $mail->isSMTP();
		$mail->CharSet = 'UTF-8';

		//cambiar cuando se necesite
	  //$mail->Host = 'smtp.gmail.com';
	  //$mail->SMTPAuth = ;
	  //$mail->Username = ''; // Coloca aquí tu dirección de correo de Gmail
	  //$mail->Password = ''; // Coloca aquí tu contraseña de Gmail
	  //$mail->SMTPSecure = '';
	  //$mail->Port = ;
		
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
		$mail->Subject = "Este es el asunto";
		$mail->MsgHTML($message);
		
		$email = 'aux2.sistemas@empacados.com';
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