<?php

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
              >
} catch (PDOException $e) {

        die ("Error al conectar con la Base de Datos:" . $e->getMessage());
}

function getresetpassword($id) {
	global $conn;
	$password = uniqid();
        $stmt = $conn->prepare("UPDATE emple SET password = ? WHERE id = ?");
	$stmt->execute([$password, $id]);
}
?>
