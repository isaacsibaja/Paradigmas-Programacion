<?php
class Categoria{
		
	
	private	$idCategoria;
	private	$descripcion;
	

	function Categoria( $idCategoria, $descripcion ){
		$this->setIdCategoria($idCategoria);
		$this->setDescripcion($descripcion);
		
	}


	public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
	public function getIdCategoria() {
		return $this->idCategoria;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	public function getDescripcion() {
		return $this->descripcion;
	}

}



?>