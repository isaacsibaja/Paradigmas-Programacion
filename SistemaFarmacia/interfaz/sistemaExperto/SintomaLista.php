<?php
include ("../../controladora/sistemaExperto/ControladoraGetSintoma.php");
$control = new ControladoraGetSintoma;
$idCategoria = $_POST['idCategoria'];
$lista =$control->obtenerSintomas($idCategoria);
	if(!$lista){
		echo "No hay registros actualmente de sintomas";
	}else{
		echo "
		<table>
			<thead>
            	<tr>
                    <th><p>ID</p></th>	                    
                    <th><p>Descripcion</p></th>
                    <th><p>Seleccione</p></th>	                   
           		</tr>
    		</thead>
			<tbody>";
		$i=0;

		foreach ($lista as $sintoma){
            echo "<tr>					        
	        		<td>".$sintoma->getIdSintoma()."</td>
		        	<td>".$sintoma->getDescripcionSintoma()."</td>
			        <td><input type=\"button\" value=\"Seleccione\" onclick=\"papaya('".$sintoma->getIdSintoma()."')\"/></td>
			       </tr>";
			$i++;
		}						
	}					
?>
			</tbody>		      				
		</table>
