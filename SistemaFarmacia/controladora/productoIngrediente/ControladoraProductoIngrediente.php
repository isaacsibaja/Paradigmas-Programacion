<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataProductoIngrediente.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/ProductoIngrediente.php");

	class ControladoraProductoIngrediente {
		
		function ControladoraProductoIngrediente(){
		}		

		function insertar(){
			$idProducto = $_POST['idProducto'];
			$idIngredienteActivo = $_POST['idIngredienteActivo'];
			
			$productoIngrediente = new ProductoIngrediente( $idProducto, $idIngredienteActivo);			
						
			$data = new DataProductoIngrediente();

			if($data->insertar($productoIngrediente)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idProducto = $_POST['idProducto'];
			$idIngredienteActivo = $_POST['idIngredienteActivo'];					
			$data = new DataProductoIngrediente();

			if($data->eliminar($idProducto, $idIngredienteActivo)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idProducto = $_POST['idProducto'];
			$idIngredienteActivo = $_POST['idIngredienteActivo'];	

			$data = new DataProductoIngrediente();
			$productoIngrediente = new ProductoIngrediente( $idProductoIngrediente,
														 $descripcionIngrediente);				
			if($data->modificar($idProducto, $idIngredienteActivo)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	}
		
		$accion=$_POST['accion'];
		$control = new ControladoraProductoIngrediente;		

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