<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	if(isset($usuario)){
		include ("../../data/BDConexion.php");
		$con = new DBConexion;
		
		if($con->conectar()==true){
			
			
			
			$consulta = ("SELECT * FROM tbuser WHERE charter='$usuario' AND password ='$password'"); 
			$resultado = mysql_query($consulta) or die (mysql_error());
			$fila = mysql_fetch_array($resultado);
			
			if(!$fila['idUser']){

				header("location: ../../interfaz/index.php");
			}else{
				session_start();
				$_SESSION['name'] = $fila['name'];
				$_SESSION['lastName'] = $fila['lastName'];
				$_SESSION['idUser'] = $fila['idUser'];
				$_SESSION['typeUser'] = $fila['typeUser'];

				if($fila['typeUser'] == 1){					
					//echo "qwerty";
					header("Location: ../../interfaz/manager.php");
				}else if($fila['typeUser'] == 2){				
					header("location: ../../interfaz/Cliente.php");
				}
			}
		}
	}else{
		header("location: ../../interfaz/index.php");
	}
?>