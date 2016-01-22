<?php
class DB{

	/* Heli & Simon */
	private $servername = "127.0.0.1:8889";
	private $username = "root";
	private $password = "root";
	private $dbname = "movieDB";


	/* Stefan
	private $servername = "127.0.0.1:3307";
	private $username = "root";
	private $password = "hbla";
	private $dbname = "movieDB"; */


	public function __construct() {}

	public function connect() {
        	$mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($mysqli->connect_error)
    			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		return $mysqli;
    	}



}
