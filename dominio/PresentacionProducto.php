<?php
class PresentacionProducto{
		
	
	private	$idPresentacionProducto;
	private	$descripcionPresentacion;
	

	function presentacionProducto( $idPresentacionProducto, $descripcionPresentacion){
		$this->setIdPresentacionProducto($idPresentacionProducto);
		$this->setDescripcionPresentacion($descripcionPresentacion);
	}


	public function setIdPresentacionProducto($idPresentacionProducto) {
		$this->idPresentacionProducto = $idPresentacionProducto;
	}
	public function getIdPresentacionProducto() {
		return $this->idPresentacionProducto;
	}

	public function setDescripcionPresentacion($descripcionPresentacion) {
		$this->descripcionPresentacion = $descripcionPresentacion;
	}
	public function getDescripcionPresentacion() {
		return $this->descripcionPresentacion;
	}
}
?>