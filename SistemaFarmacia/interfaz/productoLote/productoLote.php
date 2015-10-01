<h1>Registro de Productos Lote</h1>
<script lang="JavaScript" src="../js/ProductoLote.js"></script>
<form id="formularioProductoLote" method="POST">	
	<?php
        include ("../../controladora/productoLote/ControladoraGetProductoLote.php");
        $control = new ControladoraGetProductoLote;
        $lista =$control->obtenerProductos();

        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<label>Seleccione Producto</label> 
            	<select id=\"idProducto\" name=\"idProducto\">";
            foreach ($lista as $producto){ 
                echo " <option value=\"".$producto->getIdProducto()."\">".$producto->getDescripcion()."</option>";
            }
            echo "<select/>"; 
        } 
  
        $lista =$control->obtenerAgentesVentas(); 
        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<br>
                <label>Seleccione Agente Venta</label> 
                <select id=\"idAgenteVenta\" name=\"idAgenteVenta\">";
            foreach ($lista as $agenteVentas){ 
                echo " <option value=\"".$agenteVentas->getIdAgenteVenta()."\">".$agenteVentas->getNombreAgente()."</option>";
            }
            echo "<select/>"; 
        } 
	?>
    <br/>
    <label for="concentracion">concentracion </label>
    <input type="text" id="concentracion" name="concentracion" placeholder=""/>
    <br/>
    <label for="fechaVencimiento">fechaVencimiento </label>
    <input type="text" id="fechaVencimiento" name="fechaVencimiento" placeholder=""/>
    <br/>
    <label for="cantidad">cantidad </label>
    <input type="text" id="cantidad" name="cantidad" placeholder=""/>
    <br/>
	<label for="precioCompra">precioCompra </label>
	<input type="text" id="precioCompra" name="precioCompra" placeholder=""/>
	<br/>
    <label for="precioVenta">precioVenta </label>
    <input type="text" id="precioVenta" name="precioVenta" placeholder=""/>
    <br/>
	<input type="submit" value="Registrar" class="submit"/>	
</form>



