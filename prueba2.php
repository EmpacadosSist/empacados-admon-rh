<?php 
require_once('./lib/phpmailer/PHPMailer.php');
require_once('./lib/phpmailer/SMTP.php');



		$mail=new PHPMailer();
	    $mail->isSMTP();
		$mail->CharSet = 'UTF-8';
		  //$mail->Host = '';
		  /////$mail->SMTPAuth = true;
		  //$mail->Username = ''; // Coloca aquí tu dirección de correo de Gmail
		  //$mail->Password = ''; // Coloca aquí tu contraseña de Gmail
		  //$mail->SMTPSecure = 'ssl';
		  //$mail->Port = ;
		  
			$message = '<html>';
			$message .= '<head>';
			$message .= '<style>';
			// Incluye Bootstrap CSS (si es necesario)
			$message .= file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
			$message .= '</style>';
			$message .= '</head>';
			$message .= '<body>';
			$message .= '<div style="max-width: 600px; margin: 0 auto; background-color: #8e0e0e; padding: 20px;">'; // Añadido fondo y padding al contenedor principal
			$message .= '<div class="container mt-4">';
			$message .= '<div style="background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); color: #333; text-align: center; padding: 20px;">'; // Añadido padding al contenedor interno
			$message .= '<div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">'; // Contenedor para las imágenes
			$message .= '<div style="margin-right: 20px;">'; // Estilo para la primera imagen
			$message .= '<img src="data:image/png;base64,'.base64_encode(file_get_contents('assets/img/arroz12.png')).'" alt="Grupo Empacados" class="img-fluid" style="width: 100%;">';
			$message .= '</div>';
			$message .= '<div style="width: 50%; max-width: 225px;">'; // Estilo para la segunda imagen GIF
			$message .= '<img src="data:image/gif;base64,'.base64_encode(file_get_contents('assets/img/cuadro.gif')).'" alt="Imagen GIF" style="width: 100%;">';
			$message .= '</div>';
			$message .= '</div>';
			$message .= '<h1 class="mt-4">¡Bienvenido a nuestro nuevo sistema!</h1>';
			$message .= '<p style="text-align: center;" class="lead"><h2>Te damos la bienvenida a Empacados Web-Admon. Aquí encontrarás toda la información necesaria para gestionar y administrar el sistema de forma eficiente.</h2></p>';
			$message .= '<p class="font-weight-bold"><h2>Detalles de inicio de sesión:</h2></p>';
			$message .= '<p style="text-align: center;"><h2>Usuario: Kimberly Blanco</h2></p>';
			$message .= '<p style="text-align: center;"><h2>Contraseña: 1231298778</h2></p>';
			$message .= '<p class="text-danger">Este es un mensaje automático, favor de <strong>NO</strong> responder.</p>';
			$message .= '</div>';
			$message .= '</div>';
			$message .= '</div>'; // Cierre del contenedor principal
			$message .= '</body>';
			$message .= '</html>';




		$mail->SetFrom('general@empacados.com', "Empacados - Admon RH");
		$mail->AddReplyTo('no-reply@empacados.com','no-reply');
		$mail->Subject = "Bienvenidos Empacados Web-Admon";
		$mail->MsgHTML($message);
		
    //$mail->AddAddress('');
			
   $exito=$mail->send();
