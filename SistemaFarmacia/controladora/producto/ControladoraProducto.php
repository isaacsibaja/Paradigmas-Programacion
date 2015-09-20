<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataProducto.php");	
	include ("../../dominio/Producto.php");
	include ("../../data/BDConexion.php");

	class ControladoraProducto {
		
		function ControladoraProducto(){
		}		

		function insertar(){

			$idCategoria = $_POST['idCategoria'];
			$idTipoProducto = $_POST['idTipoProducto'];
			$idPrecentacionProducto = $_POST['idPrecentacionProducto'];
			$idUnidadMedida = $_POST['idUnidadMedida'];
			$descripcion = $_POST['descripcion'];

			$producto = new Producto( 0, $idCategoria, $idTipoProducto,
	 					$idPrecentacionProducto, $idUnidadMedida, $descripcion );				
						
			$data = new DataProducto();

			if($data->insertar($producto)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idProducto = $_POST['idProducto'];						
			$data = new DataProducto();

			if($data->eliminar($idProducto)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){	
 	

			$idProducto = $_POST['idProducto'];
			$idCategoria = $_POST['idCategoria'];
			$idTipoProducto = $_POST['idTipoProducto'];
			$idPrecentacionProducto = $_POST['idPrecentacionProducto'];
			$idUnidadMedida = $_POST['idUnidadMedida'];
			$descripcion = $_POST['descripcion'];


			$data = new DataProducto();
			$producto = new Producto($idProducto, $idCategoria, $idTipoProducto,
	 					$idPrecentacionProducto, $idUnidadMedida, $descripcion );					
			
			if($data->modificar($producto)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		

		$accion=$_POST['accion'];
		$control = new ControladoraProducto;		

		if($accion=="insertar"){
			$control->insertar();
		}
		if($accion=="eliminar"){
			$control->eliminar();
		}
		if($accion=="modificar"){
			$control->modificar();
		}


?>