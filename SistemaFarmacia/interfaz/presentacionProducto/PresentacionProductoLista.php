<?php
	include ("../../controladora/presentacionProducto/ControladoraGetPresentacionProducto.php");
	$control = new ControladoraGetPresentacionProducto;
	
	$lista =$control->obtenerPresentacionesProductos();	
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
			foreach ($lista as $presentacionProducto){
            	echo "<tr>";
		            echo "<td>".$presentacionProducto->getIdPresentacionProducto()."</td>";
			        echo "<td>".$presentacionProducto->getDescripcionPresentacion()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarPresentacionProducto('".$presentacionProducto->getIdPresentacionProducto()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarPresentacionProductoConsulta('".$presentacionProducto->getIdPresentacionProducto()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>