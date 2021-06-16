<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'bibliotecasExternas/PHPMailer-master/src/Exception.php';
require 'bibliotecasExternas/PHPMailer-master/src/PHPMailer.php';
require 'bibliotecasExternas/PHPMailer-master/src/SMTP.php';

function enviarCorreo($correoDestino,$asunto,$textoHTML){
// Declarar una variable para que almacene la salida de la función
$salidaFuncion="";
$mail = new PHPMailer(true);
try {
$mail->setFrom('sharmaa@sharmaa.es', 'Sharmaa');

$mail->addReplyTo('sharmaa@sharmaa.es');
$mail->addAddress($correoDestino);
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = $asunto;
$mail->Body = $textoHTML;
$mail->send();
$salidaFuncion="Correo enviado";

} catch (Exception $e) {

$salidaFuncion="No se ha podido enviar el correo.Error:{$mail->ErrorInfo}";
}
return $salidaFuncion;
}

?>
