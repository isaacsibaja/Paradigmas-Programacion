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
                if($categoria->get_idCategoria() == $producto->getIdCategoria()){
                    echo " <option selected value=\"".$categoria->get_idCategoria()."\">".$categoria->get_descripcion()."</option>";
                }else{
                    echo " <option value=\"".$categoria->get_idCategoria()."\">".$categoria->get_descripcion()."</option>";
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
                <label>Seleccione Precentacion Producto</label> 
                <select id=\"idPrecentacionProducto\" name=\"idPrecentacionProducto\">";
            foreach ($lista as $presentacion){ 
                if ($presentacion->get_idPrecentacionProducto() == $producto->getIdPrecentacionProducto()) {
                    echo " <option selected value=\"".$presentacion->get_idPrecentacionProducto()."\">".$presentacion->get_descripcionPrecentacion()."</option>";
                } else {
                    echo " <option value=\"".$presentacion->get_idPrecentacionProducto()."\">".$presentacion->get_descripcionPrecentacion()."</option>";
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
                if ($unidadMedida->get_idUnidadMedida() == $producto->getIdUnidadMedida()) {
                    echo " <option selected value=\"".$unidadMedida->get_idUnidadMedida()."\">".$unidadMedida->get_descripcionUnidad()."</option>";
                } else {
                    echo " <option value=\"".$unidadMedida->get_idUnidadMedida()."\">".$unidadMedida->get_descripcionUnidad()."</option>";
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
                    if ($tipoProducto->get_idTipoProducto() == $producto->getIdTipoProducto()) {
                    echo " <option selected value=\"".$tipoProducto->get_idTipoProducto()."\">".$tipoProducto->get_descripcionTipo()."</option>";
                } else {
                    echo " <option value=\"".$tipoProducto->get_idTipoProducto()."\">".$tipoProducto->get_descripcionTipo()."</option>";
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
<script lang="JavaScript" src="../js/producto.js"></script>
