<?php
class ProductoLote{
		
	private	$idLote;
	private	$idProducto;
	private	$idAgenteVenta;
	private	$concentracion;
	private	$fechaIngreso;
	private	$fechaVencimiento;
	private	$cantidad;
	private	$precioCompra;
	private	$precioVenta;


	function ProductoLote($idLote, $idProducto, $idAgenteVenta, $concentracion,
	 $fechaIngreso, $fechaVencimiento, $cantidad, $precioCompra, $precioVenta){
		$this->setIdLote($idLote);
		$this->setidProducto($idProducto);
		$this->setIdAgenteVenta($idAgenteVenta);
		$this->setConcentracion($concentracion);
		$this->setFechaIngreso($fechaIngreso);
		$this->setFechaVencimiento($fechaVencimiento);
		$this->setCantidad($cantidad);
		$this->setPrecioCompra($precioCompra);
		$this->setPrecioVenta($precioVenta);	
	}
	


	public function setIdLote($idLote) {
		$this->idLote = $idLote;
	}
	public function getIdLote() {
		return $this->idLote;
	}

	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setIdAgenteVenta($idAgenteVenta) {
		$this->idAgenteVenta = $idAgenteVenta;
	}
	public function getIdAgenteVenta() {
		return $this->idAgenteVenta;
	}

	public function setConcentracion($concentracion) {
		$this->concentracion = $concentracion;
	}
	public function getConcentracion() {
		return $this->concentracion;
	}

	public function setFechaIngreso($fechaIngreso) {
		$this->fechaIngreso = $fechaIngreso;
	}
	public function getFechaIngreso() {
		return $this->fechaIngreso;
	}

	public function setFechaVencimiento($fechaVencimiento) {
		$this->fechaVencimiento = $fechaVencimiento;
	}
	public function getFechaVencimiento() {
		return $this->fechaVencimiento;
	}

	public function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}
	public function getCantidad() {
		return $this->cantidad;
	}

	public function setPrecioCompra($precioCompra) {
		$this->precioCompra = $precioCompra;
	}
	public function getPrecioCompra() {
		return $this->precioCompra;
	}

	public function setPrecioVenta($precioVenta) {
		$this->precioVenta = $precioVenta;
	}
	public function getPrecioVenta() {
		return $this->precioVenta;
	}

}

?>
