<?php
	include ("../../data/DataRegentSchedule.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/RegentSchedule.php");
class ControlGetRegent{

		
	function ControlGetRegent(){
	}

	function getRegent(){		
		$data = new DataRegentSchedule;
		return $lista =$data->getRegentSchedule();
	}
}
?>