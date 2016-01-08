<?php

include "../model/person.php";

$person = new Person();
if(isset($_POST["r_username"]) && $_POST["r_password"] && $_POST["r_password2"]){
	if($_POST["r_password"] != $_POST["r_password2"]){
		die;
	}
	$person->createPerson($_POST["r_firstname"], $_POST["r_lastname"], $_POST["r_tel"], $_POST["r_email"]);
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
