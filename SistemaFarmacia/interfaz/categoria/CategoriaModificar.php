<?php
	include ("../../controladora/categoria/ControladoraCategoriaLista.php");
	$control = new ControladoraCategoriaLista;
	$idCategoria = $_POST['idCategoria'];
	$categoria =$control->obtenerCategoria($idCategoria);	
?> 
<form id="formularioCategoriaModificar" method="POST">
	<h1>Modificar Categorias</h1>
	<br/>
	<a href='#' onclick="cargarLista()">Lista Categorias</a>
	<br/>
	<a href='#' onclick="registrarCategoria()">Registrar Categoria</a>
	<label for="descripcion">Descripcion: </label><!-- for descripcion es donde se muestra el msj-->					
	<?php
		echo "<input type=\"hidden\" id=\"idCategoria\" name=\"idCategoria\" value=\"".$categoria->getIdCategoria()."\" />";
		echo "<input type=\"text\" id=\"descripcion\" name=\"descripcion\"  value=\"".$categoria->getDescripcion()."\" />";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/Categoria.js" ></script>
