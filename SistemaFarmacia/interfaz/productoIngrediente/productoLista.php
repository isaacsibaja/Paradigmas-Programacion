<h1>Selecione un producto</h1>
<script lang="JavaScript" src="../js/productoIngrediente.js"></script>
<?php
	include ("../../controladora/producto/ControladoraGetProducto.php");
	$control = new ControladoraGetProducto;
	
	$lista =$control->obtenerProductos();	
		if(!$lista){
			echo "No hay registros actualmente";
		}else{
			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Categoria</p></th>
                <th><p>Tipo</p></th>
                <th><p>Precentacion</p></th>
                <th><p>Unidad Medida</p></th>
                <th><p>Nombre</p></th>
                <th><p>Seleccione</p></th>
                   
       		</tr>
    		</thead>
			<tbody>";
			$i=0;				
			foreach ($lista as $producto){

            	echo "<tr>";
		            echo "<td>".$producto->getIdProducto()."</td>";
			        echo "<td>".$producto->getIdCategoria()."</td>";
			        echo "<td>".$producto->getIdTipoProducto()."</td>";
			        echo "<td>".$producto->getIdPrecentacionProducto()."</td>";
			        echo "<td>".$producto->getIdUnidadMedida()."</td>";
			        echo "<td>".$producto->getDescripcion()."</td>";
			        echo "<td><input type=\"button\" value=\"Seleccione\" onclick=\"seleccionarProductoIngrediente('".$producto->getIdProducto()."')\"/></td>";
			   	echo "</tr>";
			$i++;
			}
		}					
?>
			</tbody>		      				
		</table>