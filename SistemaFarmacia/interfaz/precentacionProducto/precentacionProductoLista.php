<?php
	include ("../../controladora/precentacionProducto/ControladoraGetPrecentacionProducto.php");
	$control = new ControladoraGetPrecentacionProducto;
	
	$lista =$control->obtenerPrecentacionesProductos();	
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
			foreach ($lista as $precentacionProducto){
            	echo "<tr>";
		            echo "<td>".$precentacionProducto->get_idPrecentacionProducto()."</td>";
			        echo "<td>".$precentacionProducto->get_descripcionPrecentacion()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarPrecentacionProducto('".$precentacionProducto->get_idPrecentacionProducto()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarPrecentacionProductoConsulta('".$precentacionProducto->get_idPrecentacionProducto()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>