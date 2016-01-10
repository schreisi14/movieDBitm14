<?php
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
include_once '../db_connection.php';
//####################################################################################################
// Database Layer for Movie

class MovieDAO {
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
	 * Create a new Movie with name
	 */
	public function create($moviename, $year, $language, $medium, $email) {
		$stmt = $this->connection->prepare( "INSERT INTO movie (name, year, language, medium, email) VALUES (?,?,?,?,?);");
		$stmt->bind_param( 'sisss', $moviename, $year, $language, $medium, $email);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Movie-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}

	/*
	 * Get all Movies in the Database
	 */
	public function readAll() {
		$select = "SELECT * FROM movie;";
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
