<?php

// import file with all clases
require 'FuncionesModelo.php';
$arrayIncidencias = getIncidencias();
//$arrayScripts = getScripts();

?>

<!DOCTYPE html>
<html>

<head>
    <title>SHARMAA</title>
</head>

<body>
    <ul>
        <li><a href="#">Incidencias</a></li>
        <li><a href="NuevoUsuario.php">Usuarios</a></li>
    </ul>
    <h2>Tabla Incidencias</h2>
    <table border="2">
        <thead>
            <tr>
                <th>Id Incidencia</th>
                <th>Id Usuario</th>
                <th>Prioridad</th>
                <th>Fecha Creación</th>
                <th>Descripción</th>
                <th>Servidor</th>
                <th>Cambiar estado</th>
                <th>Ejecutar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrayIncidencias as $incidencia) { ?>
            <tr>
                <form action="ActualizaIncidencia.php" method="POST">
                    <td><?= $incidencia->getId(); ?></td>
                    <td><?= $incidencia->getId_emple(); ?></td>
                    <td><?= $incidencia->getPrioridad(); ?></td>
                    <td><?= $incidencia->getHora(); ?></td>
                    <td><?= $incidencia->getDescripcion(); ?></td>
                    <td><?= $incidencia->getServername(); ?></td>
                    <td>
                        <table border="1">
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
                    <td>
                        <select  name="script" id="script">
                        <!-- <option value="none" selected disabled hidden>Seleccione un script</option>
                        <?php// foreach ($arrayScripts as $script) { ?>
                        <option value="<?= $script; ?>"><?= $script; ?></option>
                        <?php// } ?> -->
                    </select>
                </td>
                <td>
                    <table border="1">
                        <tr><td><input type="radio" name="rdEstado" value="Pendiente">Pendiente</tr></td>
                        <tr><td><input type="radio" name="rdEstado" value="En desarrollo">En desarrollo</tr></td>
                        <tr><td><input type="radio" name="rdEstado" value="Resuelta">Resuelta</tr></td>
                    </table>
                </td>
                <td>
                    <input type="hidden" value=<?=$incidencia->getId()?> name="idIncidencia">
                    <input type="submit" value="Ejecutar">
                </td>
            </tr>
        </form>
        <?php } ?>
    </tbody>
</table>
</body>
</html>

