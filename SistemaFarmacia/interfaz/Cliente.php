<?php
	//include ("../data/DBConexion.php");
		
	session_start();
	
	if(!$_SESSION){
		header("location: index.php");
	}
	if($_SESSION){
		$typeUser = $_SESSION['typeUser'];
		$user = $_SESSION['name'];		
		$lastName = $_SESSION['lastName'];
		if($typeUser == 1){
			header("location: ../interfaz/manager.php");
		}else{?>

<!DOCTYPE html>
<html lang="es">
	<head >
		<title>Farmacia Cliente</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script lang="JavaScript" src="../js/jquery/jQuery.js" ></script>
		<script src="../js/jquery/jquery.validate.min.js"></script>
		
		<script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/jquery/maskedinput.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.maskMoney.js"></script>

		<script type="text/javascript" src="../js/jquery/timePicker/jquery.ui.timepicker.js"></script><!-- Magia para la fecha y hora-->
		<link rel="stylesheet" type="text/css"  href="../js/jquery/timePicker/jquery.ui.timepicker.css"><!-- Magia para la hora-->
		<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"><!-- Magia para la fecha-->

		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

		
		<script src="../js/Index.js"></script>
		
		</head>

		<body>

		<div id="contenedorIdioma"></div>
	<br/>

		<p><h1> Bienvenido al Sistema </h1></p>
		<p><strong>Usuario: <?php echo $user." ".$lastName;?></strong></p>
		<p><li><a href="../controladora/ctrSesion/ctrCerrarSesion.php">Salir</a></li></p>
	
		<div id="contenedorIndicadorBCCR"></div><!--Cargar Lista-->
		<br/>

		   <label>Seleccione idioma</label> 
            <select onclick=idioma() id="idioma" name="idioma">

            	<option value="Espaniol">Español</option>
                <option value="Arabe">Arabe</option>
           <select/>
  			<br/>
			<?php echo "usuario: ".$user." ".$lastName;?>
			<br/>
			<label><a href='#' onclick="cargarSchedule('./horario/Appointment.php')">Reservar cita previa</a></label>
			<br/>
			<div id="contenedorHorario"></div><!--<h1>contenedor para horario</h1>-->
			<br/>			
			<div id="contenedorFormulario"></div><!--<h1>Formulario</h1>-->
			<br/>
			<div id="contenedorMensaje"></div><!--Msj de estado-->
			<br/>
			<div id="contenedorLista"></div><!--Cargar Lista-->
			<br/>
			</body>

</html>


<?php	
		}
	}
?>