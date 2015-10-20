<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	include ("../registroCivil/DataRegistro.php");	
	include ("../dominio/Registro.php");
	class Control {
		
		function Control(){
		}	

		function obtenerCedula($cedula){
			$data = new DataRegistro();
			return $data->getRegistro($cedula);
	    }
	}

?>