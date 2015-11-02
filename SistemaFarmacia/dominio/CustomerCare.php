<?php
class CustomerCare{
		
	
	private	$idCustomerCare;
	private	$idDoctor;
	private	$date;
	private	$hour;
	

	function CustomerCare( $idCustomerCare, $idDoctor, $date, $hour){
		$this->setIdCustomerCare($idCustomerCare);
		$this->setIdDoctor($idDoctor);
		$this->setDate($date);
		$this->setHour($hour);
	}


	public function setIdCustomerCare($idCustomerCare) {
		$this->idCustomerCare = $idCustomerCare;
	}
	public function getIdCustomerCare() {
		return $this->idCustomerCare;
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
}
?>