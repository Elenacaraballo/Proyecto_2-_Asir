<?php

require 'FuncionesModelo.php';
nuevoUsuario($_POST["nombre"], $_POST["apellidos"],$_POST["telefono"],$_POST["dni"],$_POST["usuario"],$_POST["email"],$_POST["password"],$_POST["cargo"]);
header ("Location: NuevoUsuario.php");

?>
