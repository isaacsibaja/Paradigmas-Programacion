	<script lang="JavaScript" src="../js/productoIngrediente.js"></script>
<h1>Seleccione ingrediente activo</h1>

	<?php	

	include ("../../controladora/productoIngrediente/ControladoraGetProductoIngrediente.php");
	$control = new ControladoraGetProductoIngrediente;
	
	$idProducto = $_POST['idProducto'];
	$producto =$control->obtenerProducto($idProducto);	
	$lista =$control->obtenerProductoIngredientesSimple($idProducto);	
	$listaI =$control->obtenerIngredienteActivos();
	echo "<label>Producto Seleccionado : ".$producto->getDescripcion()."</label>";

	if(!$listaI){
		echo "No hay registro";
	} else {
		echo "
		<form id=\"formularioProductoIngredienteAgregar\" method=\"POST\">
		<input type=\"hidden\" id=\"idProducto\" name=\"idProducto\" value=\"".$idProducto."\" />
	
			<label>Seleccione el ingrediente activo </label>
			<select id=\"idIngredienteActivo\" name=\"idIngredienteActivo\">";	
			foreach ($listaI as $ingrediente){	            
				echo " <option value=\"".$ingrediente->getIdIngredienteActivo()."\">".$ingrediente->getDescripcionIngrediente()."</option>";
			}
			echo "
			<select/>
			<input type=\"button\" value=\"Agregar\" onclick=\"agregarProductoIngrediente()\"/>	
			<br/>

		</form>";  
	}	

	
		
		if(!$lista){
			echo "No hay registros actualmente";
		}else{

			echo "
			<table>
			<thead>
        	<tr>
                <th><p>ID</p></th>	                    
                <th><p>Ingrediente activo</p></th>
                <th><p>Quitar</p></th>                           
       		</tr>
    		</thead>
			<tbody>";
			$i=0;				
			foreach ($lista as $productoIngrediente){
            	echo "<tr>";
		            echo "<td>".$productoIngrediente->getIdProducto()."</td>";
			        echo "<td>".$productoIngrediente->getIdIngredienteActivo()."</td>";
			     	echo "<td><input type=\"button\" value=\"Quitar\" onclick=\"eliminarProductoIngrediente('".$idProducto."', '".$productoIngrediente->getIdProducto()."')\"/></td>";			        	
		  		echo "</tr>";
			$i++;
			}
		}					
?>
			</tbody>		      				
		</table>
