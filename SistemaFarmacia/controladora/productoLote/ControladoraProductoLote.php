<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataProductoLote.php");	
	include ("../../dominio/ProductoLote.php");
	include ("../../data/BDConexion.php");

	class ControladoraProductoLoteLote {
		
		function ControladoraProductoLoteLote(){
		}		
		
		function insertar(){
			

			date_default_timezone_set('America/Costa_Rica');
			$idProducto = $_POST['idProducto'];
			$idAgenteVenta = $_POST['idAgenteVenta'];
			$concentracion = $_POST['concentracion'];
			$fechaIngreso = strftime("%Y-%m-%d");
			$fechaVencimiento = date_create($_POST['fechaVencimiento']);
			$fechaVencimiento = DATE_FORMAT($fechaVencimiento,'Y-m-d');
			$cantidad = $_POST['cantidad'];

			$precioCompra = str_replace("₡", "", $_POST['precioCompra']);// ( se indica el carácter que se quiere remplazar  ,  el nuevo carácter, el string que se desea modificar  )
			$precioCompra = str_replace(".", "", $precioCompra);		
			$precioCompra = str_replace(",", ".", $precioCompra);

			$precioVenta = str_replace("₡", "", $_POST['precioVenta']);// ( se indica el carácter que se quiere remplazar  ,  el nuevo carácter, el string que se desea modificar  )
			$precioVenta = str_replace(".", "", $precioVenta);		
			$precioVenta = str_replace(",", ".", $precioVenta);
	
			
			
			$ProductoLote = new ProductoLote(0, $idProducto, $idAgenteVenta, $concentracion,
	 		$fechaIngreso, $fechaVencimiento, $cantidad, $precioCompra, $precioVenta);				
						
			$data = new DataProductoLote();

			if($data->insertar($ProductoLote)==true){
				echo "Datos guardados correctamente";
			}else{
				echo "Error del sistema";
			}
			
	    }

	    function eliminar(){		
			$idProductoLote = $_POST['idProductoLote'];						
			$data = new DataProductoLote();

			if($data->eliminar($idProductoLote)==true){
				echo "Datos eliminados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }

	     function modificar(){	
	     	
 		date_default_timezone_set('America/Costa_Rica');
	     	$idProductoLote = $_POST['idLote'];	
			$idProducto = $_POST['idProducto'];
			$idAgenteVenta = $_POST['idAgenteVenta'];
			$concentracion = $_POST['concentracion'];
			$fechaVencimiento = date_create($_POST['fechaVencimiento']);
			$fechaVencimiento = DATE_FORMAT($fechaVencimiento,'Y-m-d');
			$cantidad = $_POST['cantidad'];
			
			$precioCompra = str_replace("₡", "", $_POST['precioCompra']);// ( se indica el carácter que se quiere remplazar  ,  el nuevo carácter, el string que se desea modificar  )
			$precioCompra = str_replace(".", "", $precioCompra);		
			$precioCompra = str_replace(",", ".", $precioCompra);

			$precioVenta = str_replace("₡", "", $_POST['precioVenta']);// ( se indica el carácter que se quiere remplazar  ,  el nuevo carácter, el string que se desea modificar  )
			$precioVenta = str_replace(".", "", $precioVenta);		
			$precioVenta = str_replace(",", ".", $precioVenta);


			$data = new DataProductoLote();
			$ProductoLote = new ProductoLote($idProductoLote, $idProducto, $idAgenteVenta, $concentracion,
	 		"", $fechaVencimiento, $cantidad, $precioCompra, $precioVenta);				
			
			if($data->modificar($ProductoLote)==true){
				echo "Datos modicados correctamente";
			}else{
				echo "Error del sistema";
			}			
	    }


	}

		

		$accion=$_POST['accion'];
		$control = new ControladoraProductoLoteLote;		

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