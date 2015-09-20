<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataPrecentacionProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/precentacionProducto.php");

	class ControladoraPrecentacionProducto {
		
		function ControladoraPrecentacionProducto(){
		}		

		function insertar(){
			$descripcionPrecentacion = $_POST['descripcionPrecentacion'];
		
			$precentacionProducto = new precentacionProducto( 0, $descripcionPrecentacion);				
						
			$data = new DataPrecentacionProducto();
			
			if($data->insertar($precentacionProducto)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idPrecentacionProducto = $_POST['idPrecentacionProducto'];						
			$data = new DataPrecentacionProducto();

			if($data->eliminar($idPrecentacionProducto)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idPrecentacionProducto = $_POST['idPrecentacionProducto'];
			$descripcionPrecentacion = $_POST['descripcionPrecentacion'];

			$data = new DataPrecentacionProducto();
			$precentacionProducto = new precentacionProducto( $idPrecentacionProducto, $descripcionPrecentacion);				
			if($data->modificar($precentacionProducto)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		
		$accion=$_POST['accion'];
		$control = new ControladoraPrecentacionProducto;		

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