<?php
// Business Layer
// request Model

include '../dao/requestdao.php';

class Request {
	private $requestDAO = null;

	public function __construct() {
		$this->requestDAO = new RequestDAO();
	}
	public function getAllRequests() {
		$data = $this->requestDAO->readAll();
		return $data;
	}
	public function createRequest($email, $subject, $text) {
		$data = $this->requestDAO->create($email, $subject, $text);
		return $data;
	}
}
