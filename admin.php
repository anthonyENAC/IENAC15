<?php include ('entete.php'); ?>
<?php
try
{
     $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
}

catch(Exception $e)
{
     die('Erreur : '.$e->getMessage());
}
?>


<div id="admin" align="center">
     <h2>Bienvenue sur la page d'administration</h2>
     <p>Vous pouvez ici gérer la base de données du site de la GRIT</p>
</div>

<!--<div id="ajout" align="center"-->
<!--     <form action="sign_up.php" method="post">-->
<!--          Ajouter un tronçon :<br />-->
<!--          <div class="center">-->
<!--               <label for="duree">Durée (secondes)</label><input type="number" name="duree" value="--><?php //if(isset($_POST['duree'])){echo htmlentities($_POST['duree'], ENT_QUOTES, 'UTF-8');} ?><!--" /><br />-->
<!--               <label for="heure_passage">Heure de passage</label><input type="time" name="nom" value="--><?php //if(isset($_POST['heure_passage'])){echo htmlentities($_POST['heure_passage'], ENT_QUOTES, 'UTF-8');} ?><!--" /><br />-->
<!--               <label for="prix">Prix</label><input type="number" name="prix" value="--><?php //if(isset($_POST['prix'])){echo htmlentities($_POST['prix'], ENT_QUOTES, 'UTF-8');} ?><!--" /><br />-->
<!--               <input type="submit" value="Envoyer" />-->
<!--          </div>-->
<!--     </form>-->
<!--     --><?php
//     $sql = 'INSERT INTO Transport_Troncon VALUES ()';
//     mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
//     ?>
<!--</div>-->


<div id="ajout" align="center"
    <form action="sign_up.php" method="post">
    Ajouter un mode de transport :<br />
          <div class="center">
               <select name="etat">
                    <?php
                    $reponse = $bdd->query("SELECT etat FROM Etat");
                    while ($donnees1 = $reponse->fetch());
                    {
                        ?>
                        <option value="<?php echo $donnees1['etat'] ?>"><?php echo $donnees1['etat'] ?></option>
                        <?php
                    }
                    $reponse->closeCursor();
                    ?>
               </select>
               <select name="type">
                    <?php
                    $reponse2 = $bdd->query("SELECT descr_type FROM Mode_Type");
                    while ($donnees2 = $reponse2->fetch());
                    {
                        ?>
                        <option value="<?php echo $donnees1['descr_type'] ?>"><?php echo $donnees1['descr_type'] ?></option>
                        <?php
                    }
                    $reponse2->closeCursor();
                    ?>
               </select>
          </div>
    </form>
</div>