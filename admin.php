<?php include ('config.php'); ?>
<?php include ('entete.php'); ?>

<div id="admin" align="center">
     <h2><?php echo "Bienvenue sur la page d'administration, "  .$_SESSION['prenom']; ?></h2>
     <p>Vous pouvez ici gérer la base de données du site de la GRIT</p>
</div>

<div id="ajout" align="center"
     <form action="sign_up.php" method="post">
          Ajouter un tronçon :<br />
          <div class="center">
               <label for="duree">Durée (secondes)</label><input type="number" name="duree" value="<?php if(isset($_POST['duree'])){echo htmlentities($_POST['duree'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
               <label for="heure_passage">Heure de passage</label><input type="time" name="nom" value="<?php if(isset($_POST['heure_passage'])){echo htmlentities($_POST['heure_passage'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
               <label for="prix">Prix</label><input type="number" name="prix" value="<?php if(isset($_POST['prix'])){echo htmlentities($_POST['prix'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
               <input type="submit" value="Envoyer" />
          </div>
     </form>
     <?php
     $sql = 'INSERT INTO Transport_Troncon VALUES ()';
     mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());