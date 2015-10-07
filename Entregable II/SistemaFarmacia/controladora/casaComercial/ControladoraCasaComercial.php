<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataCasaComercial.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/CasaComercial.php");

	class ControladoraCasaComercial {
		
		function ControladoraCasaComercial(){
		}		

		function insertar(){
			$direccionCasaComercial = $_POST['direccionCasaComercial'];
			$nombreCasaComercial = $_POST['nombreCasaComercial'];
			$telefonoCasaComercial = $_POST['telefonoCasaComercial'];
			$correoCasaComercial = $_POST['correoCasaComercial'];
			$faxCasaComercial = $_POST['faxCasaComercial'];
		
			$casaComercial = new CasaComercial( 0, $direccionCasaComercial, $nombreCasaComercial,
	 					$telefonoCasaComercial, $correoCasaComercial, $faxCasaComercial );				
						
			$data = new DataCasaComercial();

			if($data->insertar($casaComercial)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idCasaComercial = $_POST['idCasaComercial'];						
			$data = new DataCasaComercial();

			if($data->eliminar($idCasaComercial)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idCasaComercial = $_POST['idCasaComercial'];
			$direccionCasaComercial = $_POST['direccionCasaComercial'];
			$nombreCasaComercial = $_POST['nombreCasaComercial'];
			$telefonoCasaComercial = $_POST['telefonoCasaComercial'];
			$correoCasaComercial = $_POST['correoCasaComercial'];
			$faxCasaComercial = $_POST['faxCasaComercial'];


			$data = new DataCasaComercial();
			$casaComercial = new CasaComercial( $idCasaComercial, $direccionCasaComercial, $nombreCasaComercial,
	 					$telefonoCasaComercial, $correoCasaComercial, $faxCasaComercial );				
			if($data->modificar($casaComercial)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		
		$accion=$_POST['accion'];
		$control = new ControladoraCasaComercial;		

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