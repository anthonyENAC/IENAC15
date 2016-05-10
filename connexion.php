<!-- ENTETE ET MENU -->
<?php include("entete.php"); ?>

<!-- CONNEXION A LA BDD -->
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
    echo"connect";
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<!-- INSCRIPTION -->
<div id="inscription">

        <label>Nom: <input type="text" name="nom"/></label><br/>
        <label>Prénom: <input type="text" name="prenom"/></label><br/>
        <label>Mot de passe: <input type="password" name="passe"/></label><br/>
        <label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
        <label>Adresse e-mail: <input type="text" name="email"/></label><br/>
    <form method="post">
        <script type="script">
            function add() {
                echo"ok";
            }
        </script>
        <input type="submit" value="M'inscrire" onclick="add()" />
    </form>
</div>

<!-- CONNEXION -->
<div id="connexion">
    <form method="post">
        <label>Pseudo: <input type="text" name="pseudo"/></label><br/>
        <label>Mot de passe: <input type="password" name="passe"/></label><br/>
        <input type="submit" value="Me connecter"/>
    </form>
</div>

