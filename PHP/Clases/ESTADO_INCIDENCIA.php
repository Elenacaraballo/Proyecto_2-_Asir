<?php
class EstadoIncidencia{
	private $id;
	private $estado;
	private $hora;

	public function __construct($id,$estado,$hora){
		$this->id=$id;
		$this->estado=$estado;
		$this->hora=$hora;
	}

	// getters
	public function getId(){
		return $this->id;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function getHora(){
		return $this->hora;
	}

	// setters
	public function setID($id){
		$this->id=$id;
	}
	public function setEstado($estado){
		$this->estado=$estado;
	}
	public function setHora($hora){
		$this->hora=$hora;
	}
}
?>
