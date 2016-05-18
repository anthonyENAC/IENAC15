<?php include("entete.php"); ?>


<table id="tableau" class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="2">
    <thead><tr><th data-field="col1" data-sortable="true">ville de départ : </th> <th data-field="col2" data-sortable="true">ville d'arrivée :</th> <th data-field="col3" data-sortable="true">heure de départ :</th> <th data-field="col4" data-sortable="true">date :</th> <th data-field="col5" data-sortable="true">heure max :</th></tr></thead>
    <tbody><tr><td><?php echo $_POST['ville_dep']; ?></td><td><?php echo $_POST['ville_arr']; ?></td><td><?php echo $_POST['heure_dep']; ?></td><td><?php echo $_POST['date']; ?></td><td><?php echo $_POST['heure_max']; ?></td></tr></tbody></table>

<table id="tableau2" class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="3">
    <thead><tr><th data-field="col1" data-sortable="true">N°itinéraire :</th> <th data-field="col2" data-sortable="true">origine : </th> <th data-field="col3" data-sortable="true">arrivée :</th> <th data-field="col4" data-sortable="true">heure de départ :</th> <th data-field="col5" data-sortable="true">heure d'arrivée :</th> <th data-field="col6" data-sortable="true">mode de transport :</th></tr></thead>
    <tbody><tr><td>hh</td> <td>nn</td> <td></td> <td></td> <td></td> <td></td></tr></tbody></table>



<?php
try
{
    // On se connecte à MySQL

    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Mode_Transport');

// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())
{
    ?>
    <p>
        <strong>Mode de transport id</strong> : <?php echo $donnees['id_transport']; ?><br />
        avec <?php echo $donnees['id_etat']; ?>, jusqu'à <?php echo $donnees['id_type']; ?> euros !<br />
    </p>
    <?php

}

$reponse->closeCursor(); // Termine le traitement de la requête
?>
