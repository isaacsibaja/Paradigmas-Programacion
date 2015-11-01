<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	include ("../../data/DataRegistro.php");	
	include ("../../dominio/Registro.php");
	class ControlRegistro {
		
		function ControlRegistro(){
		}	

		function obtenerCedula($cedula){
			$data = new DataRegistro();
			return $data->getRegistro($cedula);
	    }
	}

?>