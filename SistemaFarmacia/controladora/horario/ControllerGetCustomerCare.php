<?php
	include ("../../data/DataCustomerCare.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/CustomerCare.php");

	include ("../../data/DataRegentSchedule.php");
	include ("../../dominio/RegentSchedule.php");
class ControllerGetCustomerCare{

		
	function ControllerGetCustomerCare(){
	}

	function getCustomerCare($id){		
		$data = new DataCustomerCare;
		return $lista =$data->getCustomerCare($id);
	}

	function getRegent($id){		
		$data = new DataRegentSchedule;
		return $lista =$data->getRegentCustomer($id);
	}

}
?>