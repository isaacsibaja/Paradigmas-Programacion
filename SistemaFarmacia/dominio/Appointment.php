<?php
class Appointment{
		
	
	private	$idAppointment;
	private $idCustomer;
	private $idDoctor;
	private	$date;
	private	$hour;
	private	$case;
	private	$idUser;
	

	function Appointment( $idAppointment, $idCustomer, $idDoctor, $date, $hour, $case, $idUser){
		$this->setIdAppointment($idAppointment);
		$this->setIdCustomer($idCustomer);
		$this->setIdDoctor($idDoctor);
		$this->setDate($date);
		$this->setHour($hour);
		$this->setCase($case);
		$this->setIdUser($idUser);
	}


	public function setIdAppointment($idAppointment) {
		$this->idAppointment = $idAppointment;
	}
	public function getIdAppointment() {
		return $this->idAppointment;
	}


	public function setIdCustomer($idCustomer) {
		$this->idCustomer = $idCustomer;
	}
	public function getIdCustomer() {
		return $this->idCustomer;
	}

	public function setIdDoctor($idDoctor) {
		$this->idDoctor = $idDoctor;
	}
	public function getIdDoctor() {
		return $this->idDoctor;
	}

	public function setDate($date) {
		$this->date = $date;
	}
	public function getDate() {
		return $this->date;
	}

	public function setHour($hour) {
		$this->hour = $hour;
	}
	public function getHour() {
		return $this->hour;
	}
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}
	public function getIdUser() {
		return $this->idUser;
	}

	public function setCase($case) {
		$this->case = $case;
	}
	public function getCase() {
		return $this->case;
	}
}
?>