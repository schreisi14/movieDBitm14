<?php
// Business Layer
// contact Model

include '../dao/contactdao.php';

class Contact {
	private $contactDAO = null;

	public function __construct() {
		$this->contactDAO = new contactDAO();
	}
	public function getAllContacts() {
		$data = $this->contactDAO->readAll();
		return $data;
	}
	public function createContact($email, $subject, $text) {
		$data = $this->contactDAO->create($email, $subject, $text);
		return $data;
	}
}
