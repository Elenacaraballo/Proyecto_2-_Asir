<?php

require 'FuncionesModelo.php';

$script = $_POST["script"];

if( $script == "reset_password.php" ) {
	$id = $_POST["idusuario"];
	$message=ejecutaScript($script." ".$id);
}else{
        $message=ejecutaScript($script);
}

echo "<pre>";
echo $message;
echo "</pre>";
echo "<button><a href='PanelAdministrador.php'>Volver al Panel</a></button>";

?>

