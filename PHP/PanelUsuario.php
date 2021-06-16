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
        <title> Sharmaa </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="STYLESHEET" href="css/style.css">
</head>
<div class="container">
        <body background="css/indice.jpg">
                <!--Mis datos-->
                <h2>Mis Datos</h2>
                <table class="table table-success table-striped">
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
                <h2>Mis Incidenias</h2>
                <table class="table table-success table-striped">
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
				<?php foreach ($arrayIncidenciasUsuario as $incidencia) { 
				$orgDate = $incidencia->getHora();  
				$newDate = date("d-m-Y H:i", strtotime($orgDate));?>
                                <tr>
                                        <td><?= $incidencia->getId(); ?></td>
                                        <td><?= $incidencia->getPrioridad(); ?></td>
                                        <td><?= $newDate; ?></td>
                                        <td><?= $incidencia->getDescripcion(); ?></td>
                                        <td><?= $incidencia->getServername(); ?></td>
                                        <td>
                                                <table class="table table-dark table-striped">
                                                        <tr>
                                                                <th>Estado</th>
                                                                <th>Fecha</th>
                                                        </tr>
							<?php foreach (getEstadosIncidencia($incidencia->getId()) as $estado) { 
							$orgDate = $estado->getHora();  
							$newDate = date("d-m-Y H:i", strtotime($orgDate));?>
                                                        <tr>
                                                                <td><?= $estado->getEstado(); ?></td>
                                                                <td><?= $newDate ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                </table>
                                        </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                </table>
                <h2>Nueva Incidencia</h2>
                <form action="NuevaIncidencia.php" method="POST">
                        <label class="user">Incidencia</label>
                        <select name="descripcion" id="descripcion" class="form-select">
                                <option value="none" selected disabled hidden>Seleccione una opción</option>
                                <option value="Backup">Backup Servidor</option>
                                <option value="Reinicio">Reiniciar un Servidor</option>
                                <option value="Imprimir Log">Imprimir log Servidor</option>
                                <option value="Contraseña">Reestablecer una contraseña</option>
                        </select>
                        <label class="user">Prioridad</label>
                        <select  name="prioridad" id="prioridad" class="form-select">
                                <option value="none" selected disabled hidden>Seleccione una opción</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                        </select>
                        <label class="user">Servidor</label>
                        <select name="servername" id="servername" class="form-select">
                                <option value="none" selected disabled hidden>Seleccione una opción</option>
                                <option value="">Ninguno</option>
                                <option value="Servidor1">Servidor 1</option>
                                <option value="Servidor2">Servidor 2</option>
                                <option value="Servidor3">Servidor 3</option>
                        </select>
                        <input type="hidden" value=<?= $idEmple; ?> name="id_Emple"/></br>
                        <input  type="submit" value="Enviar incidencia" class="btn btn-secondary">
                </form>
        </body>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
</div>
</html>

<?php
}else{
        header("Location:index.php");
}

?>
