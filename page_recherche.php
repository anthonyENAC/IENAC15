<?php include("entete.php"); ?>


<table id="tableau" class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="2">
    <thead><tr><th data-field="col1" data-sortable="true">ville de départ : </th> <th data-field="col2" data-sortable="true">ville d'arrivée :</th> <th data-field="col3" data-sortable="true">heure de départ :</th> <th data-field="col4" data-sortable="true">date :</th> <th data-field="col5" data-sortable="true">heure max :</th></tr></thead>
    <tbody><tr><td><?php echo $_POST['ville_dep']; ?></td><td><?php echo $_POST['ville_arr']; ?></td><td><?php echo $_POST['heure_dep']; ?></td><td><?php echo $_POST['date']; ?></td><td><?php echo $_POST['heure_max']; ?></td></tr></tbody></table>

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
$ville_dep=$_POST['ville_dep'];
$ville_arr=$_POST['ville_arr'];
$heure_dep=$_POST['heure_dep'];
$heure_max=$_POST['heure_max'];

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query("SELECT * FROM Station WHERE nom_station='$ville_arr'");

// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())
{
    $reponse2 = $bdd->query("SELECT * FROM Troncon inner join Station on Troncon.station_dep=id_station where nom_station='$ville_dep'");
    while ($donnees2 = $reponse2->fetch()) {
        ?>

        <table id="tableau2" class="table" data-toggle="table" data-search="true" data-pagination="true"
               data-page-size="3">
        <thead>
        <tr>
            <th data-field="col1" data-sortable="true">N° Tronçons :</th>
            <th data-field="col2" data-sortable="true">origine :</th>
            <th data-field="col4" data-sortable="true">heure de départ :</th>
            <th data-field="col5" data-sortable="true">heure d'arrivée :</th>
            <th data-field="col6" data-sortable="true">mode de transport :</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $donnees2['id_troncon']; ?></td>
            <td><?php echo $donnees2['nom_troncon']; ?></td>
            <td>
                <?php $test = $donnees2['nom_troncon']; ?>
                <?php $reponse3 = $bdd->query("SELECT * FROM Troncon inner join Transport_Troncon on Transport_Troncon.id_troncon=Troncon.id_troncon inner join Station on Troncon.station_dep=id_station where nom_station='$ville_dep'  and nom_troncon='$test' and heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max");
                while ($donnees3 = $reponse3->fetch()) {
                    ?>
                    <?php echo((int)($donnees3['heure_passage'] / 3600)); ?>h<?php echo(($donnees3['heure_passage'] / 3600 - (int)($donnees3['heure_passage'] / 3600)) * 60); ?>min
                    <br/><?php } ?>
            </td>
            <td>
                <?php $reponse3 = $bdd->query("SELECT * FROM Troncon inner join Transport_Troncon on Transport_Troncon.id_troncon=Troncon.id_troncon inner join Station on Troncon.station_dep=id_station where nom_station='$ville_dep' and nom_troncon='$test' and heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max");
                while ($donnees3 = $reponse3->fetch()) {
                    ?>

                    <?php echo (int)(($donnees3['heure_passage'] + $donnees3['duree']) / 3600); ?>h<?php echo((($donnees3['heure_passage'] + $donnees3['duree']) / 3600 - (int)(($donnees3['heure_passage'] + $donnees3['duree']) / 3600)) * 60); ?>min
                    <br/><?php } ?>
            </td>
        </tr>
        <?php
        $station_dep = $donnees2['station_dep'];
        $station_arr = $donnees2['station_arr'];
        $station_finale = $donnees['id_station'];
        $a = 0;
        while ($station_arr != $station_finale) {
                $reponse4 = $bdd->query("SELECT * FROM Troncon");
                while ($donnees4 = $reponse4->fetch()) {
                    If ($station_arr==$donnees4['station_dep']) {
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
                        <br/><?php  }?>
                            </td>
                    <td>
                        <?php $test = $donnees2['nom_troncon']; ?>
                        <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
                        while ($donnees5 = $reponse5->fetch()) {
                            ?>
                    <?php echo (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600); ?>h<?php echo((($donnees5['heure_passage'] + $donnees5['duree']) / 3600 - (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600)) * 60); ?>min
                    <br/><?php  }?>
                    </td>
                        </tr>
                        <?php
                        $station_dep = $donnees4['station_dep'];
                        $station_arr = $donnees4['station_arr'];
                    }
                    Else {
                    }

                    }

            ?>


            </tbody>
            </table>
            <?php
        }
    }

    }

    $reponse2->closeCursor();


$reponse->closeCursor(); // Termine le traitement de la requête

?>


