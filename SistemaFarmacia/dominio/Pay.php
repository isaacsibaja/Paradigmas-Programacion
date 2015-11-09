<?php
class Pay{
		
	
	private	$idPay;
	private	$idUser;
	private $hourPrice;
	private	$workingDay;
	private	$extraTime;
	private	$total;
	

	function Pay( $idPay, $idUser, $hourPrice, $workingDay,
	 $extraTime, $total){

		$this->setidPay($idPay);
		$this->setidUser($idUser);
		$this->setworkingDay($workingDay);
		$this->setextraTime($extraTime);
		$this->settotal($total);
		$this->setHourPrice($hourPrice);
				
	}


	public function setidPay($idPay) {
		$this->idPay = $idPay;
	}
	public function getidPay() {
		return $this->idPay;
	}

	public function setidUser($idUser) {
		$this->idUser = $idUser;
	}
	public function getidUser() {
		return $this->idUser;
	}

	public function setHourPrice($hourPrice) {
		$this->hourPrice = $hourPrice;
	}
	public function getHourPrice() {
		return $this->hourPrice;
	}

	public function setworkingDay($workingDay) {
		$this->workingDay = $workingDay;
	}
	public function getworkingDay() {
		return $this->workingDay;
	}

	public function setextraTime($extraTime) {
		$this->extraTime = $extraTime;
	}
	public function getextraTime() {
		return $this->extraTime;
	}

	public function settotal($total) {
		$this->total = $total;
	}
	public function gettotal() {
		return $this->total;
	}

}

?>