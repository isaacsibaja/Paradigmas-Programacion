<?php
	include ("../../controladora/ingredienteActivo/ControladoraGetIngredienteActivo.php");
	$control = new ControladoraGetIngredienteActivo;
	
	$lista =$control->obtenerIngredienteActivos();	
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
			$i=0;				
			foreach ($lista as $ingrediente){
            	echo "<tr>";
		            echo "<td>".$ingrediente->getIdIngredienteActivo()."</td>";
			        echo "<td>".$ingrediente->getDescripcionIngrediente()."</td>";
			        echo "<td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarIngredienteActivo('".$ingrediente->getIdIngredienteActivo()."')\"/></td>";
			        echo "<td><input type=\"button\" value=\"Modificar\" onclick=\"modificarIngredienteActivoConsulta('".$ingrediente->getIdIngredienteActivo()."')\"/></td>";     
		  		echo "</tr>";

			}
		}					
	?>
			</tbody>		      				
		</table>

