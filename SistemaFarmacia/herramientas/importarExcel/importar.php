<?php
	include "../../data/BDConexion.php"; // conexion

	if(isset($_POST['radio'])){ // pregunta si hay un rodio button seleccionado
		$nameEXCEL = $_FILES['archivo']['name']; // obtiene el nombre del archivo
		$tmpEXCEL = $_FILES['archivo']['tmp_name']; // un temporal del archivo
		$extEXCEL = pathinfo($nameEXCEL); // la ruta del archivo
		$urlnueva = "archivo.xls";	// una direccion y nombre nueva donde copea el archivo para luego leerlo
		if(is_uploaded_file($tmpEXCEL)){
			copy($tmpEXCEL,$urlnueva);	// copea el archivo en la ruta nueva para luego leerlo
			echo '<div align="center"><strong>Datos Actualizados con Exito</strong></div>'; // mensaje
		}
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Importar</title>
	</head>
	<body>
		<div align="center">
			<table border="1" width="100%">
				<thead>
					<tr>
			            <th>B</th>
			            <th>C</th>
			            <th>D</th>
						<th>E</th>
						<th>F</th>
						<th>G</th>
			        </tr>
			    	<tr>
			            <th>idCategoria</th>
			            <th>idTipoProducto</th>
			            <th>idPrecentacionProducto</th>
						<th>idUnidadMedida</th>
						<th>descripcion</th>
						<th>estado</th>
			        </tr>
				</thead>
			    <tbody>
				  	<?php
					$con = new DBConexion;
					if($con->conectar()==true){	
						if(isset($_POST['radio'])){ // pregunta si hay un rodio button seleccionado
							require_once 'PHPExcel/PHPExcel/IOFactory.php'; // llama a una la libreria de PHPExcel
							
							$objPHPExcel = PHPExcel_IOFactory::load('archivo.xls');//toma el archivo en donde lo copeamos (aqui tiene que ser el mismo nombre o la direccion nueva que le dimos arriba)
							$objHoja=$objPHPExcel->getActiveSheet()->toArray(true,true,true,true,true,true,true);// toma lo que tiene el Excel (un true por cada columna en el documento excel)
							foreach ($objHoja as $iIndice=>$objCelda) { // recorrer el documento
								echo '
									<tr>
										<td>'.$objCelda['A'].'</td> 
										<td>'.$objCelda['B'].'</td> 
										<td>'.$objCelda['C'].'</td> <!-- muestra cada fila del documento-->
										<td>'.$objCelda['D'].'</td> 
										<td>'.$objCelda['E'].'</td> 
									
								';       
								$idCategoria=$objCelda['A'];     
								$idTipoProducto=$objCelda['B'];  
								$idPrecentacionProducto=$objCelda['C'];     // guarda los datos de cada fila para insertarlos en la BD
								$idUnidadMedida=$objCelda['D'];   
								$descripcion=$objCelda['E'];      
											
								if($_POST['radio']=='s'){ // si el radio button seleccionado es el de actualizar base de datos
									$sql="INSERT INTO tbproducto ( idCategoria, idTipoProducto,
									 	idPrecentacionProducto, idUnidadMedida, descripcion) VALUES (
										".$idCategoria.",
										".$idTipoProducto.",
										".$idPrecentacionProducto.",
										".$idUnidadMedida.",
										'".$descripcion."')"; // inserta en la base de datos fila x fila									
									
									$result = mysql_query($sql);
									
									if (!$result){
										echo "<td>Error</td>
											</tr>"; 									
									}else{
										echo "<td>Se guardo correctamente</td>
										</tr>"; 
									}
								}else{
									echo "<td>No hay operacion</td>
											</tr>";
								}
							}
							unlink($urlnueva); // borra el archivo Excel copeado
						}
					}
					?>
		    	</tbody>
			</table>
		</div>
	</body>
</html>