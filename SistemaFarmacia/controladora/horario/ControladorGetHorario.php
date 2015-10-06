<?php
	include ("../../data/DataHorario.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Horario.php");
class ControladorGetHorario {

		
	function ControladorGetHorario(){
	}

	function obtenerHorarios(){		
		$data = new DataHorario;
		return $lista =$data->getHorarios();
	}
}
?>