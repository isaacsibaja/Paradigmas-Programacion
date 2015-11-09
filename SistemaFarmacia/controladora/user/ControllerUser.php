<?php

	include ("../../data/DataUser.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/User.php");

	class ControllerUser {
		
		function ControllerUser(){
		}	

		function insertar(){
			$typeUser = $_POST['typeUser'];
			$charter = $_POST['charter'];
			$name = $_POST['name'];
			$lastName = $_POST['lastName'];
			$password = $_POST['password'];
		
			$user = new User( 0, $typeUser, $charter, $name, $lastName, $password);		
						
			$data = new DataUser();

			if($data->insertar($user)==true){
				echo "<label>Se guardo correcamente</label><br/>";
		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$control = new ControllerUser;		

		if($accion=="insertar"){
			$control->insertar();
		}
?>