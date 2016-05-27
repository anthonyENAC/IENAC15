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
$reponse2 = $bdd->query("SELECT * FROM Station WHERE nom_station='$ville_dep'");
while ($donnees2 = $reponse2->fetch()) {
    $depart = $donnees2['id_station'];
}

$reponse3 = $bdd->query("SELECT * FROM Station WHERE nom_station='$ville_arr'");
while ($donnees3 = $reponse3->fetch()) {
    $arrivee = $donnees3['id_station'];

}
$reponse2->closeCursor();
$reponse3->closeCursor();

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
    <?php
    // On récupère tout le contenu de la table jeux_video
    $troncon='';
    $liste=array();


    echo recur($bdd,$depart,$troncon,$liste,$heure_dep,$heure_max);


    function recur($bdd,$depart,$troncon,$liste,$heure_dep,$heure_max)
    {?>

        <?php
        $reponse = $bdd->query("SELECT * FROM Troncon ");
        $i=0;
        $compte=compte($reponse,$depart);
        $finale=array();
        $arriv=0;

        For ($i = 1; $i <=$compte;) {
            $reponse = $bdd->query("SELECT * FROM Troncon ");
            while ($donnees = $reponse->fetch()) {
                if ($donnees['station_dep'] == $depart and $i == 1) {
                    //echo '1er boucle';
                    ?>

                    <tr>
                        <td><?php echo $donnees['id_troncon']; ?></td>
                        <td id="test<?php echo $donnees['id_troncon'];?>"><?php echo $donnees['nom_troncon']; ?></td>
                        <td>
                            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
                            while ($donnees5 = $reponse5->fetch()) {
                                ?>
                                <?php echo((int)($donnees5['heure_passage'] / 3600)); ?>h<?php echo(($donnees5['heure_passage'] / 3600 - (int)($donnees5['heure_passage'] / 3600)) * 60); ?>min
                                <br/><?php } ?>
                        </td>
                        <td>
                            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
                            while ($donnees5 = $reponse5->fetch()) {
                                ?>
                                <?php echo (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600); ?>h<?php echo((($donnees5['heure_passage'] + $donnees5['duree']) / 3600 - (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600)) * 60); ?>min
                                <br/><?php } ?>
                        </td>
                    </tr>
                    <?php
                    $troncon = $donnees['nom_troncon'];
                    $arriv = $donnees['station_arr'];
                    //echo $arriv;
                    $i++;

                    if ($arriv ==2){?>
    </tbody>
</table><table id="tableau2" class="table" data-toggle="table" data-search="true" data-pagination="true"
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
    <?php
    }

    recur($bdd,$arriv,'',array(),$heure_dep,$heure_max);
                }
                if ($donnees['station_dep'] == $depart and $donnees['nom_troncon'] != $troncon and $i >1) {
                    //echo '2ème boucle'
                    ?>

                    <tr>
                        <td><?php echo $donnees['id_troncon']; ?></td>
                        <td  id="test<?php echo $donnees['id_troncon'];?>"><?php echo $donnees['nom_troncon'];echo $donnees['id_troncon'];?> </td>
                        <td>
                            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
                            while ($donnees5 = $reponse5->fetch()) {
                                ?>
                                <?php echo((int)($donnees5['heure_passage'] / 3600)); ?>h<?php echo(($donnees5['heure_passage'] / 3600 - (int)($donnees5['heure_passage'] / 3600)) * 60); ?>min
                                <br/><?php } ?>
                        </td>
                        <td>
                            <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where heure_passage/3600>=$heure_dep and heure_passage/3600<=$heure_max and (heure_passage+duree)/3600<=$heure_max");
                            while ($donnees5 = $reponse5->fetch()) {
                                ?>
                                <?php echo (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600); ?>h<?php echo((($donnees5['heure_passage'] + $donnees5['duree']) / 3600 - (int)(($donnees5['heure_passage'] + $donnees5['duree']) / 3600)) * 60); ?>min
                                <br/><?php } ?>
                        </td>
                    </tr>

                    <?php
                    $arriv = $donnees['station_arr'];
                    //echo $arriv;
                    $i++;

                    if ($arriv ==2){?>
    </tbody>
</table><table id="tableau2" class="table" data-toggle="table" data-search="true" data-pagination="true"
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
    <?php
    }
    recur($bdd,$arriv,'',array(),$heure_dep,$heure_max);
                }




                if ($arriv !=0){$liste[] = $arriv;}

            }
        }
        for ($j=0;$j<count($liste);$j++){
            if (in_array($liste[$j],$finale)){}
            else $finale[] = $liste[$j];}
        for ($k=0;$k<count($finale);$k++){
            //echo $finale[$k];
            if ($finale[$k] ==2 ){
            }
            else {}
                //recur($bdd,$finale[$k],'',array());}

        }


        $reponse->closeCursor();
        ?>

        <?php
    }

    ?>

        <?php function compte($reponse,$depart)
    {
        $stock=0;

        while ($donnees = $reponse->fetch()) {
            If ($depart == $donnees['station_dep']) {
                $stock++;
            }
        }
        return $stock;
    }?>

    </tbody>
</table>