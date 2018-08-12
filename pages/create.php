	<h1>Ajouter</h1>
	<form action="/create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php
	// Require the login file
	require 'db_login.php';

	// User input
	$hiking_name = strip_tags(htmlspecialchars($_POST['name']));
	$difficulty = strip_tags(htmlspecialchars($_POST['difficulty']));
	$distance = strip_tags(htmlspecialchars($_POST['distance']));
	$duration = strip_tags(htmlspecialchars($_POST['duration']));
	$height_difference = strip_tags(htmlspecialchars($_POST['height_difference']));

	// SQL query
	$sql = 'INSERT INTO hiking (`name`,`difficulty`,`distance`,`duration`,`height_difference`)
	VALUES (:hiking_name, :difficulty, :distance, :duration, :height_difference);';
	
	try{
		// Verrify if the form is complete
/*      if (isset($_POST['name']) && 
			isset($_POST['difficulty']) && 
			isset($_POST['distance']) && 
			isset($_POST['duration']) && 
			isset($_POST['height_difference'])){
*/
		// Prepare the query
		$res = $pdo->prepare($sql);
		// Execute the query
		$res->execute(array
		(':hiking_name' => $hiking_name,
		':difficulty' => $difficulty,
		':distance' => $distance,
		':duration' => $duration,
		':height_difference' => $height_difference
		));
		$pdo = null;
		// Print when the query is successfully done
		echo "La randonnée $hiking_name a été ajoutée avec succès.";
	// }
	} catch (PDOException $e){
		print "Error!:".$e->getMessage()."<br>";
		die();
	} 
	?>
