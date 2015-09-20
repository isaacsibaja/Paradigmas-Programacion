<h1>Registro de Productos</h1>
<a href='#' onclick="cargarListaProducto()">Lista Productos</a>

<form id="formularioProducto" method="POST">	
	<?php
        include ("../../controladora/producto/ControladoraGetProductoCombo.php");
        $control = new ControladoraGetProductoCombo;
        $lista =$control->obtenerCategorias();

        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<label>Seleccione Categoria</label> 
            	<select id=\"idCategoria\" name=\"idCategoria\">";
            foreach ($lista as $categoria){ 
                echo " <option value=\"".$categoria->get_idCategoria()."\">".$categoria->get_descripcion()."</option>";
            }
            echo "<select/>"; 
        } 
  
        $lista =$control->obtenerPresentacionesProductos(); 
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<br>
                <label>Seleccione Precentacion Producto</label> 
                <select id=\"idPrecentacionProducto\" name=\"idPrecentacionProducto\">";
            foreach ($lista as $presentacion){ 
                echo " <option value=\"".$presentacion->get_idPrecentacionProducto()."\">".$presentacion->get_descripcionPrecentacion()."</option>";
            }
            echo "<select/>"; 
        } 

        
        $lista =$control->obtenerUnidadesMedidas(); 
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<br>
                <label>Seleccione Unidad Medidad</label> 
                <select id=\"idUnidadMedida\" name=\"idUnidadMedida\">";
            foreach ($lista as $unidadMedida){ 
                echo " <option value=\"".$unidadMedida->get_idUnidadMedida()."\">".$unidadMedida->get_descripcionUnidad()."</option>";
            }
            echo "<select/>"; 
        } 

        $lista =$control->obtenerTiposProductos(); 
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<br>
                <label>Seleccione Tipo Producto</label> 
                <select id=\"idTipoProducto\" name=\"idTipoProducto\">";
            foreach ($lista as $tipoProducto){ 
                echo " <option value=\"".$tipoProducto->get_idTipoProducto()."\">".$tipoProducto->get_descripcionTipo()."</option>";
            }
            echo "<select/>"; 
        } 
	?>
    <br/>
	<label for="descripcion">Descripcion </label>
	<input type="text" id="descripcion" name="descripcion" placeholder=""/>
	<br/>
	<input type="submit" value="Registrar" class="submit"/>	
</form>

<script lang="JavaScript" src="../js/producto.js"></script>

