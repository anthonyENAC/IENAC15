<?php include ('entete.php'); 
session_start();
?>

<div id="admin" align="center" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
     <h2>Bienvenue sur la page d'administration</h2>
     <h5>Vous pouvez ici gérer la base de données du site de la GRIT</h5>
    
<form method="post" action="submit.php">
    <div id="ajout_mode_type" class="center">
            </br>Ajouter un type de mode de transport :</br>
            <label>Nom</label>
            <input type="text" name="new_type" />
            <input type="submit" value="Ajouter" />
        </div>
    </form>    
    
<form method="post" action="submit.php">
    <div id="ajout_mode_transp" class="center">
        </br>Ajouter un mode de transport :<br/>
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
        <label>Latitude</label>
        <input type="text" name="lat" /></br>
        <label>Longitude</label>
        <input type="text" name="lng" /></br>
        <input type="submit" value="Ajouter" />
    </div>
</form>

</div>

<?php include("footer.php"); ?>