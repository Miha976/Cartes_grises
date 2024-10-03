<?php
	include('../inc/db.php');
	
	// Exécuter la requête
	if(
		(isset($_POST["id_modele"]) && !empty($_POST["id_modele"])) &&
		(isset($_POST["libelle_modele"]) && !empty($_POST["libelle_modele"])) &&
		(isset($_POST["carburant_modele"]) && !empty($_POST["carburant_modele"]))
	) {
		$id = $_POST["id_modele"];
		$libelle = $_POST["libelle_modele"];
		$carburant = $_POST["carburant_modele"];
		$requete="INSERT INTO modele VALUES(:id, :libelle, :carburant)";
		$result=$db->prepare($requete)->execute([
			"id" => $id,
			"libelle" => $libelle,
			"carburant" => $carburant,
		]);
		if($result == true) {
			echo "<script>alert('Le modele est enregistré')</script>";
		} else {
			echo "<script>alert('Le modele n\'est pas enregistré')</script>";
		}
		// var_dump($result);
	}
?>

<h1>
	Ajout d'un Modele
</h1>
<form action="" method="post">
	<fieldset>
		<legend>
			Caractéristiques
		</legend>
		<label for="id_modele">Id du Modele : </label>
		<input type="text" id="id_modele" name="id_modele"/>
		<label for="libelle_modele">Libelle : </label>
		<input type="text" id="libelle_modele" name="libelle_modele"/>
		<label for="carburant_modele">Carburant : </label>
		<select name="carburant_modele" id="carburant_modele">
			<option value="essence">Essence</option>
			<option value="essence">Diesel</option>
			<option value="essence">GPL</option>
			<option value="essence">Electrique</option>
		</select>
	</fieldset>
	<button type="reset">
		Effacer
	</button>
	<button type="submit">
	Envoyer
	</button>
</form>
