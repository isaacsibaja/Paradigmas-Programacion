<h1>Registro de Productos</h1>
<br/>
<a href='#' onclick="cargarListaProducto()">Lista Productos</a>
<br/>
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
                echo " <option value=\"".$categoria->getIdCategoria()."\">".$categoria->getDescripcion()."</option>";
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
                <select id=\"idPresentacionProducto\" name=\"idPresentacionProducto\">";
            foreach ($lista as $presentacion){ 
                echo " <option value=\"".$presentacion->getIdPresentacionProducto()."\">".$presentacion->getDescripcionPresentacion()."</option>";
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
                echo " <option value=\"".$unidadMedida->getIdUnidadMedida()."\">".$unidadMedida->getDescripcionUnidad()."</option>";
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
                echo " <option value=\"".$tipoProducto->getIdTipoProducto()."\">".$tipoProducto->getDescripcionTipo()."</option>";
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

<script lang="JavaScript" src="../js/Producto.js"></script>

