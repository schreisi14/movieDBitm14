<?php
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
include_once '../db_connection.php';
//####################################################################################################
// Database Layer for Contact

class contactDAO {
	private $connection = null;

	// Initializing the DB-Connection for the further CRUD-Operations
	public function __construct() {
		$db = new DB();
		$this->connection = $db->connect();

		if(! $this->connection) {
			die( 'ERROR while connecting' );
		}
	}

	/*
	 * Create a new Contact with name
	 */
	public function create($email, $subject, $text) {
		$stmt = $this->connection->prepare( "INSERT INTO contact (email, subject, text) VALUES (?,?,?);");
		$stmt->bind_param( 'sss', $email, $subject, $text);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Contact-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}

	/*
	 * Get all Contacts in the Database
	 */
	public function readAll() {
		$select = "SELECT * FROM contact;";
		if ($this->connection == null) {
			echo "Connection not initialized!";
		} else if ($result = mysqli_query ( $this->connection, $select )) {
			$items = null;
			if (mysqli_num_rows ( $result ) > 0) {
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					$items [] = $row;
				}
				return $items;
			} else {
				echo "</br>0 results";
			}
		} else {
			echo "Resultset leer/nicht definiert!";
		}
	}
}
