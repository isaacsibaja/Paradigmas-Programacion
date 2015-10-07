<?php
class Entrega{
		
	
	private	$idEntrega;
	private	$idFactura;
	private	$estadoEntrega;
	

	function Entrega( $idEntrega, $idFactura, $estadoEntrega){

		$this->setIdEntrega($idEntrega);
		$this->setIdFactura($idFactura);
		$this->setEstadoEntrega($estadoEntrega);
				
	}


	public function setIdEntrega($idEntrega) {
		$this->idEntrega = $idEntrega;
	}
	public function getIdEntrega() {
		return $this->idEntrega;
	}

	public function setIdFactura($idFactura) {
		$this->idFactura = $idFactura;
	}
	public function getIdFactura() {
		return $this->idFactura;
	}

	public function setEstadoEntrega($estadoEntrega) {
		$this->estadoEntrega = $estadoEntrega;
	}
	public function getEstadoEntrega() {
		return $this->estadoEntrega;
	}

}

?>