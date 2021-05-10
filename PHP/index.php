<?php 
session_name(sharmaa);
session_start();
$_SESSION["cargo"]='';
$_SESSION["idUsuario"]='';

$host = "localhost";
$port = "5432";
$db = "dbsharmaa";
$user = "usersharmaa";
$passw = "sharmaa";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$passw";
$conn = new PDO($dsn);

//Comprobamos que el usuario existe
if(isset($_POST["usuario"]) && isset($_POST["password"])){
	$sql="SELECT COUNT(*) as existe FROM emple WHERE usuario=?";
	$stmt=$conn->prepare($sql);
	$stmt->execute([$_POST["usuario"]]);
	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
	//Comprobamos que la password es correcta
	if($fila["existe"]>0){
		$sql="SELECT id, cargo FROM emple WHERE usuario = ? AND password = ? ";
		$stmt=$conn->prepare($sql);
		$stmt->execute([$_POST["usuario"],$_POST["password"]]);
		$fila=$stmt->fetch(PDO::FETCH_ASSOC);
		if($fila['id']!='' && $fila['cargo']!=''){
			session_destroy();
			session_name('sharmaa');
			session_start();
			$_SESSION['cargo']=$fila['cargo'];
			$_SESSION['idUsuario']=$fila['id'];
			//Redirigimos según cargo
			if($_SESSION["cargo"]=='administrador'){
				header('Location:PanelAdministrador.php');
			}else{
				header('Location:PanelUsuario.php');
				print_r($_POST);
			}

		}else{
		 	$error="La contraseña introducida es incorrecta.";
		}
	}else{
		$error="El usuario introducido es incorrecto.";	
	}
} ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sharmaa</title>
	<meta charset="utf-8">
</head>

	<form action="" method="POST">
		<label>Usuario</label>
		<input type="text" require name="usuario"/>
		<label>Password</label>
                <input type="password" require name="password"/>
		<input type="submit" value="Ingresar"/>
	</form>
	<div id="error"><?=$error;?>
		<!--Mensaje de error-->
	</div>
</html>
