<?php
class tipoProducto{
		
	
	private	$idTipoProducto;
	private	$descripcionTipo;
	

	function tipoProducto( $idTipoProducto, $descripcionTipo){
		$this->set_idTipoProducto($idTipoProducto);
		$this->set_descripcionTipo($descripcionTipo);
	}


	public function set_idTipoProducto($idTipoProducto) {
		$this->idTipoProducto = $idTipoProducto;
	}
	public function get_idTipoProducto() {
		return $this->idTipoProducto;
	}

	public function set_descripcionTipo($descripcionTipo) {
		$this->descripcionTipo = $descripcionTipo;
	}
	public function get_descripcionTipo() {
		return $this->descripcionTipo;
	}
}
?>