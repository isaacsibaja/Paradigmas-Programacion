<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataAgenteVentas.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/AgenteVentas.php");

	class ControladoraAgenteVentas {
		
		function ControladoraAgenteVentas(){
		}		

		function insertar(){
			$nombreAgente = $_POST['nombreAgente'];
			$telefonoAgente = $_POST['telefonoAgente'];
			$correoAgente = $_POST['correoAgente'];
		
			$agenteVentas = new agenteVentas( 0, $nombreAgente, $telefonoAgente,
	 					$correoAgente);				
						
			$data = new DataAgenteVentas();

			if($data->insertar($agenteVentas)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idAgenteVenta = $_POST['idAgenteVenta'];						
			$data = new DataAgenteVentas();

			if($data->eliminar($idAgenteVenta)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idAgenteVenta = $_POST['idAgenteVenta'];
			$nombreAgente = $_POST['nombreAgente'];
			$telefonoAgente = $_POST['telefonoAgente'];
			$correoAgente = $_POST['correoAgente'];

			$data = new DataAgenteVentas();
			$agenteVentas = new agenteVentas( $idAgenteVenta, $nombreAgente, $telefonoAgente,
	 					$correoAgente);				
			
			if($data->modificar($agenteVentas)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		$accion=$_POST['accion'];
		$control = new ControladoraAgenteVentas;		

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