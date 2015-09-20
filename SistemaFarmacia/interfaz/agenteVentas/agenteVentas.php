<a href='#' onclick="cargarListaAgenteVentas()">Lista Agente Ventas</a>

<form id="formularioAgenteVentas" method="POST">
	<h1>Registro Agente Ventas</h1>
	<label for="nombreAgente">Nombre:  </label>
	<input type="text" id="nombreAgente" name="nombreAgente" placeholder=""/>
	<br/>
	<label for="telefonoAgente">Telefono:  </label>
	<input type="text" id="telefonoAgente" name="telefonoAgente" placeholder=""/>
	<br/>
	<label for="correoAgente">Correo:  </label>
	<input type="text" id="correoAgente" name="correoAgente" placeholder=""/>
	<br/>
	<label for="correoAgente2">Confirmar Correo:  </label>
	<input type="text" id="correoAgente2" name="correoAgente2" placeholder=""/>
	<br/>
	<input type="submit" value="Registrar" class="submit"/>	
</form>

<script lang="JavaScript" src="../js/agenteVentas.js"></script>