<?php
class precentacionProducto{
		
	
	private	$idPrecentacionProducto;
	private	$descripcionPrecentacion;
	

	function precentacionProducto( $idPrecentacionProducto, $descripcionPrecentacion){
		$this->set_idPrecentacionProducto($idPrecentacionProducto);
		$this->set_descripcionPrecentacion($descripcionPrecentacion);
	}


	public function set_idPrecentacionProducto($idPrecentacionProducto) {
		$this->idPrecentacionProducto = $idPrecentacionProducto;
	}
	public function get_idPrecentacionProducto() {
		return $this->idPrecentacionProducto;
	}

	public function set_descripcionPrecentacion($descripcionPrecentacion) {
		$this->descripcionPrecentacion = $descripcionPrecentacion;
	}
	public function get_descripcionPrecentacion() {
		return $this->descripcionPrecentacion;
	}
}
?>