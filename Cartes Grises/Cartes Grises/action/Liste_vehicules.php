<?php
	include('../inc/db.php');
	
	// Exécuter la requête
	$cols = $db->query("SHOW COLUMNS FROM Vehicule")->fetchAll();
	$requete="SELECT * FROM vehicule ORDER BY immat";
	$result=$db->query($requete)->fetchAll();
	$nbV=count($result);
	
	echo "<h1> Nombre de véhicules : $nbV</h1>
	<table border='1'>
	<thead>";
	foreach($cols as $col) {
		echo "<th>".$col['Field']."</th>";
	}
	echo "</thead>
	<tbody>";

	// Parcours du tableau $result
	for ($i=0; $i < count($result); $i++) { 
		$value = $result[$i];
		echo "<tr>";
		foreach($cols as $col) {
			echo "<td>".$value[$col['Field']]."</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";	
	
?>
