<?php
class Incidencia{

	private $id;
	private $prioridad;
	private $hora;
	private $descripcion;
	private $servername;
	private $id_emple;

	public function __construct($id,$prioridad,$hora,$descripcion,$servername,$id_emple){
	$this->id=$id;
	$this->prioridad=$prioridad;
	$this->hora=$hora;
	$this->descripcion=$descripcion;
	$this->servername=$servername;
	$this->id_emple=$id_emple;
	} 
	
	// getters
	public function getId(){
		return $this->id;
	} 
	public function getPrioridad(){
		return $this->prioridad;
	}
	public function getHora(){
		return $this->hora;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	public function getServername(){
		return $this->servername;
	}
	public function getId_emple(){
		return $this->id_emple;
	}

	// setters
	public function setId($id){
		$this->id=$id;
	}
	public function setPrioridad($prioridad){
		$this->prioridad=$prioridad;
	}
	public function setHora($hora){
		$this->hora=$hora;
	}
	public function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	public function setServername($servername){
		$this->servername=$servername;
	}
	public function setId_emple($id_emple){
		$this->id_emple=$id_emple;
	}
}
?>
