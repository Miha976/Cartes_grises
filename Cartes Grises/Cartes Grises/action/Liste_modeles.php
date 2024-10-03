<?php
	include('../inc/db.php');
	
	// Exécuter la requête
	$requete="SELECT * FROM modele ORDER BY modele";
	$result=$db->query($requete)->fetchAll();
	$nbmod=count($result);

	echo "<h1> Tous les $nbmod modeles de voitures</h1><table border='1'><thead><th>Id du modele</th> <th>Libelle</th>  <th>Carburant</th></thead><tbody>";

	// Parcours du tableau $result
	foreach ($result as $value)
		echo"<tr><td>".$value['id_modele']."</td><td>".$value['modele']."</td><td>".$value['carburant']."</td></tr>";
	
	echo "</tbody></table>";
?>
