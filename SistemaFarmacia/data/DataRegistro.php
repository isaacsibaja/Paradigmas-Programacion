<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataRegistro{

	function DataRegistro(){
	}	

	function getRegistro($cedula){
		$registro = false;
		$ubicacion = false;
		$ubicacion;
		$file = fopen("../../data/tse/PADRON_COMPLETO.txt", "r");		
		while(!feof($file)) {
			$fila = fgets($file);
			$array = preg_split("[,]", $fila);			
			if($array[0]==$cedula){
				$ubicacion = $array[1];
				//echo "Ubicacion".$array[1]."<br/>";
				/*echo "Fecha de vencimento de cedula: "
				.$array[3][0].
				$array[3][1].
				$array[3][2].
				$array[3][3]."-".
				$array[3][4].
				$array[3][5]."-".
				$array[3][6].
				$array[3][7].
				"<br/>";
				if($array[2] == 1){
					echo "Sexo: Hombre<br/>";
				}else{
					echo "Sexo: Mujer<br/>";
				}	*/			
				$registro = new Registro($array[0],$array[5],$array[6],$array[7]);
				break;
			}			
		}
		//+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
		if($ubicacion){
			$file = fopen("../../data/tse/Distelec.txt", "r");		
			while(!feof($file)) {
				$fila = fgets($file);
				$array = preg_split("[,]", $fila);			
				if($array[0]==$ubicacion){
					echo "Provincia: ".$array[1]."<br/>";
					echo "Canton: ".$array[2]."<br/>";
					echo "Distrito: ".$array[3]."<br/>";				
					break;
				}			
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
