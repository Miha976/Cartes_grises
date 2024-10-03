<?php
// Permet d'intègrer le header
function headerIndex()
{
     $html="<!DOCTYPE html><html><head><meta charset='UTF-8'><link rel='stylesheet' href='css/style.css' type='text/css'><script src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'></script><title>Menu</title><body>";
     return $html;
}
function headerForm()
{
     $html="<!DOCTYPE html><html><head><meta charset='UTF-8'><link rel='stylesheet' href='../css/style.css' type='text/css'><script src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'></script><title>Menu</title><body>";
     return $html;
}

// Permet d'intègrer le footer
function footer()
{
	$html="</body><footer><br /><a href='../index.php'>Retour Menu</a></footer></html>";
	return $html;
}

?>