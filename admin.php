<?php include ('entete.php'); 
session_start();
?>

<div id="admin" align="center">
     <h2>Bienvenue sur la page d'administration</h2>
     <h5>Vous pouvez ici gérer la base de données du site de la GRIT</h5>
    
<form method="post" action="submit.php">
    <div id="ajout_mode_type" class="center">
            </br>Passer un utilisateur en administrateur :</br>
            <label>Nom</label>
            <select name="ajout_admin">
                <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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

<form method="post" action="submit.php">
    <div id="ajout_mode_type" class="center">
        </br>Ajouter un type de mode de transport :</br>
        <label>Nom</label>
        <input type="text" name="new_type" />
        <input type="submit" value="Ajouter" />
    </div>
</form>

<form method="post" action="submit.php">
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
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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
                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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
                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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

<form method="post" action="submit.php">
    <div id="ajout_mode_type" class="center">
        </br>Ajouter un tronçon :</br>
        <label>Nom</label>
        <input type="text" name="nom_troncon" /></br>
        <label>Station de départ</label>
        <select name="station_dep">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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
                $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
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

</div>

<?php include("footer.php"); ?>