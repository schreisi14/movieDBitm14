<?php
// Business Layer
// contactform Model

include '../dao/contactformdao.php';

class ContactForm {
	private $contactFormDAO = null;

	public function __construct() {
		$this->contactDAO = new contactFormDAO();
	}
	public function getAllContactForms() {
		$data = $this->contactDAO->readAll();
		return $data;
	}
	public function createContactForm($email, $subject, $text) {
		$data = $this->contactDAO->create($email, $subject, $text);
		return $data;
	}
}
