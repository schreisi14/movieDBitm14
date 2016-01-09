<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/movie.php' ;

// init Movie Model from Business Logic
$movie = new Movie();

// insert new Movie if post data exists
if(isset($_POST["title"]) && $_POST["email"]){
	$movie->createMovie($_POST["title"],$_POST["year"],$_POST["language"],$_POST["email"]);
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
   				<input type="text" name="title" placeholder="Mein Film Titel" />
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
   				Email:
   			</td>
   			<td>
   				<input type="text" name="email" placeholder="Email" />
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
