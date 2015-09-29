<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataPresentacionProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/PresentacionProducto.php");

	class ControladoraPresentacionProducto {
		
		function ControladoraPresentacionProducto(){
		}		

		function insertar(){
			$descripcionPresentacion = $_POST['descripcionPresentacion'];
		
			$presentacionProducto = new presentacionProducto( 0, $descripcionPresentacion);				
						
			$data = new DataPresentacionProducto();
			
			if($data->insertar($presentacionProducto)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idPresentacionProducto = $_POST['idPresentacionProducto'];						
			$data = new DataPresentacionProducto();

			if($data->eliminar($idPresentacionProducto)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idPresentacionProducto = $_POST['idPresentacionProducto'];
			$descripcionPresentacion = $_POST['descripcionPresentacion'];

			$data = new DataPresentacionProducto();
			$presentacionProducto = new presentacionProducto( $idPresentacionProducto, $descripcionPresentacion);				
			if($data->modificar($presentacionProducto)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		
		$accion=$_POST['accion'];
		$control = new ControladoraPresentacionProducto;		

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