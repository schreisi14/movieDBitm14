<?php
// Business Layer

include '../dao/persondao.php';
// Person model
class Person{
	private $personDAO = null;

	public function __construct() {
		$this->personDAO = new PersonDAO();
	}
	public function getAllPersons() {
		$data = $this->personDAO->readAll();
		return $data;
	}
	public function createPerson($firstname, $lastname, $telephone, $email){
		$data = $this->personDAO->create($firstname, $lastname, $telephone, $email);
		return $data;
	}
}
