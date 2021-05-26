<?php

//Llama a las clases
require_once('Usuario.php');
require_once('INCIDENCIA.php');
require_once('ESTADO_INCIDENCIA.php');

//Servicio Mailing
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'bibliotecasExternas/PHPMailer-master/src/Exception.php';
require 'bibliotecasExternas/PHPMailer-master/src/PHPMailer.php';
require 'bibliotecasExternas/PHPMailer-master/src/SMTP.php';

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

function nuevoUsuario ($nombre,$apellidos,$telefono,$dni,$email,$cargo) {
	global $conn;
	$password = uniqid();
	$apellido = explode(" " , $apellidos);
        $usuario = strtolower(substr($nombre,0,2).substr($apellido[0],0,2).substr($apellido[1],0,2));
        $stmt = $conn->prepare("INSERT INTO emple (nombre, apellidos, telefono, dni, usuario, email, password, cargo) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$nombre,$apellidos,$telefono,$dni,$usuario,$email,$password,$cargo]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
}

function getScripts() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM scripts");
        $stmt->execute();
        $arrayScripts=[];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayScripts[] =$fila["script"];
        }
        return $arrayScripts;
}

function ejecutaScript($script){
	$rutaScript="/var/www/sharmaa.es/html/Scripts/".$script;
        $resultado=shell_exec($rutaScript);
        return $resultado;
}

function enviarCorreo($correoDestino,$asunto,$textoHTML){
    // Declarar una variable para que almacene la salida de la función
    $salidaFuncion="";

    // Se instancia PHPMailer para poder utilizarlo para enviar el correo
    $mail = new PHPMailer(true);
    try {
	//SOLO SI SE USA SMTP
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	// $mail->isSMTP();                                            //Send using SMTP
	// $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	// $mail->Username   = 'user@example.com';                     //SMTP username
	// $mail->Password   = 'secret';                               //SMTP password
	// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	// $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	//ORIGEN DEL CORREO
	// Se configura la dirección de correo de origen
	$mail->setFrom('sharmaa@sharmaa.es', 'Sharmaa');
	// Se configura la dirección a la que se puede responder, si es que se quiere
	$mail->addReplyTo('sharmaa@sharmaa.es');

	//DESTINO DEL CORREO
	// Se configura la dirección a la que va destinado el correo
	$mail->addAddress($correoDestino);

	//CONTENIDO DEL CORREO
	// Se indica que el contenido del correo es HTML, que es lo más probable
	$mail->isHTML(true);
	// Se configura el conjunto de caracteres a UTF-8
	$mail->CharSet = 'UTF-8';
	// Se configura el asunto de correo, que es uno de los parámetros de entrada
	$mail->Subject = $asunto;
	// Se configura el contenido del correo, que también es un parámetro
	$mail->Body    = $textoHTML;

	$mail->send();

	// Si todo ha ido bien se almacena esta cadena de caracteres en la variable de salida
	$salidaFuncion="Correo enviado";

    } catch (Exception $e) {
	// Si ha habido algún tipo de problema se almacena esta cadena en la variable de salida,
	// que de camino contiene el error que se ha producido.
	$salidaFuncion="No se ha podido enviar el correo. Error: {$mail->ErrorInfo}";
    }

    return $salidaFuncion;
}

?>
