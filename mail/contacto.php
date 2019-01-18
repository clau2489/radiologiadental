<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1420230.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "no-reply@c1420230.ferozo.com";  // Mi cuenta de correo
$smtpClave = "RNRkOFLcCs";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@radiologiadental.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = $asunto; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br/><br/><br/><br/>Consulta realizada por medio del Sitio Web<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n\n\n Consulta realizada por medio del Sitio Web"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    $miresultado = '
	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Radiología Dental</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="apple-touch-icon" href=../img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href=../img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href=../img/apple-touch-icon-114x114.png">
	<link rel="shortcut icon" href=../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css"  href=../css/bootstrap.css">
	</head>
	<body>
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
	    	<br><br><br><br>
			<h1>Sus datos han sido enviados con éxito! Gracias por ponerse en contacto con nosotros</h1>
			<br>
			<a href=../index.html" class="btn btn-success">Continuar Navegando</a> 
	    </div>
	  </div>
	</body>
	</html>  
	';
} else {
    $miresultado = '
	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Radiología Dental</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="apple-touch-icon" href=../img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href=../img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href=../img/apple-touch-icon-114x114.png">
	<link rel="shortcut icon" href=../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css"  href=../css/bootstrap.css">
	</head>
	<body>
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
			<h1 class="mb-10">El servidor no responde, por favor intente nuevamente en unos minutos.</h1>
			<a href=../index.html" class="btn btn-success">Continuar Navegando</a> 
	    </div>
	  </div>
	</div>
	</body>
	</html>    
	';
}
echo $miresultado;