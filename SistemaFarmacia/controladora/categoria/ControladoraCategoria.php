<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataCategoria.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Categoria.php");

	class ControlCategoria {
		
		function ControlCategoria(){
		}

		

		function insertar(){
		
			$descripcion = $_POST['descripcion'];
			
			$miCategoria = new Categoria( 0, $descripcion );
					
			$data = new DataCategoria();

			if($data->insertar($miCategoria)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idCategoria = $_POST['idCategoria'];						
			$data = new DataCategoria();

			if($data->eliminar($idCategoria)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idCategoria = $_POST['idCategoria'];
			$descripcion = $_POST['descripcion'];


			$data = new DataCategoria();
			$miCategoria = new Categoria( $idCategoria, $descripcion );

			if($data->modificar($miCategoria)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		

		$accion=$_POST['accion'];
		$control = new ControlCategoria;		

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