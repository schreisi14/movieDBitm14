<?php
class DB{

	private $servername = "127.0.0.1:8889";
	private $username = "root";
	private $password = "root";
	private $dbname = "movieDB";

	public function __construct() {}

	public function connect() {
        	$mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($mysqli->connect_error)
    			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		return $mysqli;
    	}



}
