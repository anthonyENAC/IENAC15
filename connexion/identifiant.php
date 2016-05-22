<!-- Connexion à la BDD -->
<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=GRIT', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

