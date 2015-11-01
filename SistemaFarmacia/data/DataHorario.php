<?php

class DataHorario{

	function DataHorario(){
	}

		function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbhorario");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idHorario) AS idHorario FROM tbhorario");
			if ($row = mysql_fetch_row($query)) {
				$UltimoId = trim($row[0]);				
			}
			$UltimoId+=1;
		}
		if($cantidadRegistro == $UltimoId){
			return $UltimoId;
		}else{
			$lista = array();
			$contador = 1;
			$query = "SELECT idHorario FROM tbhorario";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){	 		
				array_push($lista, $row[0]);
			}
			foreach ($lista as $dato) {

				if($contador != $dato){
					break;
				}
				$contador++;
			}
			return $contador;
		}			
	}

		function insertar($horario){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbhorario(idHorario, fecha, hora, asunto, correo) VALUES (
				".$id.",
				'".$horario->getFecha()."',
				'".$horario->getHora()."',
				'".$horario->getAsunto()."',
				'".$horario->getCorreo()."')";
		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getHorarios(){

		date_default_timezone_set('America/Costa_Rica');
		$anteayer = strftime("%Y-%m-%d", strtotime("-2 day"));


		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbhorario 
						WHERE fecha >= '".$anteayer."' 
						ORDER BY fecha ASC";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){				
	 			$horario = new Horario($row[0],$row[1],$row[2], "","");				
				array_push($lista, $horario);
			}
			return $lista;
			
		}
	}

}
?>