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
		            echo "<td>".$unidadMedida->getIdUnidadMedida()."</td>";
			        echo "<td>".$unidadMedida->getDescripcionUnidad()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarUnidadMedida('".$unidadMedida->getIdUnidadMedida()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarUnidadMedidaConsulta('".$unidadMedida->getIdUnidadMedida()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>