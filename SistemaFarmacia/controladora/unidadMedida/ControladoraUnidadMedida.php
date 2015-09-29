<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataUnidadMedida.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/UnidadMedida.php");

	class ControladoraUnidadMedida {
		
		function ControladoraUnidadMedida(){
		}		

		function insertar(){
			$descripcionUnidad = $_POST['descripcionUnidad'];
		
			$unidadMedida = new unidadMedida( 0, $descripcionUnidad);				
						
			$data = new DataUnidadMedida();
			
			if($data->insertar($unidadMedida)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idUnidadMedida = $_POST['idUnidadMedida'];						
			$data = new DataUnidadMedida();

			if($data->eliminar($idUnidadMedida)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idUnidadMedida = $_POST['idUnidadMedida'];
			$descripcionUnidad = $_POST['descripcionUnidad'];

			$data = new DataUnidadMedida();
			$unidadMedida = new unidadMedida( $idUnidadMedida, $descripcionUnidad);				
			if($data->modificar($unidadMedida)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		
		$accion=$_POST['accion'];
		$control = new ControladoraUnidadMedida;		

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