<?php
	include ("../../controladora/productoLote/ControladoraGetProductoLote.php");
	$control = new ControladoraGetProductoLote;
	
	$lista =$control->obtenerProductoLotes();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>idProducto</p></th>
                <th><p>idAgenteVenta</p></th>
                <th><p>Concentracion</p></th>
                <th><p>Fecha Ingreso</p></th>
                <th><p>Fecha Vencimiento</p></th>
                <th><p>Cantidad</p></th>
                <th><p>Precio Compra</p></th>
                <th><p>Precio Venta</p></th>
                <th><p>Eliminar</p></th>
                <th><p>Modificar</p></th>		                   
       		</tr>
    		</thead>
			<tbody>";				
			foreach ($lista as $productoLote){

            	echo "<tr>
            		<td>".$productoLote->getIdLote()."</td>
		            <td>".$productoLote->getIdProducto()."</td>
			        <td>".$productoLote->getIdAgenteVenta()."</td>
			        <td>".$productoLote->getConcentracion()."</td>
			        <td>".$productoLote->getFechaIngreso()."</td>
			        <td>".$productoLote->getFechaVencimiento()."</td>
			        <td>".$productoLote->getCantidad()."</td>
			        <td>".$productoLote->getPrecioCompra()."</td>
			        <td>".$productoLote->getPrecioVenta()."</td>
			        <td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarProductoLote('".$productoLote->getIdLote()."')\"/></td>
			        <td><input type=\"button\" value=\"Modificar\" onclick=\"modificarProductoLoteConsulta('".$productoLote->getIdLote()."')\"/></td>     
		  		</tr>";
			}
		}					
?>
			</tbody>		      				
		</table>
	