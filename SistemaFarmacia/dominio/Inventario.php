<?php
class Inventario{
		
	
	private	$idInventario;
	private	$idProducto;
	private	$cantidad;

	function Inventario( $idInventario, $idProducto, $cantidad){
		$this->setIdInventario($idInventario);
		$this->setIdProducto($idProducto);
		$this->setCantidad($cantidad);
	}


	public function setIdInventario($idInventario) {
		$this->idInventario = $idInventario;
	}
	public function getIdInventario() {
		return $this->idInventario;
	}

	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}
	public function getCantidad() {
		return $this->cantidad;
	}
}
?>