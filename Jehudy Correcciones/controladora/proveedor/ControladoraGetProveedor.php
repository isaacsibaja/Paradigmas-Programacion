<?php
	include ("../../data/DataProveedor.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Proveedor.php");
class ControladoraGetProveedor {

		
	function ControladoraGetProveedor(){
	}

	function obtenerProveedores(){		
		$data = new DataProveedor;
		$lista =$data->getProveedores();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerProveedor($id){
	
		$data = new DataProveedor;
		$proveedor =$data->getProveedor($id);
		if(!$proveedor){
			return false;
		}else{
			return $proveedor;
		}
	}
}
?>