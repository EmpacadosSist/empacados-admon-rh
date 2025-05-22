<?php 
require_once('../lib/phpmailer/PHPMailer.php');
require_once('../lib/phpmailer/SMTP.php');
require_once('../conexion/conexion.php');
require_once('generar_imagen.php');
require_once('config.php');

function enviarPassword($contra, $numEmp, $email, $nombre)
{
	if($email!=""){

    // Datos del usuario (esto puede venir de la base de datos)
    //$nombre = "Hermenegildo Urdapilleta";
    //$numEmp = "501126";
    //$contra = "APLÑDM";

    // Generar imagen personalizada
    $imagenGenerada = generarImagen($nombre, $numEmp, $contra);

    //$email_template = 'generar_plantilla_correo.html';
		//$message = file_get_contents($email_template);
		$message='<html>
							<body>
							<div>
								<label style="font-family: \'Segoe UI\'; font-weight: bolder; font-size: 129%;">Link de acceso:</label>
								<br>
								<a style="font-family: \'Segoe UI\'; font-weight: bolder; font-size: 129%;" href="http://empacadosmty.fortiddns.com:81/conecta-empacados/">http://empacadosmty.fortiddns.com:81/conecta-empacados/</a> 
							</div>
							<br>
							<div style="display: block; position: relative; width: 600px;">
								<img src="{IMAGEN_CREDENCIAL}" width="600">
							</div>
							</body>
							</html>';
	

		$mail=new PHPMailer();
	  $mail->isSMTP();
		$mail->CharSet = 'UTF-8';
	  $mail->Host = 'smtp.gmail.com';
	  $mail->SMTPAuth = true;
	  $mail->Username = CORREO_NOTIFICACIONES; // Coloca aquí tu dirección de correo de Gmail
	  $mail->Password = PASS_CORREO_NOTIFICACIONES; // Coloca aquí tu contraseña de Gmail

	  $mail->SMTPSecure = 'ssl';
	  $mail->Port = 465;



		
		$mail->SetFrom('general@empacados.com', "Conecta Empacados");
		$mail->AddReplyTo('no-reply@empacados.com','no-reply');
		$mail->Subject = "Claves de Acceso";

    // Insertar imagen en el HTML del correo
    $message = str_replace('{IMAGEN_CREDENCIAL}', 'cid:email_image', $message);

    // Agregar la imagen generada al correo
    $mail->AddEmbeddedImage($imagenGenerada, 'email_image', 'email_image.png');


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