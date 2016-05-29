<?php include("entete.php"); ?>
<script language="javascript">
    function ouvre_popup(page){
        window.open(page,"nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=700, height=700");
    }
</script>

<?php $liste=array(22500,35820,35640,34920,25560,25560,21600,25980,26280,8160,9420,7200,36000,35640,34920,25560,25560,21600,25980,26280,8460,9420,7200);
$a=50000;
$b=60000;
$c=70000;
for ($i=0;$i<count($liste);$i++){
    if ($a>=$liste[$i]){$a=$liste[$i];}
}
for ($i=0;$i<count($liste);$i++){
    if ($b>=$liste[$i] and $liste[$i]!=$a){$b=$liste[$i];}
}
for ($i=0;$i<count($liste);$i++){
    if ($c>=$liste[$i] and $liste[$i]!=$a and $liste[$i]!=$b){$c=$liste[$i];}
}
?>
<?php $liste2=array(90,50.6,28.6,98.6,73.6,88.6,75.6,75.6,110.2,88.6,77.6,50.6,28.6,98.6,73.6,88.6,75.6,75.6,110.2,88.6,77.6);
$d=200;
$e=300;
$f=400;
for ($i=0;$i<count($liste2);$i++){
    if ($d>=$liste2[$i]){$d=$liste2[$i];}
}
for ($i=0;$i<count($liste2);$i++){
    if ($e>=$liste2[$i] and $liste2[$i]!=$d){$e=$liste2[$i];}
}
for ($i=0;$i<count($liste2);$i++){
    if ($f>=$liste2[$i] and $liste2[$i]!=$d and $liste2[$i]!=$e){$f=$liste2[$i];}
}
?>


<table id="tableau" class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="2">
    <thead><tr><th data-field="col1" data-sortable="true">ville de départ : </th> <th data-field="col2" data-sortable="true">ville d'arrivée :</th> <th data-field="col3" data-sortable="true">heure de départ :</th> <th data-field="col4" data-sortable="true">date :</th> <th data-field="col5" data-sortable="true">heure max :</th></tr></thead>
    <tbody><tr><td><?php echo $_POST['ville_dep']; ?></td><td><?php echo $_POST['ville_arr']; ?></td><td><?php echo $_POST['heure_dep']; ?></td><td><?php echo $_POST['date']; ?></td><td><?php echo $_POST['heure_max']; ?></td></tr></tbody></table>
<table id="tableau" class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="2">
    <thead><tr><th data-field="col1" data-sortable="true">Les meilleurs trajets en temps sont : <td><a rel="prev" href="recherche.php#trajet1" title="il peu y avoir plusieurs trajets avec le même temps">Trajet 1(temps)</a></td><td><a href="recherche.php#trajet2" title="il peu y avoir plusieurs trajets avec le même temps">Trajet 2(temps)</a></td><td><a href="recherche.php#trajet3" title="il peu y avoir plusieurs trajets avec le même temps">Trajet 3(temps)</a></td></th></tr>
            <tr><th data-field="col1" data-sortable="true">Les meilleurs trajets en prix sont : <td><a rel="prev" href="recherche.php#trajet4" title="il peu y avoir plusieurs trajets avec le même prix">Trajet 1(prix)</a></td><td><a href="recherche.php#trajet5" title="il peu y avoir plusieurs trajets avec le même prix">Trajet 2(prix)</a></td><td><a href="recherche.php#trajet6" title="il peu y avoir plusieurs trajets avec le même prix">Trajet 3(prix)</a></td></th></tr></thead>
    
    <?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=IENAC15_GRIT;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // Si tout va bien, on peut continuer
    $ville_dep=$_POST['ville_dep'];
    $ville_arr=$_POST['ville_arr'];
    $heure_dep2=$_POST['heure_dep'];
    $heure_dep1 = explode(":", $heure_dep2);
    $heure_dep = intval($heure_dep1[0])*3600 + intval($heure_dep1[1])*60;

    $heure_max2=$_POST['heure_max'];
    $heure_max1 = explode(":", $heure_max2);
    $heure_max = intval($heure_max1[0])*3600 + intval($heure_max1[1])*60;

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
            <th data-field="col6" data-sortable="true">prix :</th>
            <th data-field="col7" data-sortable="true">durée :</th>
            <th data-field="col8" data-sortable="true">mode de transport :</th>

        </tr>
        </thead>
        <tbody>
        <?php
        // On récupère tout le contenu de la table GRIT
        $troncon='';
        $liste=array();
        $stockage=array();
        $prix =0;
        $duree=0;
        $duree_anc=0;
        $prix_anc=0;
        $map=0;
        $map0=2;



        echo recherche($bdd,$depart,$troncon,$liste,$stockage,$heure_dep,$heure_max,$arrivee,$prix,$duree_anc,$prix_anc,$duree,$a,$b,$c,$d,$e,$f,$map,$map0);


        function recherche($bdd,$depart,$troncon,$liste,$stockage,$heure_dep,$heure_max,$arrivee,$prix,$duree_anc,$prix_anc,$duree,$a,$b,$c,$d,$e,$f,$map,$map0)
        {?>

        <?php
        $reponse = $bdd->query("SELECT * FROM Troncon ");
        $compte=compte($reponse,$depart);


        For ($i = 1; $i <=$compte;) {
        $reponse = $bdd->query("SELECT * FROM Troncon ");
        while ($donnees = $reponse->fetch()) {
        if ($donnees['station_dep'] == $depart and $i == 1) {
        //echo '1er boucle';

        if ($compte >1 ){$somme2=$prix_anc;}
        if ($compte >1 ){$somme3=$duree_anc;}

        ?>
        <?php $id=$donnees['id_troncon'];?>
        <tr>
            <td><?php echo $donnees['id_troncon']; ?></td>
            <td id="test<?php echo $donnees['id_troncon'];?>"><?php echo $donnees['nom_troncon']; ?></td>
            <td>
                <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where id_troncon=$id and heure_passage>=$heure_dep and heure_passage<=$heure_max and (heure_passage+duree)<=$heure_max");
                while ($donnees5 = $reponse5->fetch()) {
                    ?>
                    <?php echo date('H:i',$donnees5['heure_passage']);?>
                    <br/><?php } ?>
            </td>
            <td>
                <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where id_troncon=$id and heure_passage>=$heure_dep and heure_passage<=$heure_max and (heure_passage+duree)<=$heure_max");
                while ($donnees5 = $reponse5->fetch()) {
                    ?>
                    <?php echo date('H:i',$donnees5['heure_passage']+$donnees5['duree']); ?>
                    <br/><?php } ?>
            </td>
            <td>
                <?php $acc2=0;?>
                <?php $reponse7 = $bdd->query("select * from Transport_Troncon where id_troncon=$id");
                while ($donnees7 = $reponse7->fetch()) {
                    if ($acc2==0){echo $donnees7['prix'];
                        $prix_anc=$donnees7['prix'];
                        $prix = $prix +$donnees7['prix'];
                        $acc2++;}
                }
                ?>
            </td>
            <td>
                <?php $acc3=0;?>
                <?php $reponse8 = $bdd->query("select * from Transport_Troncon where id_troncon=$id");
                while ($donnees8 = $reponse8->fetch()) {
                    if ($acc3==0){echo date('H:i', $donnees8['duree']);

                        $duree_anc=$donnees8['duree'];
                        $duree = $duree +$donnees8['duree'];
                        $acc3++;}
                }
                ?>
            </td>
            <td>
                <?php
                $acc=0;
                $reponse6 = $bdd->query("select * from Transport_Troncon inner join Mode_Transport on Transport_Troncon.id_transport=Mode_Transport.id_transport inner join Mode_Type on Mode_Type.id_type=Mode_Transport.id_type where id_troncon=$id");
                while ($donnees6 = $reponse6->fetch()) {
                    if ($acc==0){echo $donnees6['descr_type'];
                        $acc++;}

                }
                ?>
            </td>
        </tr>
        <?php
        $troncon = $donnees['nom_troncon'];
        $arriv = $donnees['station_arr'];
        $i++;
        if ($arriv == $arrivee){
        if ($duree==$a){
            ?><tr id="trajet1"><td id="mieux">Le meilleur trajet en temps</td></tr><?php

        }
        if ($duree==$b){
            ?><tr id="trajet2"><td id="mieux">Le deuxième meilleur trajet en temps</td></tr><?php
        }
        if ($duree==$c){
            ?><tr id="trajet3"><td id="mieux">Le troisième meilleur trajet en temps</td></tr><?php
        }
        if ($prix==$d){
            ?><tr id="trajet4"><td id="mieux2">Le meilleur trajet niveau prix</td></tr><?php

        }
        if ($prix==$e){
            ?><tr id="trajet5"><td id="mieux2">Le deuxième meilleur trajet niveau prix</td></tr><?php
        }
        if ($prix==$f){
            ?><tr id="trajet6"><td id="mieux2">Le troisième meilleur trajet niveau prix</td></tr><?php
        }
        ?>
        <tr>
            <td>Prix total :</td><td><?php echo $prix;?></td>
        </tr>
        <tr>
            <td>Durée totale :</td><td><?php echo date('H:i', $duree);?></td>
        </tr>
        <tr><td>Afficher la carte :
               <a href="javascript:ouvre_popup('/IENAC15/aman_begaud_gaulmin_thirion/Map/<?php echo $map0;echo$map?>/index.html')">Carte</a>

            </td></tr>
        <?php if($duree>$heure_max-$heure_dep){?>
            <tr>
                <td id="no_solution">Il n'y a pas de solution possible pour arriver dans le temps imparti</td><td></td>
            </tr>
        <?php }?>
        </tbody>
    </table><?php $prix=0;?><table id="tableau2" class="table" data-toggle="table" data-search="true" data-pagination="true"
                                   data-page-size="3">
        <thead>
        <tr>
            <th data-field="col1" data-sortable="true">N° Tronçons :</th>
            <th data-field="col2" data-sortable="true">origine :</th>
            <th data-field="col4" data-sortable="true">heure de départ :</th>
            <th data-field="col5" data-sortable="true">heure d'arrivée :</th>
            <th data-field="col6" data-sortable="true">prix :</th>
            <th data-field="col7" data-sortable="true">durée :</th>
            <th data-field="col8" data-sortable="true">mode de transport :</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $arriv = $arrivee;
        }

        recherche($bdd,$arriv,'',$liste,$stockage,$heure_dep,$heure_max,$arrivee,$prix,$duree_anc,$prix_anc,$duree,$a,$b,$c,$d,$e,$f,$map,$map0);
        }


        if ($donnees['station_dep'] == $depart and $donnees['nom_troncon'] != $troncon and $i >1) {
        $map=$donnees['id_troncon'];
        if($donnees['id_troncon']==3){$map0=3;}
        //echo "2ème boucle";
        ?>
        <?php $id=$donnees['id_troncon'];?>
        <tr>
            <td><?php echo $donnees['id_troncon']; ?></td>
            <td  id="test<?php echo $donnees['id_troncon'];?>"><?php echo $donnees['nom_troncon'];?> </td>
            <td>

                <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where id_troncon=$id and  heure_passage>=$heure_dep and heure_passage<=$heure_max and (heure_passage+duree)<=$heure_max");
                while ($donnees5 = $reponse5->fetch()) {
                    ?>
                    <?php echo date('H:i',$donnees5['heure_passage']);?>
                    <br/><?php } ?>
            </td>
            <td>
                <?php $reponse5 = $bdd->query("SELECT * FROM Transport_Troncon where id_troncon=$id and heure_passage>=$heure_dep and heure_passage<=$heure_max and (heure_passage+duree)<=$heure_max");
                while ($donnees5 = $reponse5->fetch()) {
                    ?>
                    <?php echo date('H:i',$donnees5['heure_passage']+$donnees5['duree']); ?>
                    <br/><?php }
                ?>
            </td>
            <td>
                <?php $acc2=0;?>
                <?php $reponse7 = $bdd->query("select * from Transport_Troncon where id_troncon=$id");

                while ($donnees7 = $reponse7->fetch()) {
                    if ($acc2==0 ){echo $donnees7['prix'];
                        $prix2= 1.6 + $donnees7['prix'] +$somme2;
                        if ($depart==1){$prix2 = $prix2-1.6;}
                        if (($id==26)or ($donnees['id_troncon']==27)){$prix2 = $prix2-90;}
                        if ($id==33){$prix2 = $prix2-37+70;}
                        $acc2++;
                    }
                }
                ?>
            </td>
            <td>
                <?php $acc3=0;?>
                <?php $reponse8 = $bdd->query("select * from Transport_Troncon where id_troncon=$id");
                while ($donnees8 = $reponse8->fetch()) {
                    if ($acc3==0 ){echo date('H:i', $donnees8['duree']);
                        $duree2= 300 + $donnees8['duree'] +$somme3;
                        if ($depart==1){$duree2 = $duree2-300;}
                        if (($id==26)or ($donnees['id_troncon']==27)){$duree2 = $duree2-22500;}
                        if ($id==33){$duree2 = $duree2-1260+4200;}
                        $acc3++;
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $acc=0;
                $reponse6 = $bdd->query("select * from Transport_Troncon inner join Mode_Transport on Transport_Troncon.id_transport=Mode_Transport.id_transport inner join Mode_Type on Mode_Type.id_type=Mode_Transport.id_type where id_troncon=$id");
                while ($donnees6 = $reponse6->fetch()) {
                    if ($acc==0){echo $donnees6['descr_type'];
                        $acc++;}
                }
                ?>
            </td>

        </tr>

        <?php
        $arriv = $donnees['station_arr'];
        $i++;
            ?>
        </thead>
        <tbody>
        <?php


        recherche($bdd,$arriv,'',$liste,$stockage,$heure_dep,$heure_max,$arrivee,$prix2,$duree_anc,$prix_anc,$duree2,$a,$b,$c,$d,$e,$f,$map,$map0);
        }
        }
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
    
    
