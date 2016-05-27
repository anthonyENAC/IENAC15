<p>
    <label for="pays">De</label><br />
    <select name="ville_dep" >
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
            $reponse = $bdd->query('SELECT * FROM Station');

            // On affiche chaque entrée une à une

            while ($donnees = $reponse->fetch())
            {
            ?>
<p>
    <strong>station départ</strong> <option value="Station"><?php echo $donnees['nom_station']; ?></option> :<br />
</p>
<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête
?>
    </select>
</p>







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

<?php
If ($stock == $donnees4['station_dep'] and $station_arr!=$donnees4['station_dep']) {
    ?>
    <tr>
        <td><?php echo $donnees4['id_troncon']; ?></td>
        <td><?php echo $donnees4['nom_troncon']; ?></td>
        <td>
            <?php $test = $donnees2['nom_troncon']; ?>
            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
            while ($donnees5 = $reponse5->fetch()) {
                ?>
                <?php echo((int)($donnees5['heure_passage'] / 3600)); ?>h<?php echo(($donnees5['heure_passage'] / 3600 - (int)($donnees5['heure_passage'] / 3600)) * 60); ?>min
                <br/><?php } ?>
        </td>
        <td>
            <?php $test = $donnees2['nom_troncon']; ?>
            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
            while ($donnees5 = $reponse5->fetch()) {
                ?>
                <?php echo (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600); ?>h<?php echo((($donnees5['heure_passage'] + $donnees5['duree']) / 3600 - (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600)) * 60); ?>min
                <br/><?php } ?>
        </td>
    </tr>

    <?php
}

$station_dep = $donnees4['station_dep'];
$station_arr = $donnees4['station_arr'];
?>
