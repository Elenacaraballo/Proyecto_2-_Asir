<?php

require 'FuncionesModelo.php';
actualizaIncidencia($_POST["idIncidencia"], $_POST["rdEstado"]);
header("Location: PanelAdministrador.php");

?>
