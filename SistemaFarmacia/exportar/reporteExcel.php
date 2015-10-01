	<?php
		header("Content-type: application/vnd.ms-excel");// aqui es del tipo de formato
		header("Content-Disposition: attachment; filename=ReporteProductos.ods");// aqui le damos el nombre al archivo de exell 
		$conexion=mysql_connect("localhost","root","");
		$con = mysql_select_db("bdfarmacia",$conexion);		
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>LISTA DE PRODUCTOS</title>
	</head>

	<body>
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
				  <tr>
				    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA PRODUCTOS</strong></CENTER></td>
				  </tr>

				  <tr>
				    <td><strong>Id</strong></td>
				    <td><strong>Categoria</strong></td>
				    <td><strong>Tipo Producto</strong></td>
				    <td><strong>Presentacion</strong></td>
				    <td><strong>Unidad Medida</strong></td>
				    <td><strong>Descripcion</strong></td>
				  </tr>
				  
				<?PHP


						
					$query = "SELECT idProducto, idCategoria, idTipoProducto, idPrecentacionProducto, idUnidadMedida, descripcion FROM tbproducto";
					$result = @mysql_query($query);
					while($res = mysql_fetch_array($result))
					{	

							$idProducto=$res["idProducto"];
							$idCategoria=$res["idCategoria"];
							$idTipoProducto=$res["idTipoProducto"];
							$idPrecentacionProducto=$res["idPrecentacionProducto"];
							$idUnidadMedida=$res["idUnidadMedida"];
							$descripcion=$res["descripcion"];
	

				?>  
					 <tr>
						<td><?php echo $idProducto; ?></td>
						<td><?php echo $idCategoria; ?></td>
						<td><?php echo $idTipoProducto; ?></td>
						<td><?php echo $idPrecentacionProducto; ?></td>
						<td><?php echo $idUnidadMedida; ?></td>
						<td><?php echo $descripcion; ?></td>                     
					 </tr> 

				<?php
					}
				?>

		</table>
	</body>
</html>