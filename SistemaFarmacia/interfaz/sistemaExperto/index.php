<script lang="JavaScript" src="../js/Sintoma.js"></script>
<?php
        include ("../../controladora/producto/ControladoraGetProductoCombo.php");
        $control = new ControladoraGetProductoCombo;
        $lista =$control->obtenerCategorias();

        if(!$lista){                               
            echo "<br>
                <label>No hay registro de categoria</label>";
        }else{
            echo "<label>Seleccione Categoria</label> 
            	<select onclick=cargarListaSintomas() id=\"idCategoria\" name=\"idCategoria\">";
            foreach ($lista as $categoria){ 
                echo " <option  value=\"".$categoria->getIdCategoria()."\">".$categoria->getDescripcion()."</option>";
            }
            echo "<select/>"; 
        } 
?>

<div id="contenedorSintoma"></div>
<br/>
         