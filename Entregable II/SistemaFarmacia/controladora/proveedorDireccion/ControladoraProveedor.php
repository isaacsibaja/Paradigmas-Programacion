<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataProveedor.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Proveedor.php");

	class ControladoraProveedor {
		
		function ControladoraProveedor(){
		}		

		function insertar(){
			$idProveedorDireccion = $_POST['idProveedorDireccion'];
			$idCasaComercial = $_POST['idCasaComercial'];
			$nombreProveedor = $_POST['nombreProveedor'];
			$telefonoProveedor = $_POST['telefonoProveedor'];
			$correoProveedor = $_POST['correoProveedor'];
		
			$proveedor = new Proveedor( 0, $idProveedorDireccion, $idCasaComercial,
	 					$nombreProveedor, $telefonoProveedor, $correoProveedor );				
						
			$data = new DataProveedor();

			if($data->insertar($proveedor)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idProveedor = $_POST['idProveedor'];						
			$data = new DataProveedor();

			if($data->eliminar($idProveedor)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){		
			$idProveedor = $_POST['idProveedor'];
			$idProveedorDireccion = $_POST['idProveedorDireccion'];
			$idCasaComercial = $_POST['idCasaComercial'];
			$nombreProveedor = $_POST['nombreProveedor'];
			$telefonoProveedor = $_POST['telefonoProveedor'];
			$correoProveedor = $_POST['correoProveedor'];


			$data = new DataProveedor();
			$proveedor = new Proveedor( $idProveedor, $idProveedorDireccion, $idCasaComercial,
	 					$nombreProveedor, $telefonoProveedor, $correoProveedor );				
			
			if($data->modificar($proveedor)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		

		$accion=$_POST['accion'];
		$control = new ControladoraProveedor;		

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