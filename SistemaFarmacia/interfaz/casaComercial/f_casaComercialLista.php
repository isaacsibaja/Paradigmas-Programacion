<?php
	include ("../../controladora/casaComercial/ControladoraGetCasaComercial.php");
	$control = new ControladoraGetCasaComercial;
	
	$lista =$control->obtenerCasasComerciales();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Nombre</p></th>
                <th><p>Direccion</p></th>
                <th><p>Telefono</p></th>
                <th><p>Correo</p></th>
                <th><p>Fax</p></th>
                <th><p>Eliminar</p></th>
                <th><p>Modificar</p></th>	                   
       		</tr>
    		</thead>
			<tbody>";
			$i=0;				
			foreach ($lista as $casaComercial){
            	echo "<tr>";
		            echo "<td>".$casaComercial->get_idCasaComercial()."</td>";
			        echo "<td>".$casaComercial->get_nombreCasaComercial()."</td>";
			        echo "<td>".$casaComercial->get_direccionCasaComercial()."</td>";
			        echo "<td>".$casaComercial->get_telefonoCasaComercial()."</td>";
			        echo "<td>".$casaComercial->get_correoCasaComercial()."</td>";
			        echo "<td>".$casaComercial->get_faxCasaComercial()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarCasaComercial('".$casaComercial->get_idCasaComercial()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarCasaComercialConsulta('".$casaComercial->get_idCasaComercial()."')\"/></td>";     
		  		echo "</tr>";
			$i++;
			}
		}					
	?>
			</tbody>		      				
		</table>