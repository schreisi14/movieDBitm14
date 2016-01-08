<?php
// Business Layer
namespace mdb;

include '../dao/persondao.php';
// Person model
class Person{
	private $personDAO = null;

	public function __construct() {
		$this->personDAO = new PersonDAO();
	}
	public function getAllPersons() {
		$data = $this->personDAO->readAll();
	}
	public function createPerson($firstname, $lastname, $telephon, $email){
		$data = $this->personDAO->create($firstname, $lastname, $telephon, $email);
		return $data;
	}
}
