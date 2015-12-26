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
