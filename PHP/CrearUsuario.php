<?php

require 'FuncionesModelo.php';
nuevoUsuario($_POST["nombre"], $_POST["apellidos"],$_POST["telefono"],$_POST["dni"],$_POST["email"],$_POST["cargo"]);
header ("Location: NuevoUsuario.php");

?>
