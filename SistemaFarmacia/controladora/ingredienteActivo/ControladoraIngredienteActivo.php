<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataIngredienteActivo.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/IngredienteActivo.php");

	class ControladoraIngredienteActivo {
		
		function ControladoraIngredienteActivo(){
		}		

		function insertar(){
			$descripcionIngrediente = $_POST['descripcionIngrediente'];
			//echo "$descripcionIngrediente<br/>";
			$MiIngredienteActivo = new IngredienteActivo( 0, $descripcionIngrediente);			
						
			$data = new DataIngredienteActivo();

			if($data->insertar($MiIngredienteActivo)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idIngredienteActivo = $_POST['idIngredienteActivo'];						
			$data = new DataIngredienteActivo();

			if($data->eliminar($idIngredienteActivo)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idIngredienteActivo = $_POST['idIngredienteActivo'];
			$descripcionIngrediente = $_POST['descripcionIngrediente'];

			$data = new DataIngredienteActivo();
			$MiIngredienteActivo = new IngredienteActivo( $idIngredienteActivo,
														 $descripcionIngrediente);				
			if($data->modificar($MiIngredienteActivo)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	}
		
		$accion=$_POST['accion'];
		$control = new ControladoraIngredienteActivo;		

		if($accion=="insertar"){
			$control->insertar();
		}
		if($accion=="eliminar"){
			$control->eliminar();
		}
		if($accion=="modificar"){
			$control->modificar();
		}
?>