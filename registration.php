<?php

include 'model/person.php';


$person = new Person();
if(isset($_POST["r_firstname"])){
	$person->createPerson($_POST["r_firstname"], $_POST["r_lastname"], $_POST["r_tel"], $_POST["r_email"]);
}

// now load all Movies
$data = $person->getAllPersons();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Filme:</h1>';
  $html .= '<table id="moviestable">';
  $html .= '<thead><tr>';
  $html .= '<th>Firstname</th>';
  $html .= '<th>Lastname</th>';
  $html .= '<th>Telephon</th>';
	$html .= '<th>Email</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $movie) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $movie['firstname'] . '</td>';
		$html .= '<td>' . $movie['lastname'] . '</td>';
		$html .= '<td>' . $movie['telephone'] . '</td>';
		$html .= '<td>' . $movie['email'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}
 ?>

 <form method="post" >
   <h1>Registration:</h1>
   <table id="r_username">
   		<tr>
   			<td>
   				Firstname:
   			</td>
   			<td>
   				<input type="text" name="r_firstname" placeholder="Firstname" />
   			</td>
   		</tr>
			<tr>
   			<td>
   				Lastname:
   			</td>
   			<td>
   				<input type="text" name="r_lastname" placeholder="Lastname" />
   			</td>
   		</tr>
			<tr>
   			<td>
   				Tel:
   			</td>
   			<td>
   				<input type="text" name="r_tel" placeholder="TelNr" />
   			</td>
   		</tr>
			<tr>
   			<td>
   				eMail:
   			</td>
   			<td>
   				<input type="text" name="r_email" placeholder="eMail" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Password:
   			</td>
   			<td>
   				<input type="password" name="r_password" placeholder="password" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Password2:
   			</td>
   			<td>
   				<input type="password" name="r_password2" placeholder="password" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   			</td>
   			<td>
   				<input type="submit" value="Submit"/>
   			</td>
   		</tr>
   </table>
 </form>

 <?php echo getHTMLTable($data); ?><br />
