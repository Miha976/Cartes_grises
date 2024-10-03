<?php
include('../inc/db.php');

// Exécuter la requête
$requete = "SELECT * FROM proprietaire";
//Propriétaires
if (isset($_POST['nom']) && !empty($_POST['nom'])) {
	$requete = "SELECT * FROM proprietaire, vehicule WHERE 
	vehicule.proprietaire = proprietaire.nom AND modele LIKE '" . $_POST['nom'] . "%'";;
} 
$proprietaires = $db->query($requete)->fetchAll();
?>

<h1>
	Recherche d'un Modele
</h1>
<form action="" onsubmit="e.preventDefault()" method="post">
	<fieldset>
		<legend>
			Choisir le modèle
		</legend>
		<label for="nom">Libellé (ou une partie):</label>
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
</form>