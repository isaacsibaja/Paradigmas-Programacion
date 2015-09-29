<?php
class Proveedor{
		
	
	private	$idProveedor;
	private	$idProveedorDireccion;
	private	$idCasaComercial;
	private	$nombreProveedor;
	private	$telefonoProveedor;
	private	$correoProveedor;




	function Proveedor( $idProveedor, $idProveedorDireccion, $idCasaComercial,
	 $nombreProveedor, $telefonoProveedor, $correoProveedor ){
		$this->setIdProveedor($idProveedor);
		$this->setIdProveedorDireccion($idProveedorDireccion);
		$this->setIdCasaComercial($idCasaComercial);
		$this->setNombreProveedor($nombreProveedor);
		$this->setTelefonoProveedor($telefonoProveedor);
		$this->setCorreoProveedor($correoProveedor);
		
	}


	public function setIdProveedor($idProveedor) {
		$this->idProveedor = $idProveedor;
	}
	public function getIdProveedor() {
		return $this->idProveedor;
	}

	public function setIdProveedorDireccion($idProveedorDireccion) {
		$this->idProveedorDireccion = $idProveedorDireccion;
	}
	public function getIdProveedorDireccion() {
		return $this->idProveedorDireccion;
	}

	public function setIdCasaComercial($idCasaComercial) {
		$this->idCasaComercial = $idCasaComercial;
	}
	public function getIdCasaComercial() {
		return $this->idCasaComercial;
	}

	public function setNombreProveedor($nombreProveedor) {
		$this->nombreProveedor = $nombreProveedor;
	}
	public function getNombreProveedor() {
		return $this->nombreProveedor;
	}

	public function setTelefonoProveedor($telefonoProveedor) {
		$this->telefonoProveedor = $telefonoProveedor;
	}
	public function getTelefonoProveedor() {
		return $this->telefonoProveedor;
	}

	public function setCorreoProveedor($correoProveedor) {
		$this->correoProveedor = $correoProveedor;
	}
	public function getCorreoProveedor() {
		return $this->correoProveedor;
	}

}



?>