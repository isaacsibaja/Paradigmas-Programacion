<?php
include ("../control/Control.php");
$control = new Control;
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
			
