<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/movie.php' ;

// init Movie Model from Business Logic
$movie = new Movie();

// insert new Movie if post data exists
if(isset($_POST["moviename"]) && $_POST["moviename"]){
	$movie->createMovie($_POST["moviename"],$_POST["year"],$_POST["language"]);
}

// now load all Movies
$data = $movie->getAllMovies();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Filme:</h1>';
  $html .= '<table id="moviestable">';
  $html .= '<thead><tr>';
  $html .= '<th>Filmtitel</th>';
  $html .= '<th>Jahr</th>';
  $html .= '<th>Sprache</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $movie) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $movie['title'] . '</td>';
		$html .= '<td>' . $movie['year'] . '</td>';
		$html .= '<td>' . $movie['language'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>


 <form method="post" >
   <h1>Neuen Film erstellen:</h1>
   <table id="newmovie">
   		<tr>
   			<td>
   				Name:
   			</td>
   			<td>
   				<input type="text" name="moviename" placeholder="Mein Film Titel" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Erscheinungsjahr:
   			</td>
   			<td>
   				<input type="text" name="year" placeholder="YYYY" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Sprache:
   			</td>
   			<td>
   				<input type="text" name="language" placeholder="de" />
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
