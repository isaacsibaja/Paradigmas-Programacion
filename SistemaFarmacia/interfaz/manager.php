<?php
	//$conex =mysql_connect("localhost","root","") or die("No se pudo conectar con el servidor");
	//mysql_select_db("bdUsuario",$conex);
		
	session_start();
	
	if(!$_SESSION){
		header("location: index.php");
	}
	if($_SESSION){
		$id = $_SESSION['idDoctor'];
		$user = $_SESSION['fullName'];
		
		if($id == 2){
			header("location: ../vista/inicioCliente.php");
		}
	}
?>

<!DOGTYPE>
<html>
	<head>
		<title> Farmacia </title>
		<script src="../js/Index.js"></script>
	</head>
	<body>
		
		<p><h1> Bienvenido al Sistema </h1></p>
		<p><strong>Usuario: <?php echo "$user"; ?></strong></p>
		<div id="contenedorIndicadorBCCR"></div><!--Cargar Lista-->
			<br/>
		<p><h2> Menu </h2></p>
		
		<ul>
			<p><li><a href="../controladora/ctrSesion/ctrCerrarSesion.php">Salir</a></li></p>
		</ul>
		<?php
			include("./menu.php");
		?>
		
	</body>
</html>