<h1>Modificar producto Lotes</h1>

<a href='#' onclick="registrarProductoLote()">Registrar producto Lote</a>
<form id="formularioProductoLoteModificar" method="POST">
	
    <?php
        include ("../../controladora/productoLote/ControladoraGetProductoLote.php");
        $control = new ControladoraGetProductoLote;
         $idProductoLote = $_POST['idProductoLote'];
        $productoLote = $control->obtenerProductoLote($idProductoLote);
        $lista =$control->obtenerProductos();

        if(!$lista){                               
            echo "<br>
                <label>No hay registro</label>";
        }else{
            echo "<label>Seleccione Producto</label> 
                <select id=\"idProducto\" name=\"idProducto\">";
            foreach ($lista as $producto){ 
                  if($producto->getIdProducto() == $productoLote->getIdProducto()){
                   echo " <option value=\"".$producto->getIdProducto()."\">".$producto->getDescripcion()."</option>";
                }else{
                    echo " <option value=\"".$producto->getIdProducto()."\">".$producto->getDescripcion()."</option>";
                }
                
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
                 if($agenteVentas->getIdAgenteVenta() == $productoLote->getIdAgenteVenta()){
                    echo " <option selected value=\"".$agenteVentas->getIdAgenteVenta()."\">".$agenteVentas->getNombreAgente()."</option>";
                }else{
                    echo " <option value=\"".$agenteVentas->getIdAgenteVenta()."\">".$agenteVentas->getNombreAgente()."</option>";
                }
                
            }
            echo "<select/>"; 
        } 
    ?>
	<input type="hidden" id="idLote" name="idLote" value=<?php echo "\"".$productoLote->getIdLote()."\""?> />
     <br/>
    <label for="concentracion">concentracion </label>
    <input type="text" id="concentracion" name="concentracion" value=<?php echo "\"".$productoLote->getConcentracion()."\""?> placeholder=""/>
    <br/>
    <label for="fechaVencimiento">fechaVencimiento </label>
    <input type="text" id="fechaVencimiento" name="fechaVencimiento" value=<?php echo "\"".$productoLote->getFechaVencimiento()."\""?> placeholder=""/>
    <br/>
    <label for="cantidad">cantidad </label>
    <input type="text" id="cantidad" name="cantidad" value=<?php echo "\"".$productoLote->getCantidad()."\""?> placeholder=""/>
    <br/>
    <label for="precioCompra">precioCompra </label>
    <input type="text" id="precioCompra" name="precioCompra" value=<?php echo "\"".$productoLote->getPrecioCompra()."\""?> placeholder=""/>
    <br/>
    <label for="precioVenta">precioVenta </label>
    <input type="text" id="precioVenta" name="precioVenta" value=<?php echo "\"".$productoLote->getPrecioVenta()."\""?> placeholder=""/>
    <br/>			 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/ProductoLote.js"></script>
