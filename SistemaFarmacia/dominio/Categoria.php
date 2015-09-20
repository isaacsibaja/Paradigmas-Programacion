<?php
class Categoria{
		
	
	private	$idCategoria;
	private	$descripcion;
	

	function Categoria( $idCategoria, $descripcion ){
		$this->set_idCategoria($idCategoria);
		$this->set_descripcion($descripcion);
		
	}


	public function set_idCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
	public function get_idCategoria() {
		return $this->idCategoria;
	}

	public function set_descripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	public function get_descripcion() {
		return $this->descripcion;
	}

}



?>