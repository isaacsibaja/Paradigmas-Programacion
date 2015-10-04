<?php
class ProductoReceta{
		
	
	private	$idProducto;
	private	$idReceta;
	
	function ProductoReceta( $idProducto, $idReceta){

		$this->setIdProducto($idProducto);
		$this->setIdReceta($idReceta);
		  		
	}


	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setIdReceta($idReceta) {
		$this->idReceta = $idReceta;                                                                                                                                                                                      
	}
	public function getIdReceta() {
		return $this->idReceta;
	}


}

?>