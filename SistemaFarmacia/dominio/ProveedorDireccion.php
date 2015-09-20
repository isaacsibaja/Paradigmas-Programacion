<?php
class ProveedorDireccion{
		
	
	private	$idProveedorDireccion;
	private	$provincia;
	private	$canton;
	private	$distrito;
	private	$otraSenias;


	function ProveedorDireccion( $idProveedorDireccion, $provincia, $canton, $distrito, $otraSenias){
		$this->set_idProveedorDireccion($idProveedorDireccion);
		$this->set_provincia($provincia);
		$this->set_canton($canton);
		$this->set_distrito($distrito);
		$this->set_otraSenias($otraSenias);
		
	}
	public function set_idProveedorDireccion($idProveedorDireccion) {
		$this->idProveedorDireccion = $idProveedorDireccion;
	}
	public function get_idProveedorDireccion() {
		return $this->idProveedorDireccion;
	}

	public function set_provincia($provincia) {
		$this->provincia = $provincia;
	}
	public function get_provincia() {
		return $this->provincia;
	}

	public function set_canton($canton) {
		$this->canton = $canton;
	}
	public function get_canton() {
		return $this->canton;
	}

	public function set_distrito($distrito) {
		$this->distrito = $distrito;
	}
	public function get_distrito() {
		return $this->distrito;
	}

	public function set_otraSenias($otraSenias) {
		$this->otraSenias = $otraSenias;
	}
	public function get_otraSenias() {
		return $this->otraSenias;
	}

}


?>