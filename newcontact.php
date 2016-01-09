<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/contact.php' ;

// init Contact Model from Business Logic
$contact = new Contact();

// insert new Contact if post data exists
if(isset($_POST["email"]) && $_POST["text"]){
	$contact->createContact($_POST["email"],$_POST["subject"],$_POST["text"]);
}

// now load all Movies
$data = $contact->getAllContacts();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<br />';
  $html .= '<h1>Liste der bereits erstellten Contact:</h1>';
  $html .= '<table id="contacttable">';
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
   <h1>Neuen Contact erstellen:</h1>
   <table id="newcontact">
   		<tr>
   			<td>
   				Email:
   			</td>
   			<td>
   				<input type="text" name="email" placeholder="Email" />
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
   			<td>
   				Text:
   			</td>
   			<td>
   				<input type="text" name="text" placeholder="Text" />
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
