<?php
include ("../../controladora/categoria/ControladoraCategoriaLista.php");
$control = new ControladoraCategoriaLista;

$lista =$control->obtenerCategorias();
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

		foreach ($lista as $categoria){
            echo "<tr>					        
	        		<td>".$categoria->getIdCategoria()."</td>
		        	<td>".$categoria->getDescripcion()."</td>
			        <td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarCategoria('".$categoria->getIdCategoria()."')\"/></td>
			        <td><input type=\"button\" value=\"Modificar\" onclick=\"modificarCategoriaConsulta('".$categoria->getIdCategoria()."')\"/></td>
			    </tr>";
			$i++;
		}						
	}					
?>
			</tbody>		      				
		</table>
