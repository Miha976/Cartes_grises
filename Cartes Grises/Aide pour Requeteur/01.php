<!-- 
	*************************************************************************************	
	Pour rendre VISIBLE ou INVISIBLE une zone d'affichage (ici la saisie de commentaires),
    on la place dans une balise <DIV> pour laquelle on modifie sa classe CSS (d�finissant 
	l'attribut 'visibility' avec la valeur 'hidden' ou 'visible'). 
    *************************************************************************************	
-->
<HTML>
<HEAD>
<LINK rel="stylesheet" href="FeuilleDeStyle.css" type="text/css" />
<SCRIPT type="text/javascript" src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'>
// Positionnent la classe CSS ('affich�' ou 'masqu�') de l'�l�m�nt DIV 'ZoneDeCommentaires'
function afficher()
{ document.getElementById("ZoneDeCommentaires").className="affich�"; }
	
function masquer()
{ document.getElementById("ZoneDeCommentaires").className="masqu�"; }

// Appel�e apr�s un clic sur un des BOUTONS pour le formulaire � appeler :
// ('Valider' --> appel de 02.php, 'Annuler' --> appel de 01.php).
function AppelerUnFormulaire(element)
{
	if (element.name=="Valider")
		{
		document.formulaire.action="02.php";
		document.formulaire.submit();
		}
	else
		{
		document.formulaire.action="01.php";
		document.formulaire.submit();
		}
}	
</SCRIPT>
</HEAD >

<BODY>
<FORM id="formulaire" name="formulaire" method="POST">
<!-- Zone toujours affich�e : saisie de l'email et choix de la saisie de commentaires 
     Le clic sur les boutons radio appelle une des fonctions JavaScript (masquer() ou afficher()) -->
<fieldset>
<legend>Vos coordonn�es :</legend>	
	<label for="email">Votre email :</label>
	<input type="text" name="email" size="20" maxlength="40" value="email" id="email" onChange="resultat(this)"/>	
	<br>	
	<p>Commentaires ? : </p>
	<label for="non" class="inline">non</label>
	<input type="radio" name="choix" value="non" id="non" checked="checked" onClick="masquer()" />
	<label for="oui" class="inline">oui</label>
	<input type="radio" name="choix" value="oui" id="oui" onClick="afficher()" /> 
	<br>
</fieldset>

<!-- Zone de saisie de commentaires, affich�e suivant le choix effectu� par les cases � cocher.
	 Suivant le choix, on d�finit une balise <DIV> nomm�e 'ZoneDeCommentaires' � laquelle on
	 appliquera soit une classe CSS 'affich�' ou 'masqu�' -->
<?php
if (isset($_POST["choix"]))
	{
	if ($_POST["choix"] == "oui")
		echo "<div id='ZoneDeCommentaires' class='affich�'>";
	else
		echo "<div id='ZoneDeCommentaires' class='masqu�'>";
	}
else
	echo "<div id='ZoneDeCommentaires' class='masqu�'>";
?>

<!-- Saisie des commentaires  -->
<fieldset>
<legend>Commentaires :</legend>
	<label for="commentaires">Vos commentaires :</label>
	<textarea name="commentaires" id="commentaires" cols="20" rows="4"></textarea>
</fieldset>
	
<!-- Ne pas oublier de fermer la classe CSS ouverte (soit 'affich�', soit 'masqu�' -->
</div>

<!-- On clique sur le bouton : on appelle la fonction 'resultat(bouton)'. 
     Ceci aura pour effet :
		a. de pr�ciser le formulaire � appeler (soit '01', soit '02')
		b. d'effectuer le postage (submit) -->
<br>
<p>
<input type="submit" id="Valider" name="Valider" value="Valider" onClick="AppelerUnFormulaire(this);"/>
<input type="button" id="Annuler" name="Annuler" value="Annuler" onClick="AppelerUnFormulaire(this);"/>
</p>

</FORM>
</BODY>
</HTML>