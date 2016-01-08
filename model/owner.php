<?php
// Business Layer
namespace mdb;

include '../dao/ownfilmdao.php';
//Owner Model
class Owner{
	private $ownfilmDAO = null;

	public function __construct(){
		$this->ownfilmDAO = new OwnFilmDAO();
	}
	public function getAllOwnfilms() {
		$data = $this->ownfilmDAO->readAll();
	}
}
