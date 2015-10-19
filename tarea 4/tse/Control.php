<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("./DataRegistro.php");	

	include ("./DBConexion.php");

	class Control {
		
		function Control(){
		}	

		function insertar($registro){
			$data = new DataRegistro();
			$data->insertar($registro);
			/*if($data->insertar($registro)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}*/
			
	    }

	    function eliminar(){
	    	$data = new DataRegistro();
			if($data->eliminar()==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }
	}

?>