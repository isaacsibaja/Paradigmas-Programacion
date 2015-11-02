<?php
	include ("../../data/DataRegentSchedule.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/RegentSchedule.php");

	include ("../../data/DataCustomerCare.php");
	include ("../../dominio/CustomerCare.php");
class ControlGetRegent{

		
	function ControlGetRegent(){
	}

	function getRegent(){		
		$data = new DataRegentSchedule;
		return $lista =$data->getRegentSchedule();
	}


	function getCustomerCare($id){		
		$data = new DataCustomerCare;
		return $lista =$data->getCustomerCare($id);
	}
}
?>