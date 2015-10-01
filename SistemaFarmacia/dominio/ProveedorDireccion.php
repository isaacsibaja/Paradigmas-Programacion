<?php
class ProveedorDireccion{
		
	
	private	$idProveedorDireccion;
	private	$provincia;
	private	$canton;
	private	$distrito;
	private	$otraSenias;


	function ProveedorDireccion( $idProveedorDireccion, $provincia, $canton, $distrito, $otraSenias){
		$this->setIdProveedorDireccion($idProveedorDireccion);
		$this->setProvincia($provincia);
		$this->setCanton($canton);
		$this->setDistrito($distrito);
		$this->setOtraSenias($otraSenias);
		
	}
	public function setIdProveedorDireccion($idProveedorDireccion) {
		$this->idProveedorDireccion = $idProveedorDireccion;
	}
	public function getIdProveedorDireccion() {
		return $this->idProveedorDireccion;
	}

	public function setProvincia($provincia) {
		$this->provincia = $provincia;
	}
	public function getProvincia() {
		return $this->provincia;
	}

	public function setCanton($canton) {
		$this->canton = $canton;
	}
	public function getCanton() {
		return $this->canton;
	}

	public function setDistrito($distrito) {
		$this->distrito = $distrito;
	}
	public function getDistrito() {
		return $this->distrito;
	}

	public function setOtraSenias($otraSenias) {
		$this->otraSenias = $otraSenias;
	}
	public function getOtraSenias() {
		return $this->otraSenias;
	}

}


?>