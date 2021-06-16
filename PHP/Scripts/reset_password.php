#!/usr/bin/php

<?php
require('/var/www/sharmaa.es/html/FuncionesModelo.php');

function getresetpassword($id) {
    	global $conn;

   	$password = uniqid();
    	$stmt = $conn->prepare("UPDATE emple SET password = ? WHERE id = ?");
    	$stmt->execute([$password, $id]);
    	return $password;
}

$newPass=getresetpassword($argv[1]);
$textoMail="Su nueva contraseña es: $newPass";
$usuario=getDatosUsuario($argv[1]);

enviarCorreo($usuario->getEmail(),'SHARMAA - Contraseña actualizada', $textoMail);

echo "Contraseña cambiada correctamente.";

?>
