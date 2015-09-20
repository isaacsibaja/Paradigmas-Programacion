<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Importar</title>
	</head>
	<body>
		<div align="center">
			<form action="../herramientas/importarExcel/importar.php" method="post" enctype="multipart/form-data" name="form1">
				<table width="90%" border="0">
					<tr>
						<td>
							<strong>Agregar Archivo de Excel </strong>
						  
							<input type="file" name="archivo" id="archivo"> 
							<strong>Desea Actualizar la BD</strong>
							<label><input type="radio" name="radio" value="s" checked />SI</label>
							<label><input type="radio" name="radio" value="n" />NO</label>
							
							<input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>