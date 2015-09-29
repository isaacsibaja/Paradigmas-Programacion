<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataInventario.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Inventario.php");

	class ControladoraInventario {
		
		function ControladoraInventario(){
		}		

		function insertar(){
			$idProducto = $_POST['idProducto'];
			$cantidad = $_POST['cantidad'];
		
			$inventario = new Inventario( 0, $idProducto, $cantidad);				
						
			$data = new DataInventario();

			if($data->insertar($inventario)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idInventario = $_POST['idInventario'];						
			$data = new DataInventario();

			if($data->eliminar($idInventario)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idInventario = $_POST['idInventario'];
			$idProducto = $_POST['idProducto'];
			$cantidad = $_POST['cantidad'];

			$data = new DataInventario();
			$inventario = new Inventario( $idInventario, $idProducto, $cantidad);				
			if($data->modificar($inventario)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	}
		
		$accion=$_POST['accion'];
		$control = new ControladoraInventario;		

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