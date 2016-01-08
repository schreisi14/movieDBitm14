<?php
// we now in presentation layer
// we will include business layer to load business logic

require 'model/owner.php';

// init Movie Model from Business Logic
$ownmovie = new OwnFilmDAO();

// insert new Movie if post data exists
if(isset($_POST["firstname"]) && $_POST["lastname"]){
	$ownmovie->create($_POST["fistname"],$_POST["lastname"],$_POST["movie"],$_POST["medium"]);
}

// now load all existing Owner and thier films with mediums
$data = $ownmovie->getAllOwnfilms();
echo "test";
// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Owner:</h1>';
  $html .= '<table id="ownmovietable">';
  $html .= '<thead><tr>';
  $html .= '<th>Vorname</th>';
  $html .= '<th>Nachname</th>';
  $html .= '<th>Film</th>';
  $html .= '<th>Medium</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $person) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $person['forname'] . '</td>';
		$html .= '<td>' . $person['lastname'] . '</td>';
		$html .= '<td>' . $person['movie'] . '</td>';
    $html .= '<td>' . $person['medium'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';
  return $html;
}

// now we can clearly output the requested data
?>


 <form method="post" >
   <h1>Welcher Film gehört dir?:</h1>
   <table id="ownmovie">
   		<tr>
   			<td>
   				Vorame:
   			</td>
   			<td>
   				<input type="text" name="firstname" placeholder="Vorname" />
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
   				Film:
   			</td>
   			<td>
   				<input type="text" name="movie" placeholder="Dein Film" />
   			</td>
   		</tr>
      <tr>
        <td>
          Medium:
        </td>
        <td>
          <input type="text" name="medium" placeholder="DVD, Blu-Ray" />
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
