<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	class ControladoraIdioma {
		
		function ControladoraIdioma(){
		}

		function idioma(){
			session_start();			
			$_SESSION['idioma'] = $_POST['idioma'];
			//echo "dfgjbadsilvk ".$_POST['idioma'];			
	    }
	}

		

		$accion=$_POST['accion'];
		$control = new ControladoraIdioma;		

		if($accion=="lenguage"){
			$control->idioma();
		}
		


?>