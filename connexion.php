<?php include('config.php'); ?>
<?php include('entete.php'); ?>
<?php
if(isset($_SESSION['email']))
{
    unset($_SESSION['email'], $_SESSION['userid']);
    ?>
    <div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br />
        <a href="<?php echo $url_home; ?>">Accueil</a></div>
    <?php
}
else
{
    $oemail = '';
    if(isset($_POST['email'], $_POST['mdp']))
    {
        if(get_magic_quotes_gpc())
        {
            $oemail = stripslashes($_POST['email']);
            $email = mysql_real_escape_string(stripslashes($_POST['email']));
            $mdp = stripslashes($_POST['mdp']);
        }
        else
        {
            $email = mysql_real_escape_string($_POST['email']);
            $mdp = $_POST['mdp'];
        }
        $req = mysql_query('select mdp,id_user from Utilisateur where email="'.$email.'"');
        $dn = mysql_fetch_array($req);
        if($dn['mdp']==$mdp and mysql_num_rows($req)>0)
        {
            $form = false;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['userid'] = $dn['id_user'];
            ?>
            <div class="message">Vous avez bien été connecté. Vous pouvez accéder à votre espace membre.<br />
                <a href="<?php echo $url_home; ?>">Accueil</a></div>
            <?php
        }
        else
        {
            $form = true;
            $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
        }
    }
    else
    {
        $form = true;
    }
    if($form)
    {
        if(isset($message))
        {
            echo '<div class="message">'.$message.'</div>';
        }
        ?>
        <div class="content">
            <form action="connexion.php" method="post">
                Veuillez entrer vos identifiants pour vous connecter:<br />
                <div class="center">
                    <label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo htmlentities($oemail, ENT_QUOTES, 'UTF-8'); ?>" /><br />
                    <label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" /><br />
                    <input type="submit" value="Connexion" />
                </div>
            </form>
        </div>
        <?php
    }
}
?>
<?php include("footer.php"); ?>