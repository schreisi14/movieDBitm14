<?php
// we now in presentation layer
// we will include business layer to load business logic

include 'model/owner.php';

// init Movie Model from Business Logic
$owner = new Owner();

// now load all existing Owner and thier films with mediums
$data = $owner->getAllOwnfilms();
echo "test";
// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der deiner Filme:</h1>';
  $html .= '<table id="ownmovietable">';
  $html .= '<thead><tr>';
  $html .= '<th>Vorname</th>';
  $html .= '<th>Nachname</th>';
  $html .= '<th>Film</th>';
	$html .= '<th>Jahr</th>';
	$html .= '<th>Sprache</th>';
  $html .= '<th>Medium</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $owner) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $owner['firstname'] . '</td>';
		$html .= '<td>' . $owner['lastname'] . '</td>';
		$html .= '<td>' . $owner['title'] . '</td>';
    $html .= '<td>' . $owner['year'] . '</td>';
		$html .= '<td>' . $owner['language'] . '</td>';
		$html .= '<td>' . $owner['name'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';
  return $html;
}

// now we can clearly output the requested data
?>

 <?php echo getHTMLTable($data); ?><br />
