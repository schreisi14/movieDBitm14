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
  $html .= '<th>Medium</th>';
	$html .= '<th>E-Mail</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $movie) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $movie['name'] . '</td>';
		$html .= '<td>' . $movie['year'] . '</td>';
		$html .= '<td>' . $movie['language'] . '</td>';
    $html .= '<td>' . $movie['medium'] . '</td>';
		$html .= '<td><a href="mailto:' . $movie['email'] .'">'.$movie['email'] .' </a></td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>


 <?php echo getHTMLTable($data); ?><br />
