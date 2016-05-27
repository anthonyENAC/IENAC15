<?php include ('entete.php'); 
session_start();
?>

<div id="admin" align="center">
     <h2>Bienvenue sur la page d'administration</h2>
     <h5>Vous pouvez ici gérer la base de données du site de la GRIT</h5>
    
<form method="post" action="submit.php">
    <div id="ajout_admin" class="center">
        </br>Passer un utilisateur en administrateur :</br>
        <label>Nom</label>
        <select name="ajout_admin">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            $reponse = $bdd->query('SELECT * FROM Utilisateur WHERE Utilisateur.id_user NOT IN (SELECT * FROM Administrateur)');

            while ($donnees3 = $reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees3['id_user'] ?>"><?php echo "{$donnees3['prenom']} {$donnees3['nom']}" ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Ajouter" />
    </div>
</form>

<form id="ajout_mode_type" method="post" action="submit.php">
    </br>Ajouter un type de mode de transport :</br>
    <label>Nom</label>
    <input type="text" name="new_type" />
    <input type="submit" value="Ajouter" />
</form>

<form id="supp_mode_type" method="post" action="submit.php">
    </br>Supprimer un type de mode de transport :</br>
    <select name="supp_type">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Mode_Type');

        while ($donnees7 = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees7['id_type'] ?>"><?php echo $donnees7['descr_type'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Supprimer" />
</form>

<form id="ajout_station" method="post" action="submit.php">
    <div id="ajout_station" class="center">
        </br>Ajouter une station :</br>
        <label>Nom</label>
        <input type="text" name="nom_station" /></br>
        <label>Latitude (°)</label>
        <input type="text" name="lat" /></br>
        <label>Longitude (°)</label>
        <input type="text" name="lng" /></br>
        <input type="submit" value="Ajouter" />
    </div>
</form>
    
<form id="supp_station" method="post" action="submit.php">
    </br>Supprimer une station :</br>
    <select name="supp_station">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Station');

        while ($donnees8 = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees8['id_station'] ?>"><?php echo $donnees8['nom_station'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Supprimer" />
</form>        

<form method="post" action="submit.php">
    <div id="ajout_transp_troncon" class="center">
        </br>Ajouter un nouveau transport pour un tronçon :</br>
        <label>Durée (s)</label>
        <input type="text" name="new_duree" /></br>
        <label>Heure de passage</label>
        <input type="time" name="new_heure" /></br>
        <label>Prix (€)</label>
        <input type="text" name="new_prix" /></br>
        <label>Tronçon</label>
        <select name="troncon">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            $reponse = $bdd->query('SELECT * FROM Troncon');

            while ($donnees4 = $reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees4['id_troncon'] ?>"><?php echo $donnees4['nom_troncon'] ?></option>
                <?php
            }
            ?>
        </select>
        <div id="ajout_mode_transp" class="center">
            <label>Etat du mode de transport</label>
            <select name="etat_mode">
                <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }

                $reponse = $bdd->query('SELECT * FROM Etat');

                while ($donnees = $reponse->fetch())
                {
                    ?>
                    <option value="<?php echo $donnees['id_etat'] ?>"><?php echo $donnees['etat'] ?></option>
                    <?php
                }
                ?>
            </select></br>

            <label>Type de mode de transport</label>
            <select name="type_mode">
                <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }

                $reponse = $bdd->query('SELECT * FROM Mode_Type');

                while ($donnees2 = $reponse->fetch())
                {
                    ?>
                    <option value="<?php echo $donnees2['id_type'] ?>"><?php echo $donnees2['descr_type'] ?></option>
                    <?php
                }
                ?>
            </select></br>
        </div>
        <input type="submit" value="Ajouter" />
    </div>
</form>

<form id="supp_transp_troncon" method="post" action="submit.php">
    </br>Supprimer un transport pour un tronçon :</br>
    <select name="supp_transp_troncon">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Troncon INNER JOIN Transport_Troncon ON Troncon.id_troncon = Transport_Troncon.id_troncon');

        while ($donnees10 = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees10['num'] ?>"><?php echo "{$donnees10['id_transport']} - 
            {$donnees10['nom_troncon']} - "; if ($donnees10['prix'] == NULL) {
                    echo "0";} else {echo $donnees10['prix'];} echo "€ - "; if ($donnees10['heure_passage'] == NULL) {
                    echo "Pas d'horaire défini";} else {echo date('H:i', $donnees10['heure_passage']);}
                ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Supprimer" />
</form>

<form id="ajout_troncon" method="post" action="submit.php">
    <div class="center">
        </br>Ajouter un tronçon :</br>
        <label>Nom</label>
        <input type="text" name="nom_troncon" /></br>
        <label>Station de départ</label>
        <select name="station_dep">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            $reponse = $bdd->query('SELECT * FROM Station');

            while ($donnees5 = $reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees5['id_station'] ?>"><?php echo $donnees5['nom_station'] ?></option>
                <?php
            }
            ?>
        </select></br>
        <label>Station d'arrivée</label>
        <select name="station_arr">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            $stat1 = $_POST['station_dep'];


            $reponse = $bdd->query('SELECT * FROM Station');

            while ($donnees6 = $reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees6['id_station'] ?>"><?php echo $donnees6['nom_station'] ?></option>
                <?php
            }
            ?>
        </select></br>
        <input type="submit" value="Ajouter" />
    </div>
</form>

<form id="supp_troncon" method="post" action="submit.php">
    </br>Supprimer un tronçon :</br>
    <select name="supp_troncon">
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Troncon');

        while ($donnees9 = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees9['id_troncon'] ?>"><?php echo $donnees9['nom_troncon'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Supprimer" />
</form>
</div>

<?php include("footer.php"); ?>