<?php
	//$conex =mysql_connect("localhost","root","") or die("No se pudo conectar con el servidor");
	//mysql_select_db("bdUsuario",$conex);
		
	session_start();
	
	if(!$_SESSION){
		header("location: index.php");
	}
	if($_SESSION){
		$typeUser = $_SESSION['typeUser'];
		$user = $_SESSION['name'];
		$lastName = $_SESSION['lastName'];
		
		if($typeUser == 2){
			header("location: ../interfaz/Cliente.php");
		}
	}
?>

<!DOGTYPE>
<html>
	<head>
		<title> Farmacia Manager</title>
		<script src="../js/Index.js"></script>
	</head>
	<body>
		
		<p><h1> Bienvenido al Sistema </h1></p>
		<p><strong>Usuario: <?php echo $user." ".$lastName;?></strong></p>
		<p><li><a href="../controladora/ctrSesion/ctrCerrarSesion.php">Salir</a></li></p>
	
		<div id="contenedorIndicadorBCCR"></div><!--Cargar Lista-->
		<?php
			include("./menu.php");
		?>
		
	</body>
</html>