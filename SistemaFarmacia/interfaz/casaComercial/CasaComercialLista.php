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
			foreach ($lista as $casaComercial){
            	echo "<tr>";
		            echo "<td>".$casaComercial->getIdCasaComercial()."</td>";
			        echo "<td>".$casaComercial->getNombreCasaComercial()."</td>";
			        echo "<td>".$casaComercial->getDireccionCasaComercial()."</td>";
			        echo "<td>".$casaComercial->getTelefonoCasaComercial()."</td>";
			        echo "<td>".$casaComercial->getCorreoCasaComercial()."</td>";
			        echo "<td>".$casaComercial->getFaxCasaComercial()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarCasaComercial('".$casaComercial->getIdCasaComercial()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarCasaComercialConsulta('".$casaComercial->getIdCasaComercial()."')\"/></td>";     
		  		echo "</tr>";
			}
		}					
	?>
			</tbody>		      				
		</table>