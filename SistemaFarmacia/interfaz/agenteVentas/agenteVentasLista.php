<?php
	include ("../../controladora/agenteVentas/ControladoraGetAgenteVentas.php");
	$control = new ControladoraGetAgenteVentas;
	
	$lista =$control->obtenerAgentesVentas();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Nombre</p></th>
                <th><p>Telefono</p></th>
                <th><p>Correo</p></th>
                <th><p>Eliminar</p></th>
                <th><p>Modificar</p></th>	                   
       		</tr>
    		</thead>
			<tbody>";		
			foreach ($lista as $agenteVentas){
            	echo "<tr>";
		            echo "<td>".$agenteVentas->get_idAgenteVenta()."</td>";
			        echo "<td>".$agenteVentas->get_nombreAgente()."</td>";
			        echo "<td>".$agenteVentas->get_telefonoAgente()."</td>";
			        echo "<td>".$agenteVentas->get_correoAgente()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarAgenteVentas('".$agenteVentas->get_idAgenteVenta()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarAgenteVentasConsulta('".$agenteVentas->get_idAgenteVenta()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>