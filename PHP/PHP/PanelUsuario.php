<?php

require 'FuncionesModelo.php';
session_name('sharmaa');
session_start();
$idEmple=$_SESSION['idUsuario'];
$arrayIncidenciasUsuario = getIncidenciasUsuario($idEmple);
$datosUsuario = getDatosUsuario($idEmple);

if(isset($_SESSION["idUsuario"])&& $_SESSION["idUsuario"]!=""){

?>

<!DOCTYPE html>
<html>
<head>
        <title> SHARMAA </title>
        <meta charset="utf-8">
</head>
<body>
        <!--Mis datos-->
        <h2>Mis datos</h2>
        <table border="2">
                <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                </tr>
                <tr>
			<td><?= $datosUsuario->getDni(); ?></td>
                        <td><?= $datosUsuario->getUsuario(); ?></td>
                        <td><?= $datosUsuario->getEmail(); ?></td>
                        <td><?= $datosUsuario->getPassword(); ?></td>
                </tr>
        </table>
        <!--Mis incidenias-->
        <h2>Mis incidenias</h2>
        <table border="2">
                <tr>
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                </tr>
                <tr>
                        <td><?= $datosUsuario->getDni(); ?></td>
                        <td><?= $datosUsuario->getUsuario(); ?></td>
                        <td><?= $datosUsuario->getEmail(); ?></td>
                        <td><?= $datosUsuario->getPassword(); ?></td>
                </tr>
        </table>
        <!--Mis incidenias-->
        <h2>Mis incidenias</h2>
        <table border="2">
                <thead>
                        <tr>
                                <th>Id Incidencia</th>
                                <th>Prioridad</th>
                                <th>Fecha Creación</th>
                                <th>Descripción</th>
                                <th>Servidor</th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($arrayIncidenciasUsuario as $incidencia) { ?>
                                <tr>
                                        <td><?= $incidencia->getId(); ?></td>
                                        <td><?= $incidencia->getPrioridad(); ?></td>
                                        <td><?= $incidencia->getHora(); ?></td>
                                        <td><?= $incidencia->getDescripcion(); ?></td>
                                        <td><?= $incidencia->getServername(); ?></td>
                                        <td>
                                                <table>
                                                        <tr>
                                                                <th>Estado</th>
                                                                <th>Fecha</th>
                                                        </tr>
                                                        <?php foreach (getEstadosIncidencia($incidencia->getId()) as $estado) { ?>
                                                                <tr>
                                                                        <td><?= $estado->getEstado(); ?></td>
                                                                        <td><?= $estado->getHora(); ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                </table>
                                        </td>
                                </tr>
                        <?php } ?>
                </tbody>
        </table>
        <h2>Nueva incidencia</h2>
        <form action="NuevaIncidencia.php" method="POST">
                <label>Prioridad</label>
                <select  name="prioridad" id="prioridad" required>
                        <option value="none" selected disabled hidden>Seleccione una opción</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                </select>
                <label>Descripción</label>
                <input  type="textarea" name="descripcion" required />
                <label>Servidor</label>
                <select name="servername" id="servername" required>
                        <option value="none" selected disabled hidden>Seleccione una opción</option>
                        <option value="Servidor1">Servidor 1</option>
                        <option value="Servidor2">Servidor 2</option>
                        <option value="Servidor3">Servidor 3</option>
                </select>
                <input type="hidden" value=<?= $idEmple; ?> name="id_Emple"/>
                <input  type="submit" value="Enviar incidencia">
        </form>
</body>
</html>
<?php
}else{
        header("Location:index.php");
}
?>

