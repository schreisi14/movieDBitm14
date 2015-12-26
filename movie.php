<?php
// we now in presentation layer
// we will include business layer to load business logic
include("business.php");

// init Movie Model from Business Logic
$movie = new Movie();

// insert new city if post data exists
if(isset($_POST["moviename"]) && $_POST["moviename"]){
	$movie->createMovie($_POST["moviename"],$_POST["year"],$_POST["language"]);
}

// now load all cities
$data = $movie->getAllMovies();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<table id="Moviestable">';
  $html .= '<thead><tr>';
  $html .= '<th>Moviename</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $movie) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $movie['name'] . '</td>';
		$html .= '<td>' . $movie['year'] . '</td>';
		$html .= '<td>' . $movie['language'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>
<html>
 <head>
   <title>Movies</title>
 </head>
 <body>

 <form method="post" >
   new Movie:<br>
	 Name:<input type="text" name="moviename" />
	 Year:<input type="text" name="year" />
	 Lang:<input type="text" name="language" />
	<input type="submit" value="Submit"/>
 </form>

 <?php echo getHTMLTable($data); ?><br />

 </body>
</html>
