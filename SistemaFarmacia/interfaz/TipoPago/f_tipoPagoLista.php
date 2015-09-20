<?php
	include ("../../controladora/TipoPago/ControladoraGetTipoPago.php");
	$control = new ControladoraGetTipoPago;
	
	$lista =$control->obtenerTipoPagos();	
	if(!$lista){
		echo "No hay registro";
	} else {
		echo "<select id=\"idTpoPago\" name=\"idTpoPago\">";	
		foreach ($lista as $tipoPago){	            
			echo " <option  onclick=\"tipopago(".$tipoPago->get_idTipoPago().")\" value=\"".$tipoPago->get_idTipoPago()."\">".$tipoPago->get_descripcion()."</option>";
		}
		echo "<select/>";  
	}		
						
?>
