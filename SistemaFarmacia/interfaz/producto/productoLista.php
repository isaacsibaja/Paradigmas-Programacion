<?php
	include ("../../controladora/producto/ControladoraGetProducto.php");
	$control = new ControladoraGetProducto;
	
	$lista =$control->obtenerProductos();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Categoria</p></th>
                <th><p>Tipo Producto</p></th>
                <th><p>Presentacion Producto</p></th>
                <th><p>Unidad Medida</p></th>
                <th><p>Descripcion</p></th>
                <th><p>Eliminar</p></th>
                <th><p>Modificar</p></th>	                   
       		</tr>
    		</thead>
			<tbody>";
			$i=0;				
			foreach ($lista as $producto){

            	echo "<tr>";
		            echo "<td>".$producto->getIdProducto()."</td>";
			        echo "<td>".$producto->getIdCategoria()."</td>";
			        echo "<td>".$producto->getIdTipoProducto()."</td>";
			        echo "<td>".$producto->getIdPresentacionProducto()."</td>";
			        echo "<td>".$producto->getIdUnidadMedida()."</td>";
			        echo "<td>".$producto->getDescripcion()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarProducto('".$producto->getIdProducto()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarProductoConsulta('".$producto->getIdProducto()."')\"/></td>";     
		  		echo "</tr>";
			$i++;
			}
		}					
?>
			</tbody>		      				
		</table>
	