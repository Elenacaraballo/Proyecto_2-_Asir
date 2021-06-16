<?php

require 'FuncionesModelo.php';
$arrayUsuarios=getUsuarios();

?>

<!DOCTYPE html>
<html>
<head>
        <title>Sharmaa</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="STYLESHEET" href="css/style.css">
</head>
<body background="css/indice.jpg">
        <ul class="nav nav-fill">
                <li class="nav-item"><a href="PanelAdministrador.php" class="nav-link">Incidencias</a></li>
                <li class="nav-item"><a href="#" class="nav-link active">Usuarios</a></li>
        </ul>
<div class="container">
        <h2>Usuarios</h2>
        <table class="table table-light table-striped">
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
        <form action="CrearUsuario.php" method="POST" class="row g-3">
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">Nombre</label>
                                <input type="text" value="" name="nombre" class="form-control"/>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">Apellidos</label>
                                <input type="text" value="" name="apellidos" class="form-control"/>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">Email</label>
                                <input type="text" value="" name="email" class="form-control"/>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">Cargo</label>
                                <input type="text" value="" name="cargo" class="form-control"/>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">Teléfono</label>
                                <input type="number" value="" name="telefono" class="form-control"/>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="user">
                                <label class="form-label">DNI</label>
                                <input type="text" value="" name="dni" class="form-control"/>
                        </div>
                </div>
                <div class="col-12">
                        <input type="submit" value="Nuevo Usuario" class="btn btn-secondary">
                </div>
        </form>
</body>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</div>
</html>
