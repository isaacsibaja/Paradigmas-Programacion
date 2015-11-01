<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	if(isset($usuario)){
		include ("../../data/BDConexion.php");
		$con = new DBConexion;
		
		if($con->conectar()==true){
			
			
			
			$consulta = ("SELECT * FROM tbdoctor WHERE charter='$usuario' AND password ='$password'"); 
			$resultado = mysql_query($consulta) or die (mysql_error());
			$fila = mysql_fetch_array($resultado);
			
			if(!$fila['idDoctor']){

				header("location: ../../interfaz/index.php");
			}else{
				session_start();
				if($fila['idDoctor'] == 1){
					$_SESSION['idDoctor'] = $fila['idDoctor'];
					$_SESSION['fullName'] = $fila['fullName'];
					echo "qwerty";
					header("Location: ../../interfaz/manager.php");
				}else if($fila['idDoctor'] == 2){
					$_SESSION['idDoctorUsuario'] = $fila['idDoctor'];
					$_SESSION['nombre'] = $fila['user'];
					
					header("location: ../../vista/inicioCliente.php");
				}
			}
		}
	}else{
		header("location: ../../interfaz/index.php");
	}
?>