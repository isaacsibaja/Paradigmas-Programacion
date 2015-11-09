<?php
class User{
		
	
	private	$idUser;
	private $typeUser;
	private $charter;
	private	$name;
	private	$lastName;
	private	$password;

	function User( $idUser, $typeUser, $charter, $name, $lastName, $password){
		$this->setIdUser($idUser);
		$this->setTypeUser($typeUser);
		$this->setCharter($charter);
		$this->setName($name);
		$this->setLastName($lastName);
		$this->setPassword($password);
	}


	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}
	public function getIdUser() {
		return $this->idUser;
	}


	public function setTypeUser($typeUser) {
		$this->typeUser = $typeUser;
	}
	public function getTypeUser() {
		return $this->typeUser;
	}

	public function setCharter($charter) {
		$this->charter = $charter;
	}
	public function getCharter() {
		return $this->charter;
	}

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function getLastName() {
		return $this->lastName;
	}

	public function setPassword($password) {
		$this->password = $password;
	}
	public function getPassword() {
		return $this->password;
	}
}
?>