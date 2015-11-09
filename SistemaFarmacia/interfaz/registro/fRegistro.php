<?php
include ("../../controladora/registro/ControlRegistro.php");
$control = new ControlRegistro;
$cedula = $_POST['cedula'];

$cedula = str_replace( "-" ,"", $cedula );

$registro =$control->obtenerCedula($cedula);
	if(!$registro){
		echo "Actualmente este registro no existe";
	}else{
		echo 
		"Cedula: ".$registro->getCedula()."<br/>".
		"Nombre: ".$registro->getNombre()."<br/>".
		"Primer apellido: ".$registro->getApellido1()."<br/>".
		"Segundo apellido: ".$registro->getApellido2()."<br/>";					
	}					
?>
		
<form id="formUser" method="POST">

	<input type="hidden" id="typeUser" name="typeUser" value="2"/>
	<input type="hidden" id="charter" name="charter" value=<?php echo "\"".$registro->getCedula()."\"";?>/>
	<input type="hidden" id="name" name="name" value=<?php echo "\"".$registro->getNombre()."\"";?>/>
	<input type="hidden" id="lastName" name="lastName" value=<?php echo "\"".$registro->getApellido1()." ".$registro->getApellido2()."\"";?>/>

	<label for="password">Contraseña: </label><!-- for descripcion es donde se muestra el msj-->					
	<input type="password" id="password" name="password" placeholder=""/>
	<br/>
	<label for="password2">Contraseña : </label><!-- for descripcion es donde se muestra el msj-->					
	<input type="password" id="password2" name="password2" placeholder=""/>
	<br/>
	<input type="submit" value="Registrar" class="submit"/>	
</form>			

<script lang="JavaScript" src="../js/Registro.js" ></script>