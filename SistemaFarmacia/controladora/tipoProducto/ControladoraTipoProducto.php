<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataTipoProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/TipoProducto.php");

	class ControladoraTipoProducto {
		
		function ControladoraTipoProducto(){
		}		

		function insertar(){
			$descripcionTipo = $_POST['descripcionTipo'];
		
			$tipoProducto = new tipoProducto( 0, $descripcionTipo);				
						
			$data = new DataTipoProducto();
			if($data->insertar($tipoProducto)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idTipoProducto = $_POST['idTipoProducto'];						
			$data = new DataTipoProducto();

			if($data->eliminar($idTipoProducto)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idTipoProducto = $_POST['idTipoProducto'];
			$descripcionTipo = $_POST['descripcionTipo'];

			$data = new DataTipoProducto();
			$tipoProducto = new tipoProducto( $idTipoProducto, $descripcionTipo);				
			if($data->modificar($tipoProducto)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		
		$accion=$_POST['accion'];
		$control = new ControladoraTipoProducto;		

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