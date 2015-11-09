<?php
class DataUser{

	function DataUser(){
	}
	
	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbuser");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idUser) AS idUser FROM tbuser");
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
			$query = "SELECT idUser FROM tbuser";
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

	function insertar($user){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbuser(idUser, typeUser, charter, 
				name, lastName, password) VALUES (
				".$id.",
				".$user->getTypeUser().",
				'".$user->getCharter()."',
				'".$user->getName()."',
				'".$user->getLastName()."',
				'".$user->getPassword()."')";
			//echo "$query";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}




	function getDoctor(){
		$con = new DBConexion;

		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbuser WHERE typeUser = 1";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$user = new User( $row[0], $row[1], $row[2], $row[3], $row[4], "");
	 				array_push($lista, $user);
			}			
		}
		return $lista;
	}

	


}
?>