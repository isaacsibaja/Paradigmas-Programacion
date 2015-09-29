<?php
class Producto{
		
	
	private	$idProducto;
	private	$idCategoria;
	private	$idTipoProducto;
	private	$idPresentacionProducto;
	private	$idUnidadMedida;
	private	$descripcion;

	function Producto( $idProducto, $idCategoria, $idTipoProducto,
	 $idPresentacionProducto, $idUnidadMedida, $descripcion ){
		$this->setIdProducto($idProducto);
		$this->setIdCategoria($idCategoria);
		$this->setIdTipoProducto($idTipoProducto);
		$this->setidPresentacionProducto($idPresentacionProducto);
		$this->setIdUnidadMedida($idUnidadMedida);
		$this->setDescripcion($descripcion);		
	}


	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
	public function getIdCategoria() {
		return $this->idCategoria;
	}

	public function setIdTipoProducto($idTipoProducto) {
		$this->idTipoProducto = $idTipoProducto;
	}
	public function getIdTipoProducto() {
		return $this->idTipoProducto;
	}

	public function setidPresentacionProducto($idPresentacionProducto) {
		$this->idPresentacionProducto = $idPresentacionProducto;
	}
	public function getidPresentacionProducto() {
		return $this->idPresentacionProducto;
	}

	public function setIdUnidadMedida($idUnidadMedida) {
		$this->idUnidadMedida = $idUnidadMedida;
	}
	public function getIdUnidadMedida() {
		return $this->idUnidadMedida;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	public function getDescripcion() {
		return $this->descripcion;
	}

}

?>