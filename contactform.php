<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/request.php' ;

// init Contact Model from Business Logic
$contact = new Request();

// insert new Contact if post data exists
if(isset($_POST["email"]) && $_POST["text"]){
	$contact->createRequest($_POST["email"],$_POST["subject"],$_POST["text"]);
}

// now load all Movies
$data = $contact->getAllRequests();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Anfragen:</h1>';
  $html .= '<table id="moviestable">';
  $html .= '<thead><tr>';
  $html .= '<th>Email</th>';
  $html .= '<th>Subject</th>';
  $html .= '<th>Text</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $contact) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $contact['email'] . '</td>';
		$html .= '<td>' . $contact['subject'] . '</td>';
		$html .= '<td>' . $contact['text'] . '</td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>


 <form method="post" >
   <h1>Neue Anfrage erstellen:</h1>
   <table id="newcontact">
   		<tr>
   			<td>
   				Email:
   			</td>
   			<td>
   				<input type="email" name="email" placeholder="E-Mail" />
   			</td>
   		</tr>
   		<tr>
   			<td>
   				Subject:
   			</td>
   			<td>
   				<input type="text" name="subject" placeholder="Subject" />
   			</td>
   		</tr>
   		<tr>
   			<td colspan="2">
   				Text:
   			</td>
        <tr>
   			<td colspan="2">
          <textarea name="text" cols="30" rows="15" placeholder="Text"></textarea>
   			</td>
   		</tr>
   		<tr>
   			<td colspan="2">
          <input type="submit" value="Submit" />
   		</td>
   		</tr>
   </table>
 </form>

 <?php echo getHTMLTable($data); ?><br />
