<?php
	include ("../../controladora/tipoProducto/ControladoraGetTipoProducto.php");
	$control = new ControladoraGetTipoProducto;
	
	$lista =$control->obtenerTiposProductos();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Descripcion</p></th>
                <th><p>Eliminar</p></th>
                <th><p>Modificar</p></th>	                   
       		</tr>
    		</thead>
			<tbody>";		
			foreach ($lista as $tipoProducto){
            	echo "<tr>";
		            echo "<td>".$tipoProducto->get_idTipoProducto()."</td>";
			        echo "<td>".$tipoProducto->get_descripcionTipo()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarTipoProducto('".$tipoProducto->get_idTipoProducto()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarTipoProductoConsulta('".$tipoProducto->get_idTipoProducto()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>