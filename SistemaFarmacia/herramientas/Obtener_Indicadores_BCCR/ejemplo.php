<?php

/* 
 * Descripcion: Clase para obtener el tipo de cambio actual en Dolares del Banco Central de Costa Rica.
 * Autor: Ariel Orozco <bassplayer85@gmail.com>
 * Web: http://arielorozco.com/
 * Fecha: 29/12/2010
 * 
 *
 * Modificado por: Roller Zúñiga Solano, Anuard Luna Maltez y Gilbert Mora Gutierrez
 * Fecha: 07/08/2015
 */

// EJEMPLO DE UTILIZACION
require_once("Indicador.php");

// Constructor recibe como parametro true si se va a usar SOAP, de lo contrario por defecto es false
$compra = new Indicador(true);
$venta = new Indicador(true);

// Metodo recibe el tipo de cambio Indicador::VENTA o Indicador::COMPRA
$valorCompra = $compra->obtenerIndicadorEconomico(Indicador::COMPRA);
$valorVenta = $venta->obtenerIndicadorEconomico(Indicador::VENTA);

echo '<h2> Compra y Venta del Dolar - BCCR </h2>';

echo "<div> Fecha: " . date("d") . " del " . date("m") . " de " . date("Y") . " </div> </br>";

echo 
'
	<table">
		<tr>
			<th> Compra </th>
			<td> &#162;' . $valorCompra . ' </td>
		</tr>
		<tr>
			<th> Venta </th>
			<td> &#162;' . $valorVenta . ' </td>
		</tr>
	</table>
';

/*echo "Valor Compra: " . $valorCompra . "<br>";
echo "Valor Venta: " . $valorVenta . "<br>";*/

?>