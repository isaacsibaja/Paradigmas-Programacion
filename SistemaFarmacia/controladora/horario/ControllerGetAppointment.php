<?php
	include ("../../data/DataAppointment.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Appointment.php");


	include ("../../data/DataCustomerCare.php");
	include ("../../data/DataDoctor.php");
	include ("../../dominio/CustomerCare.php");

class ControllerGetAppointment {

		
	function ControllerGetAppointment(){
	}

	function getAppointment(){		
		$data = new DataAppointment;
		return $lista =$data->getAppointments();
	}

	function getCustomerCare(){		
		$data = new DataCustomerCare;
		return $lista =$data->getCustomerCareAppointment();
	}

	function getFullName($date, $hour){	
		$data = new DataCustomerCare;
		return $lista =$data->getDoctor($date, $hour);
	}

	function getNumberDoctors(){	
		$data = new DataDoctor;
		return $lista =$data->getNumberDoctors();
	}


	
}
?>