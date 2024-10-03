<HTML>
<HEAD>
<LINK rel="stylesheet" href="FeuilleDeStyle.css" type="text/css" />
</HEAD>
<BODY>

<?php
//------------------------------
// Récupérer les valeurs postées
//------------------------------
$email = $_POST["email"];
$commentaires = $_POST["commentaires"];

//---------------------
// Afficher le résultat
//---------------------
echo "<br>";
echo "<CENTER>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>";
echo "Adresse mail";
echo "<TH>";
echo "Commentaires";
echo "</TR>";
echo "<TR>";
echo "<TD>";
echo $email;
echo "</TD>";
echo "<TD>";
echo $commentaires;
echo "</TD>";
echo "</TR>";
echo "</TABLE>";
echo "</CENTER>";
?>
<br><br>
<p><a href="01.php">Retour à la saisie</p>
</BODY>
</HTML>