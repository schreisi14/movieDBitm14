<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/movie.php' ;

// init Movie Model from Business Logic
$movie = new Movie();

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
	$html .= '<th>Email</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $movie) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $movie['title'] . '</td>';
		$html .= '<td>' . $movie['year'] . '</td>';
		$html .= '<td>' . $movie['language'] . '</td>';
		$html .= '<td>' . $movie['email'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>


 <?php echo getHTMLTable($data); ?><br />
