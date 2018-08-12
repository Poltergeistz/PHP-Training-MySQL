	<h1>Modifier</h1>
	<?php
	// Require login credentials
	require 'db_login.php';
	// Select all from hiking 
	$sqlSelect = 'SELECT * FROM hiking WHERE id='.$_GET['id'].';';
	// Loop into everything & display the result so we can modify it
	foreach ($pdo->query($sqlSelect)as $row) {?>
	<form action="/update.php?id=<?php echo $_GET['id']?>" method="post">
			<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $row['name'];?>">
			</div>
			<div>
				<label for="difficulty">Difficulté</label>
				<select name="difficulty">
					<option <?php if ($row['difficulty'] == "très facile") {
					echo 'selected';
				} ?> value="très facile">Très facile</option>
					<option <?php if ($row['difficulty'] == "facile") {
					echo 'selected';
				} ?> value="facile">Facile</option>
					<option <?php if ($row['difficulty'] == "moyen") {
					echo 'selected';
				} ?> value="moyen">Moyen</option>
					<option <?php if ($row['difficulty'] == "difficile") {
					echo 'selected';
				} ?> value="difficile">Difficile</option>
					<option <?php if ($row['difficulty'] == "très difficile") {
					echo 'selected';
				} ?> value="très difficile">Très difficile</option>
				</select>
			</div>
			<?php 
			echo '<div>
				<label for="distance">Distance</label>
				<input type="text" name="distance" value="'.$row['distance'].'">
			</div>
			<div>
				<label for="duration">Durée</label>
				<input type="time" name="duration" value="'.$row['duration'].'">
			</div>
			<div>
				<label for="height_difference">Dénivelé</label>
				<input type="text" name="height_difference" value="'.$row['height_difference'].'">
			</div>'; ?>
			<button type="submit" name="button">Envoyer</button>
	</form>
<?php
}
?>

	<?php
	
	$hiking_name = strip_tags(htmlspecialchars($_POST['name']));
	$difficulty = strip_tags(htmlspecialchars($_POST['difficulty']));
	$distance = strip_tags(htmlspecialchars($_POST['distance']));
	$duration = strip_tags(htmlspecialchars($_POST['duration']));
	$height_difference = strip_tags(htmlspecialchars($_POST['height_difference']));
	$id = $_GET['id'];

	$sql = 'UPDATE hiking SET (:hiking_name, :difficulty, :distance, :duration, :height_difference) WHERE id = :id;';
	try{
		$up = $pdo->prepare($sql);
		$up->execute(array
		(':hiking_name' => $hiking_name,
		':difficulty' => $difficulty,
		':distance' => $distance,
		':duration' => $duration,
		':height_difference' => $height_difference,
		':id' => $id
		));
		$pdo = null;
		echo "La randonnée $hiking_name a été modifiée avec succès.";
	} catch (PDOException $e){
		print "Error!:".$e->getMessage()."<br>";
		die();
	} 
	?>

