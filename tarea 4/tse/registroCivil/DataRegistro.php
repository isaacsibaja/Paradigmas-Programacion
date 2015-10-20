<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataRegistro{

	function DataRegistro(){
	}	

	function getRegistro($cedula){
		$registro = false;
		$file = fopen("../registroCivil/tse/PADRON_COMPLETO.txt", "r");		
		while(!feof($file)) {
			$fila = fgets($file);
			$array = preg_split("[,]", $fila);			
			if($array[0]==$cedula){
				$registro = new Registro($array[0],$array[5],$array[6],$array[7]);
				break;
			}			
		}
		if($registro){
			return $registro;
		}else{
			return false;
		}		
	fclose($file);
	}
}


?>
