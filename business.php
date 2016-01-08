<?php
// Business Layer

// now include database layer
include("database.php");

// Movie Model
class Movie {
	private $movieDAO = null;

	public function __construct() {
		$this->movieDAO = new MovieDAO();
	}
	public function getAllMovies() {
		$data = $this->movieDAO->readAll();
		return $data;
	}
	public function createMovie($moviename, $year, $language) {
		$data = $this->movieDAO->create($moviename, $year, $language);
		return $data;
	}
}

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

class Owner{
	private $ownfilmDAO = null;

	public function __construct(){
		$this->ownfilmDAO = new OwnFilmDAO();
	}
	public function getAllOwnfilms() {
		$data = $this->ownfilmDAO->readAll();
	}
}
