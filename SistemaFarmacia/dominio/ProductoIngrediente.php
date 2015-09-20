<?php
class ProductoIngrediente{
	
	private	$idProducto;
	private	$idIngredienteActivo;

	function ProductoIngrediente( $idProducto, $idIngredienteActivo){
		$this->setIdProducto($idProducto);
		$this->setIdIngredienteActivo($idIngredienteActivo);		
	}


	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setIdIngredienteActivo($idIngredienteActivo) {
		$this->idIngredienteActivo = $idIngredienteActivo;
	}
	public function getIdIngredienteActivo() {
		return $this->idIngredienteActivo;
	}
}

?>