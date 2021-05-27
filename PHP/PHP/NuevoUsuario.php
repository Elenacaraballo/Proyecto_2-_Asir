<?php

require 'FuncionesModelo.php';
$arrayUsuarios=getUsuarios();

?>

<!DOCTYPE html>
<html>
<head>
        <title> SHARMAA </title>
        <meta charset="utf-8">
</head>
<body>
	    <ul>
        	<li><a href="PanelAdministrador.php">Incidencias</a></li>
        	<li><a href="#">Usuarios</a></li>
   	    </ul>

	<h2>Usuarios</h2>
	        <table border="2">
                <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
			<th>Teléfonos</th>
                        <th>Dni</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Cargo</th>
		</tr>
		<?php foreach ($arrayUsuarios as $datosUsuario) { ?>
                <tr>
			<td><?= $datosUsuario->getId(); ?></td>
                        <td><?= $datosUsuario->getNombre(); ?></td>
                        <td><?= $datosUsuario->getApellidos(); ?></td>
			<td><?= $datosUsuario->getTelefono(); ?></td>
                        <td><?= $datosUsuario->getDni(); ?></td>
                        <td><?= $datosUsuario->getUsuario(); ?></td>
                        <td><?= $datosUsuario->getEmail(); ?></td>
                        <td><?= $datosUsuario->getCargo(); ?></td>
		</tr>
		<?php } ?> 
	</table>
	<h2>Nuevo Usuario</h2>
	<form action="CrearUsuario.php" method="POST">

        	<table>
                	<th>
                        	<label>Nombre</label>
	                        <input type="text" value="" name="nombre"/></br></br>
	                        <label>Apellidos</label>	
        	                <input type="text" value="" name="apellidos"/></br></br>
                	</th>
	                <th>
        	                <label>Teléfono</label>
                	        <input type="number" value="" name="telefono"/></br></br>
                        	<label>DNI</label>
	                        <input type="text" value="" name="dni"/></br></br>
		        </th>
                	<th>
        	                <label>Email</label>
                	        <input type="text" value="" name="email"/></br></br>
	                </th>
        	        <th>
	                        <label>Cargo</label>
	                        <input type="text" value="" name="cargo"/></br></br>
			</th>
		</table>
		<table>
			<th>
				<input type="submit" value="Nuevo Usuario">
			</th>
	        </table>
	</form>

</body>
</html>
