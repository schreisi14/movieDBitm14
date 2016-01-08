<?php
//namespace dao;
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
require_once '../db_connection.php';
//####################################################################################################
//Database Layer for Persons
class PersonDAO {
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
	* Create a new Person
	*/
	public function create($firstname, $lastname, $telephone, $email) {
		$stmt = $this->connection->prepare( "INSERT INTO person (firstname, lastname, telephone, email) VALUES (?,?,?,?);");
		$stmt->bind_param( 'ssss', $firstname, $lastname, $telephone, $email);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Person-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}

	/*
	 * Get all Persons in the Database
	 */
	public function readAll() {
		$select = "SELECT * FROM person;";
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

	/*
	 * Get all informations of a Person by firstname
	 */
	public function readByFirstName($firstname) {
		$stmt = $this->connection->prepare( "SELECT * FROM person WHERE firstname = ?;" );
		$stmt->bind_param( 's', $firstname );

		if ($stmt->execute ()) {
			$stmt->bind_result( $firstname);
			while ( $stmt->fetch() ) {
				$row['firstname'] = $firstname;
			}
			return $row;
		} else {
			echo "0 results";
			return - 1;
		}
	}

	/*
	 * Get all informations of a Person by lastname
	 */
	public function readByLastName($lastname) {
		$stmt = $this->connection->prepare( "SELECT * FROM person WHERE lastname = ?;" );
		$stmt->bind_param( 's', $lastname );

		if ($stmt->execute ()) {
			$stmt->bind_result( $lastname);
			while ( $stmt->fetch() ) {
				$row['lastname'] = $lastname;
			}
			return $row;
		} else {
			echo "0 results";
			return - 1;
		}
	}

}
