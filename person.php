<?php
// we now in presentation layer
// we will include business layer to load business logic
include("model/person.php");

// init Movie Model from Business Logic
$person = new Person();

// insert new Movie if post data exists
if(isset($_POST["forname"]) && $_POST["forname"]){
	$person->createPerson($_POST["forname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"]);
}

// now load all Movies
$data = $person->getAllPersons();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Personen:</h1>';
  $html .= '<table id="moviestable">';
  $html .= '<thead><tr>';
  $html .= '<th>Vorname</th>';
  $html .= '<th>Nachname</th>';
  $html .= '<th>Telephonnummer</th>';
  $html .= '<th>Email</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $person) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $person['forname'] . '</td>';
		$html .= '<td>' . $person['lastname'] . '</td>';
		$html .= '<td>' . $person['telephone'] . '</td>';
    $html .= '<td>' . $person['email'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>


 <form method="post" >
   <h1>Neue Person erstellen:</h1>
   <table id="newperson">
   		<tr>
   			<td>
   				Vorame:
   			</td>
   			<td>
   				<input type="text" name="forname" placeholder="Vorname" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Nachname:
   			</td>
   			<td>
   				<input type="text" name="lastname" placeholder="Nachname" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Telephonnummer:
   			</td>
   			<td>
   				<input type="text" name="telephone" placeholder="0676/12346734" />
   			</td>
   		</tr>
      <tr>
        <td>
          Email:
        </td>
        <td>
          <input type="text" name="email" placeholder="max.mustermann@gmail.com" />
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
