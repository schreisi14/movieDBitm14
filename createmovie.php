<?php

// we now in presentation layer
// we will include business layer to load business logic
include 'model/movie.php';
include 'model/medium.php';

// init Movie Model from Business Logic
$movie = new Movie();
$medium = new Medium();

// insert new Movie if post data exists
if(isset($_POST["name"]) && $_POST["email"]){
	$movie->createMovie($_POST["name"],$_POST["year"],$_POST["language"],$_POST["medium"],$_POST["email"]);
}

// now load all Mediums
$data = $medium->getAllMediums();

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
   				<input type="text" name="name" placeholder="Mein Film Titel" />
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
               Medium:
            </td>
            <td>
               <select name="medium">
                  <?php 
                  foreach ($data as $medium) {
                     echo "<option>".$medium['name']."</option>";
                  }
                  ?>
               </select>
            </td>
         </tr>
			<tr>
   			<td>
   				E-Mail:
   			</td>
   			<td>
   				<input type="email" name="email" placeholder="e@mail.tld" />
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
