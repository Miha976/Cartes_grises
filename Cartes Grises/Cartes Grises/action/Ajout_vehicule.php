<?php
include('../inc/db.php');

// Exécuter la requête
$requete = "";
try {
	if (
		isset($_POST['proprietaire']) && !empty($_POST['proprietaire']) &&
		isset($_POST['immat']) && !empty($_POST['immat']) &&
		isset($_POST['modele']) && !empty($_POST['modele']) &&
		isset($_POST['couleur']) && !empty($_POST['couleur']) &&
		isset($_POST['dateCarte']) && !empty($_POST['dateCarte']) &&
		isset($_POST['dateImmat']) && !empty($_POST['dateImmat'])
	) {
		$requete = "INSERT INTO vehicule VALUES(:immat, :dateCirculation, :dateCarteGrise, :couleur, :modele, :proprietaire)";
		$result = $db->prepare($requete)->execute([
			"immat" => $_POST["immat"],
			"dateCirculation" => $_POST["dateImmat"],
			"dateCarteGrise" => $_POST["dateCarte"],
			"couleur" => $_POST["couleur"],
			"modele" => $_POST["modele"],
			"proprietaire" => $_POST["proprietaire"]
		]);
		if($result == true) {
			echo "<script>alert('Le véhicule est enregistré')</script>";
		} else {
			echo "<script>alert('Le véhicule n\'est pas enregistré')</script>";
		}
	}
} catch(Exception $e) {
	echo $e->getMessage();
}
//Propriétaires
if (isset($_POST['nom'])) {
	$requete = "SELECT * FROM proprietaire WHERE nom LIKE '" . $_POST['nom'] . "%'";
} else {
	$requete = "SELECT * FROM proprietaire";
}
$proprietaires = $db->query($requete)->fetchAll();
//Modèles de voiture
$requete = "SELECT * FROM modele";
$modeles = $db->query($requete)->fetchAll();
?>

<h1>
	Ajout d'un Vehicule
</h1>
<form action="" onsubmit="e.preventDefault()" method="post">
	<fieldset>
		<legend>
			Propriétaire
		</legend>
		<label for="nom">Saisir un nom (ou une partie):</label>
		<input type="text" id="nom" name="nom" />
		<button type="submit" id="afficher">Afficher</button>
		<?php
		if (isset($_POST['nom']) && !empty($_POST['nom'])) {
		?>
			<div id="listeProprio">
				<label for="proprietaires">Résultat : </label>
				<select name="proprietaire" id="proprietaire">
					<?php
					foreach ($proprietaires as $proprietaire) {
					?>
						<option value="<?= $proprietaire["nom"]; ?>"><?= $proprietaire["nom"] . "," . $proprietaire["prenom"] . "," . $proprietaire["adresse"] . "," . $proprietaire["ville"] . "," . $proprietaire["codePostal"] ?></option>
					<?php } ?>
				</select>
			</div>
		<?php } ?>
	</fieldset>
	<fieldset>
		<legend>Voiture</legend>
		<select name="modele" id="modele">
			<?php
			foreach ($modeles as $modele) {
			?>
				<option value="<?= $modele["modele"]?>">
					<?= $modele["modele"] . " " . $modele["carburant"] ?>
				</option>
			<?php } ?>
		</select>
		<label for="immat">Numéro d'immatriculation : </label>
		<input type="text" id="immat" name="immat"/>
		<label for="couleur">Couleur : </label>
		<select name="couleur" id="couleur">
			<option value="claire">
				Claire
			</option>
			<option value="moyenne">
				Moyenne
			</option>
			<option value="foncee">
				Foncee
			</option>
		</select>
		<label for="dateImmat">Date 1ere immatriculation (AAAA-MM-JJ) : </label>
		<input type="text" id="dateImmat" name="dateImmat"/>
		<label for="dateCarte">Date carte grise (AAAA-MM-JJ) : </label>
		<input type="text" id="dateCarte" name="dateCarte"/>
	</fieldset>
	<button type="reset">
		Effacer
	</button>
	<button type="submit">
		Envoyer
	</button>
</form>