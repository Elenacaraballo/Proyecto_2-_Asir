<?php

//Llama a las clases
require_once('Usuario.php');
require_once('INCIDENCIA.php');
require_once('ESTADO_INCIDENCIA.php');

// Conectamos con la BBDD

$host = "localhost";
$port = "5432";
$db = "dbsharmaa";
$user = "usersharmaa";
$passw = "sharmaa";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$passw";

try {
	// Create a PostgreSQL database connection

	global $conn;
	$conn = new PDO($dsn);
	$conn-> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	die ("Error al conectar con la Base de Datos:" . $e->getMessage());
}

function getIncidenciasUsuario($idemple) {
	
	global $conn;
	$stmt=$conn->prepare("SELECT * FROM incidencia WHERE id_emple = ?");
	$stmt->execute([$idemple]);
	$arrayIncidencias = [];
	
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

		$arrayIncidencias[] = new Incidencia ($fila["id"], $fila["prioridad"], $fila["hora"], $fila["descripcion"], $fila["servername"], $fila["id_emple"]);
	}
	return $arrayIncidencias;
}

function getEstadosIncidencia($idIncidencia) {

	global $conn;
	$stmt = $conn->prepare("SELECT * FROM estado_incidencia WHERE id = ?");
	$stmt->execute([$idIncidencia]);
	$arrayEstadosIncidencia = [];
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$arrayEstadosIncidencia[] = new EstadoIncidencia($idIncidencia, $fila["estado"], $fila["hora"]);
	}
	return $arrayEstadosIncidencia;
}

function getDatosUsuario($idEmple) {

	global $conn;
	$stmt = $conn->prepare("SELECT * FROM emple WHERE id = ?");
	$stmt->execute([$idEmple]);
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$o_emple = new Usuario ($idEmple, $fila["nombre"], $fila["apellidos"], $fila["telefono"], $fila["dni"], $fila["email"], $fila["usuario"], $fila["password"], $fila["cargo"]);
	}
	return $o_emple;
}

function nuevaIncidencia ($prioridad,$descripcion,$servername,$id_Emple) {
	global $conn;
	$stmt = $conn->prepare("INSERT INTO incidencia (id_emple,prioridad,descripcion,servername) VALUES (?,?,?,?) RETURNING id");
	$stmt->execute([$id_Emple,$prioridad,$descripcion,$servername]);
	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
	$code = $fila["id"];
	$stmt2 = $conn->prepare("INSERT INTO estado_incidencia (id, estado) VALUES (?,?)");
	$stmt2->execute([$code, 'Pendiente']);
}

function getIncidencias() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM incidencia ORDER BY hora desc");
	$stmt->execute();
	$arrayIncidencias=[];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$arrayIncidencias[] = new Incidencia($fila["id"], $fila["prioridad"], $fila["hora"], $fila["descripcion"], $fila["servername"], $fila["id_emple"]);
	}
        return $arrayIncidencias;
}

function actualizaIncidencia ($idIncidencia, $rdEstado) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO estado_incidencia (id, estado) VALUES (?,?)");
        $stmt->execute([$idIncidencia, $rdEstado]);
}

function getUsuarios() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM emple");
        $stmt->execute();
        $arrayUsuarios=[];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayUsuarios[] = new Usuario($fila["id"], $fila["nombre"], $fila["apellidos"], $fila["telefono"], $fila["dni"], $fila["email"], $fila["usuario"], $fila["password"], $fila["cargo"]);
        }
        return $arrayUsuarios;
}

function nuevoUsuario ($nombre,$apellidos,$telefono,$dni,$usuario,$email,$password,$cargo) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO emple (nombre, apellidos, telefono, dni, usuario, email, password, cargo) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$nombre,$apellidos,$telefono,$dni,$usuario,$email,$password,$cargo]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
