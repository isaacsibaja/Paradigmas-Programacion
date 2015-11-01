<?php
	//include ("../data/DBConexion.php");
		
	session_start();
	
	if($_SESSION){
		$id = $_SESSION['idDoctor'];
		
		if($id == 1){
			header("location: ./manager.php");
		}else if($id == 2){
			//header("location: ./.php");
		}
	}else{?>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
				
				<style>
					#div {
						width:250px;
						margin:20% 41%;
						text-aling:center; 
					}
				</style>
				
			</head>
			<body>
				<div id="div">
					<form action="../controladora/ctrSesion/ctrInicioSesion.php" method="post">
						<p><h2> Sistema Farmacia </h2></p> 
					
						<p><input type="text" name="usuario" placeholder="Nombre Usuario"></p>
						<p><input type="password" name="password" placeholder="Contraseña"></p>

						<p><input type="submit" name="submit" value="Iniciar sesion"></p>
					</form>
				<div>
			</body>
		</html>
	<?php	
	}
?>