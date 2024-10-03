<?php
	include('../inc/db.php');
	
	// Exécuter la requête
	if(
		(isset($_POST["nom"]) && !empty($_POST["nom"])) &&
		(isset($_POST["prenom"]) && !empty($_POST["prenom"])) &&
		(isset($_POST["adresse"]) && !empty($_POST["adresse"])) &&
		(isset($_POST["ville"]) && !empty($_POST["ville"])) &&
		(isset($_POST["codePostal"]) && !empty($_POST["codePostal"]))
	) {
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$adresse = $_POST["adresse"];
		$ville = $_POST["ville"];
		$codePostal = $_POST["codePostal"];
		$requete="INSERT INTO proprietaire VALUES(10, :nom, :prenom, :adresse, :ville, :codePostal)";
		$result=$db->prepare($requete)->execute([
			"nom" =>$nom,
			"prenom" =>$prenom,
			"adresse" =>$adresse,
			"ville" =>$ville,
			"codePostal" =>$codePostal,
		]);
		if($result == true) {
			echo "<script>alert('Le proprietaire est enregistré')</script>";
		} else {
			echo "<script>alert('Le proprietaire n\'est pas enregistré')</script>";
		}
	}
?>

<h1>
	Ajout d'un Proprietaire
</h1>
<form action="" method="post">
	<fieldset>
		<legend>
		Ajout de proprietaire
		</legend>
		<label for="nom">Nom : </label>
		<input type="text" id="nom" name="nom"/>

		<label for="prenom">Prenom : </label>
		<input type="text" id="prenom" name="prenom"/>

		<label for="nom">Adresse : </label>
		<input type="text" id="adresse" name="adresse"/>
		
		<label for="nom">Ville : </label>
		<input type="text" id="vill" name="ville"/>

		<label for="nom">Code Postal : </label>
		<input type="text" id="codePostal" name="codePostal"/>
	</fieldset>
	<button type="reset">
		Effacer
	</button>
	<button type="submit">
	Envoyer
	</button>
</form>
