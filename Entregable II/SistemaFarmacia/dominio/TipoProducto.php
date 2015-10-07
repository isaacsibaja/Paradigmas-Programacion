<?php
class tipoProducto{
		
	
	private	$idTipoProducto;
	private	$descripcionTipo;
	

	function tipoProducto( $idTipoProducto, $descripcionTipo){
		$this->setIdTipoProducto($idTipoProducto);
		$this->setDescripcionTipo($descripcionTipo);
	}


	public function setIdTipoProducto($idTipoProducto) {
		$this->idTipoProducto = $idTipoProducto;
	}
	public function getIdTipoProducto() {
		return $this->idTipoProducto;
	}

	public function setDescripcionTipo($descripcionTipo) {
		$this->descripcionTipo = $descripcionTipo;
	}
	public function getDescripcionTipo() {
		return $this->descripcionTipo;
	}
}
?>