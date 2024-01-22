<?php 
require_once('../lib/phpmailer/PHPMailer.php');
require_once('../lib/phpmailer/SMTP.php');
require_once('../conexion/conexion.php');

function enviarPassword($password, $empnum, $email)
{
	if($email!=""){

		$mail=new PHPMailer();
	  $mail->isSMTP();
		//$mail->CharSet = 'UTF-8';
	  //$mail->Host = 'smtp.gmail.com';
	  //$mail->SMTPAuth = true;
	  //$mail->Username = // Coloca aquí tu dirección de correo de Gmail
	  //$mail->Password = // Coloca aquí tu contraseña de Gmail
	  //$mail->SMTPSecure = 'ssl';
	  //$mail->Port = //coloca el puerto 
		
		$message = '<html><body>';
	  $message .= '<p style=font-size:14px;">Buen d&iacute;a</p>';
	  $message .= '<p style=font-size:14px;">Esta es la contraseña: '.$password.'</p>';
	 	$message .= '<p style=font-size:14px;">Este es un mensaje automático, favor de <u>NO</u> responder. </p>';
	  $message .= '</body></html>';
		
		$mail->SetFrom('general@empacados.com', "Empacados - Admon RH");
		$mail->AddReplyTo('no-reply@empacados.com','no-reply');
		$mail->Subject = "Este es el asunto";
		$mail->MsgHTML($message);
		
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