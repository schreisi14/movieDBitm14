<?php
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
include_once "db_connection.php";
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
	public function create($moviename, $year, $language) {
		$stmt = $this->connection->prepare( "INSERT INTO movie (name, year, language) VALUES (?,?,?);");
		$stmt->bind_param( 'sis', $moviename, $year, $language);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Movie-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}

	/*
	 * Get all informations of a Movies by its name
	 */
	public function read($moviename) {
		$stmt = $this->connection->prepare( "SELECT * FROM movie WHERE name = ?;" );
		$stmt->bind_param( 's', $moviename );

		if ($stmt->execute ()) {
			$stmt->bind_result( $moviename);
			while ( $stmt->fetch() ) {
				$row['cityname'] = $moviename;
			}
			return $row;
		} else {
			echo "0 results";
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

	/*
	 * Update the informations of a Movie, identified by its name.
	 * TODO!
	 */
	public function update($moviename, $moviename_new) {
		$stmt = $this->connection->prepare ( "UPDATE movie SET name=? WHERE name = ?;" );
		$stmt->bind_param ( 'ss', $moviename_new, $moviename);

		if ($stmt->execute ()) {
			echo "Update complete";
			return 1;
		} else {
			echo "Movie-Update-ERROR: " . $stmt . "<br>" . mysqli_error ( $this->connection );
			return -1;
		}
	}
}

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
	 * Get all informations of a Person by forname
	 */
	public function read($forname) {
		$stmt = $this->connection->prepare( "SELECT * FROM person WHERE forname = ?;" );
		$stmt->bind_param( 's', $forname );

		if ($stmt->execute ()) {
			$stmt->bind_result( $forname);
			while ( $stmt->fetch() ) {
				$row['forname'] = $forname;
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
	public function read($lastname) {
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

	/*
	 * Create a new Person
	 */
	public function create($forname, $lastname, $telephone, $email) {
		$stmt = $this->connection->prepare( "INSERT INTO person (forname, lastname, telephone, email) VALUES (?,?,?,?);");
		$stmt->bind_param( 'sis', $forname, $lastname, $telephone, $email);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Person-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}
}

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
		$select = "SELECT * FROM movieowner;";
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
	 * Get all films of a movieowner by forname
	 */
	public function read($forname) {
		$stmt = $this->connection->prepare( "SELECT * FROM movieowner WHERE id_person = SELECT id FROM person WHERE forname = ?;" );
		$stmt->bind_param( 's', $forname );

		if ($stmt->execute ()) {
			$stmt->bind_result( $forname);
			while ( $stmt->fetch() ) {
				$row['forname'] = $forname;
			}
			return $row;
		} else {
			echo "0 results";
			return - 1;
		}
	}

	/*
	 * Get all films of a movieowner by lastname
	 */
	public function read($lastname) {
		$stmt = $this->connection->prepare( "SELECT * FROM movieowner WHERE id_person = SELECT id FROM person WHERE lastname = ?;" );
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

	/*
	 * Get all persons of movieowner by film
	 */
	public function read($moviename) {
		$stmt = $this->connection->prepare( "SELECT * FROM movieowner WHERE id_movie = SELECT id FROM movie WHERE name = ?;" );
		$stmt->bind_param( 's', $moviename );

		if ($stmt->execute ()) {
			$stmt->bind_result( $lastname);
			while ( $stmt->fetch() ) {
				$row['moviename'] = $moviename;
			}
			return $row;
		} else {
			echo "0 results";
			return - 1;
		}
	}

	/*
	 * Create a new Movieowner
	 * TODO! Find out how get the ids to store them
	 */
	public function create($forname, $lastname, $moviename, $medium) {
		$stmt = $this->connection->prepare( "INSERT INTO movieowner (id_person, id_movie, id_medium) VALUES (?,?,?);");
		$stmt->bind_param( 'sis', $forname, $lastname, $telephone, $email);
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Person-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}
}
