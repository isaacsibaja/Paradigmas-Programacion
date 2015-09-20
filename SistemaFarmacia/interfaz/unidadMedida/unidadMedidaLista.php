<?php
	include ("../../controladora/unidadMedida/ControladoraGetUnidadMedida.php");
	$control = new ControladoraGetUnidadMedida;
	
	$lista =$control->obtenerUnidadesMedidas();	
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
			foreach ($lista as $unidadMedida){
            	echo "<tr>";
		            echo "<td>".$unidadMedida->get_idUnidadMedida()."</td>";
			        echo "<td>".$unidadMedida->get_descripcionUnidad()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarUnidadMedida('".$unidadMedida->get_idUnidadMedida()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarUnidadMedidaConsulta('".$unidadMedida->get_idUnidadMedida()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>