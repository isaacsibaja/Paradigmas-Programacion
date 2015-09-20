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
	        		<td>".$categoria->get_idCategoria()."</td>
		        	<td>".$categoria->get_descripcion()."</td>
			        <td><input type=\"button\" value=\"Eliminar\" onclick=\"eliminarCategoria('".$categoria->get_idCategoria()."')\"/></td>
			        <td><input type=\"button\" value=\"Modificar\" onclick=\"modificarCategoriaConsulta('".$categoria->get_idCategoria()."')\"/></td>
			    </tr>";
			$i++;
		}						
	}					
?>
			</tbody>		      				
		</table>
