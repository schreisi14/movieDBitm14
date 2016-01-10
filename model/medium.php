<?php
// Business Layer
// medium Model

include '../dao/mediumdao.php';

class Medium {
	private $mediumDAO = null;

	public function __construct() {
		$this->mediumDAO = new MediumDAO();
	}
	public function getAllMediums() {
		$data = $this->mediumDAO->readAll();
		return $data;
	}
}
