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
