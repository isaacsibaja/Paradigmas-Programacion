<a href='#' onclick="cargarLista()">Lista Categorias</a>
<br/>
<a href='#' onclick="registrarCategoria()">Registrar Categoria</a>

<?php
	include ("../../controladora/categoria/ControladoraCategoriaLista.php");
	$control = new ControladoraCategoriaLista;
	$idCategoria = $_POST['idCategoria'];
	$miCategoria =$control->obtenerCategoria($idCategoria);	
?> 
<form id="formularioCategoriaModificar" method="POST">
	<h1>Modificar Categorias</h1>
	<label for="descripcion">Descripcion: </label><!-- for descripcion es donde se muestra el msj-->					
	<?php
		echo "<input type=\"hidden\" id=\"idCategoria\" name=\"idCategoria\" value=\"".$miCategoria->get_idCategoria()."\" />";
		echo "<input type=\"text\" id=\"descripcion\" name=\"descripcion\"  value=\"".$miCategoria->get_descripcion()."\" />";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/categoria.js" ></script>
