<?php
class RegentSchedule{
		
	
	private	$idRegentSchedule;
	private	$idDoctor;
	private	$date;
	private	$hour;


	function RegentSchedule( $idRegentSchedule, $idDoctor, $date, $hour){
		$this->setIdRegentSchedule($idRegentSchedule);
		$this->setIdDoctor($idDoctor);
		$this->setDate($date);
		$this->setHour($hour);
	}


	public function setIdRegentSchedule($idRegentSchedule) {
		$this->idRegentSchedule = $idRegentSchedule;
	}
	public function getIdRegentSchedule() {
		return $this->idRegentSchedule;
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