<?php
	


	include ("../../data/BDConexion.php");


	include ("../../data/DataCustomerCare.php");
	include ("../../data/DataRegentSchedule.php");
	include ("../../data/DataUser.php");

	include ("../../dominio/CustomerCare.php");
	include ("../../dominio/RegentSchedule.php");
	include ("../../dominio/User.php");

	class ControllerGetHistory {
		
		function ControllerGetHistory(){
		}	
		function getCustomerCare($id){		
			$data = new DataCustomerCare;
			return $lista =$data->getCustomerCare($id);
		}

		function getRegent($id){		
			$data = new DataRegentSchedule;
			return $lista =$data->getRegentCustomer($id);
		}

		function getDoctor(){		
			$data = new DataUser;
			return $lista =$data->getDoctor();
		}

	}
?>