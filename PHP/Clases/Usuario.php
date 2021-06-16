<?php
class Usuario{

	/*Los atributos privados precisan de funciones getter y setter para asignar y recoger sus valores desde fuera.*/
	private $id;
	private $nombre;
	private $apellidos;
	private $telefono;
	private $dni;
    	private $email;
	private $usuario;
	private $password;
	private $cargo;
    
	/*Constructor. Esta función crea los objetos que pertenecen a ésta clase. OJO! Cuando crees un objeto Usuario deber pasarle los parámetros al constructor EN EL MISMO ORDEN */
	public function __construct($id, $nombre, $apellidos, $telefono, $dni, $email, $usuario, $password, $cargo){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->apellidos=$apellidos;
	 	$this->telefono=$telefono;
		$this->dni=$dni;
		$this->email=$email;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->cargo=$cargo;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getNombre(){
                return $this->nombre;
        }
        public function getApellidos(){
                return $this->apellidos;
        }
        public function getTelefono(){
                return $this->telefono;
        }
        public function getDni(){
                return $this->dni;
        }
        public function getEmail(){
                return $this->email;
        }
    	public function getUsuario(){
		return $this->usuario;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getCargo(){
		return $this->cargo;
	}
	

	public function setId($id){
	    $this->id=$id;
	}
	public function setNombre($nombre){
                $this->nombre=$nombre;
        }
        public function setApellidos($apellidos){
		$this->apellidos=$apellidos;
        }
        public function setTelefono($telefono){
                $this->telefono=$telefono;
        }
        public function setDni($dni){
	    $this->dni=$dni;
	}
	public function setEmail($email){
		$this->email=$email;
	}
 	public function setUsuario($usuario){
                $this->usuario=$usuario;
        }
	public function setPassword($password){
		$this->password=$password;
	}
        public function setCargo($cargo){
                $this->cargo=$cargo;
        }

}
?>

