<?php

require 'FuncionesModelo.php';

$id_Emple = $_POST["id_Emple"];
$prioridad = $_POST["prioridad"];
$descripcion = $_POST["descripcion"];

if(isset($_POST["servername"]) && $_POST["servername"] != "") {
	$servername = $_POST["servername"];
}else{
	$servername = null;
}

nuevaIncidencia($prioridad,$descripcion,$servername,$id_Emple);
header("Location:PanelUsuario.php");

?>
