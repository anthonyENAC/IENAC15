<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Bienvenue sur le site de la GRIT";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
?>

<h1>Bienvenue sur le site de la GRIT</h1>

<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>

