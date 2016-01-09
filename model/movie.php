<?php
// Business Layer
// Movie Model

include '../dao/moviedao.php';

class Movie {
	private $movieDAO = null;

	public function __construct() {
		$this->movieDAO = new MovieDAO();
	}
	public function getAllMovies() {
		$data = $this->movieDAO->readAll();
		return $data;
	}
	public function createMovie($moviename, $year, $language, $medium, $email) {
		$data = $this->movieDAO->create($moviename, $year, $language, $medium, $email);
		return $data;
	}
}
