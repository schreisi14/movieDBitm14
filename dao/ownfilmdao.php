<?php

//TODO customize to loged in user ...
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
include_once '../db_connection.php';

//####################################################################################################
//Dabase Layer for Owner
class OwnFilmDAO {
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
	 * Get all Persons in the Database
	 */
	public function readAll() {
		$select = "SELECT person.firstname, person.lastname, movie.title, movie.year, movie.language, medium.name FROM movieowner
INNER JOIN person ON person.id = movieowner.id_person
INNER JOIN movie ON movie.id = movieowner.id_movie
INNER JOIN medium ON medium.id = movieowner.id_medium;";
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
	 * Get all films of a movieowner by firstname
	 */
	/*public function readByPersonId($firstname) {
		$stmt = $this->connection->prepare( "SELECT * FROM movieowner WHERE id_person = SELECT id FROM person WHERE firstname = ?;" );
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
*/
}
