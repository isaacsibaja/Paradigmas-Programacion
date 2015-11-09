<h1>Consultar Jornadas</h1>
	<form id="searchHistory" method="POST">

	<?php
        include ("../../controladora/horario/ControllerGetHistory.php");
        $control = new ControllerGetHistory;
        $lista =$control->getDoctor();

        if(!$lista){                               
            echo "<br>
                <label>No hay registro doctor</label>";
        }else{
            echo "<label>Seleccione Un Doctor</label> 
            	<select id=\"idUser\" name=\"idUser\">";
            foreach ($lista as $user){ 
                echo " <option value=\"".$user->getIdUser()."\">".$user->getLastName()."</option>";
            }
            echo "<select/>"; 
        }  
	?>
             <br/>
			<label>Desde: </label>
			<input type="text" name="from" id="from"/>
			<br/>
			<label>Hasta: </label>
		    <input type="text" name="to" id="to" >
		    <br/>
		    <input type="submit" value="Consultar" class="submit"/>
	</form>

	<div id="containerHistory"></div>
<script src="../js/Horario.js"></script>