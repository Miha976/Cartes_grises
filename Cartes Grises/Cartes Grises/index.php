<?php
include('inc/db.php');
include('inc/function.php');
echo headerIndex();
?>
    <header>
        <h1>HsH - Menu Principal</h1>
    </header>
	
	<fieldset class="index">
		<legend>
			<b>Affichage</b>
		</legend>
		<ul>
			<li><a href="form/Formulaire_Liste_modeles.php">Modeles des voitures</a></li>
			<!-- A FAIRE -->
			<li><a href="form/Formulaire_Liste_vehicules.php">Vehicules</a></li>
			<li><a href="form/Formulaire_Liste_proprietaires.php">Proprietaires</a></li>
		</ul>
	</fieldset>

	<fieldset class="index">
		<legend>
			<b>Ajout</b>
		</legend>
		<ul>
			<li><a href="form/Formulaire_Ajout_modele.php">Modeles des voitures</a></li>
			<!-- A FAIRE -->
			<li><a href="form/Formulaire_Ajout_vehicule.php">Vehicule</a></li>
			<li><a href="form/Formulaire_Ajout_proprietaire.php">Proprietaire</a></li>
		</ul>
	</fieldset>

	<fieldset class="index">
		<legend>
			<b>Recherche</b>
		</legend>
			<ul>
				<li><a href="form/Formulaire_Recherche_modele.php">Recherche Modele</a></li>
			</ul>
	</fieldset>
</body>
</html>