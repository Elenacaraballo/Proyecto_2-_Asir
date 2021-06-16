<?php

// import file with all clases
require 'FuncionesModelo.php';
$arrayIncidencias = getIncidencias();
$arrayScripts = getScripts();
//print_r($arrayScripts);

?>

<!DOCTYPE html>
<html>
<head>
        <title>Sharmaa</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="STYLESHEET" href="css/style.css">
        <style>
        body {
                background-image: url("css/indice.jpg");
                background-color: #cccccc; /* Used if the image is unavailable */
                height: 1000px; /* You must set a specified height */
                background-position: center; /* Center the image */
                background-repeat: no-repeat;/* Do not repeat the image */
                background-size: cover; /* Resize the background image to cover the entire container */
        }
</style>
</head>
<body background="css/indice.jpg">
        <ul class="nav nav-fill">
                <li class="nav-item"><a href="#" class="nav-link active">Incidencias</a></li>
                <li class="nav-item"><a href="NuevoUsuario.php" class="nav-link">Usuarios</a></li>
        </ul>
        <div class="container-fluid">
                <h2>Tabla Incidencias</h2>
                <table class="table table-secondary table-striped">
                        <thead>
                                <tr>
                                        <th>Id Incidencia</th>
                                        <th>Id Usuario</th>
                                        <th>Prioridad</th>
                                        <th>Fecha Creación</th>
                                        <th>Descripción</th>
                                        <th>Servidor</th>
                                        <th>Cambiar estado</th>
                                        <th>Scripts</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($arrayIncidencias as $incidencia) {
                                        $orgDate = $incidencia->getHora();
                                        $newDate = date("d-m-Y H:i", strtotime($orgDate)); ?>
                                        <tr>
                                                <td><?= $incidencia->getId(); ?></td>
                                                <td><?= $incidencia->getId_emple(); ?></td>
                                                <td><?= $incidencia->getPrioridad(); ?></td>
                                                <td><?= $newDate ?></td>
                                                <td><?= $incidencia->getDescripcion(); ?></td>
                                                <td><?= $incidencia->getServername(); ?></td>
                                                <td>
                                                        <table class="table table-primary table-striped">
                                                                <tr>
                                                                        <th>Estado</th>
                                                                        <th>Fecha</th>
                                                                </tr>
                                                                <?php foreach (getEstadosIncidencia($incidencia->getId()) as $estado) {
                                                                        $newDate = date("d-m-Y H:i", strtotime($estado->getHora()));?>
                                                                        <tr>
                                                                                <td><?= $estado->getEstado(); ?></td>
                                                                                <td><?= $newDate; ?></td>
                                                                        </tr>
                                                                <?php } ?>
                                                        </table>
                                                </td>
                                                <td style="width:17%;">
                                                        <div>
                                                                <form action="EjecutaScript.php" method="POST">
                                                                        <select name="script" id="script" class="form-select" style="width:100%;">
                                                                                <option value="none" selected disabled hidden>Seleccione un Script</option>
                                                                                <?php foreach ($arrayScripts as $script) { ?>
                                                                                        <option value="<?= $script; ?>"><?= $script; ?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                        <input type="hidden" name="idusuario" value="<?= $incidencia->getId_emple(); ?>"/></br>
                                                                        <input type="submit" value="Ejecutar Script" class="btn btn-secondary">
                                                                </form>
                                                        </div>
                                                </td>
                                                <form action="ActualizaIncidencia.php" method="POST">
                                                        <td>
                                                                <table class="table table-primary table-striped">
                                                                        <th><input type="radio" name="rdEstado" value="Pendiente" class="form-check-input">Pendiente</th>
                                                                        <th><input type="radio" name="rdEstado" value="En desarrollo" class="form-check-input">En desarrollo</th>
                                                                        <th><input type="radio" name="rdEstado" value="Resuelta" class="form-check-input">Resuelta</th>
                                                                </table>
                                                                <div class="d-flex justify-content-center">
                                                                        <input type="hidden" value=<?=$incidencia->getId()?> name="idIncidencia">
                                                                        <input type="submit" value="Ejecutar" class="btn btn-secondary mx-auto">
                                                                </div>
                                                        </td>
                                                </form>
                                        </tr>
                                <?php } ?>
                        </tbody>
                </table>
        </div>
</body>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</html>
