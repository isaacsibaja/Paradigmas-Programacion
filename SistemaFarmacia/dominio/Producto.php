<?php
class Producto{
		
	
	private	$idProducto;
	private	$idCategoria;
	private	$idTipoProducto;
	private	$idPrecentacionProducto;
	private	$idUnidadMedida;
	private	$descripcion;

	function Producto( $idProducto, $idCategoria, $idTipoProducto,
	 $idPrecentacionProducto, $idUnidadMedida, $descripcion ){
		$this->setIdProducto($idProducto);
		$this->setIdCategoria($idCategoria);
		$this->setIdTipoProducto($idTipoProducto);
		$this->setIdPrecentacionProducto($idPrecentacionProducto);
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

	public function setIdPrecentacionProducto($idPrecentacionProducto) {
		$this->idPrecentacionProducto = $idPrecentacionProducto;
	}
	public function getIdPrecentacionProducto() {
		return $this->idPrecentacionProducto;
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