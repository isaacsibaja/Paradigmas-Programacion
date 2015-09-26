<h1>Modificar Productos</h1>
<a href='#' onclick="cargarListaProducto()">Lista Productos</a>
<br/>
<a href='#' onclick="registrarProducto()">Registrar Producto</a>
<form id="formularioProductoModificar" method="POST">
	
<?php

	include ("../../controladora/producto/ControladoraGetProductoCombo.php");
    $control = new ControladoraGetProductoCombo;
    $idProducto = $_POST['idProducto']; 
    $producto =$control->obtenerProducto($idProducto);    	   
        
    $lista =$control->obtenerCategorias();
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<label>Seleccione Categoria</label> 
                <select id=\"idCategoria\" name=\"idCategoria\">";
            foreach ($lista as $categoria){ 
                if($categoria->getIdCategoria() == $producto->getIdCategoria()){
                    echo " <option selected value=\"".$categoria->getIdCategoria()."\">".$categoria->getDescripcion()."</option>";
                }else{
                    echo " <option value=\"".$categoria->getIdCategoria()."\">".$categoria->getDescripcion()."</option>";
                }
            }
            echo "<select/>"; 
        } 
  
        $lista =$control->obtenerPresentacionesProductos(); 
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<br>
                <label>Seleccione Presentacion Producto</label> 
                <select id=\"idPresentacionProducto\" name=\"idPresentacionProducto\">";
            foreach ($lista as $presentacion){ 
                if ($presentacion->getIdPresentacionProducto() == $producto->getIdPresentacionProducto()) {
                    echo " <option selected value=\"".$presentacion->getIdPresentacionProducto()."\">".$presentacion->getDescripcionPresentacion()."</option>";
                } else {
                    echo " <option value=\"".$presentacion->getIdPresentacionProducto()."\">".$presentacion->getDescripcionPresentacion()."</option>";
                } 
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
                if ($unidadMedida->getIdUnidadMedida() == $producto->getIdUnidadMedida()) {
                    echo " <option selected value=\"".$unidadMedida->getIdUnidadMedida()."\">".$unidadMedida->getDescripcionUnidad()."</option>";
                } else {
                    echo " <option value=\"".$unidadMedida->getIdUnidadMedida()."\">".$unidadMedida->getDescripcionUnidad()."</option>";
                }
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
                    if ($tipoProducto->getIdTipoProducto() == $producto->getIdTipoProducto()) {
                    echo " <option selected value=\"".$tipoProducto->getIdTipoProducto()."\">".$tipoProducto->getDescripcionTipo()."</option>";
                } else {
                    echo " <option value=\"".$tipoProducto->getIdTipoProducto()."\">".$tipoProducto->getDescripcionTipo()."</option>";
                }
                    
                }
                echo "<select/>"; 
            } 
   			
	echo "
	<br/>
	<input type=\"hidden\" id=\"idProducto\" name=\"idProducto\" value=\"".$producto->getIdProducto()."\" />
    <br/>
	<label for=\"descripcion\">descripcion: </label>
	<input type=\"text\" id=\"descripcion\" name=\"descripcion\" value=\"".$producto->getDescripcion()."\" placeholder=\"\"/>
	<br/>";
?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/Producto.js"></script>
