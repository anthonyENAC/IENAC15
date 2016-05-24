<?php include('config.php'); ?>
<?php include("entete.php"); ?>
    <title>Inscription</title>
<div class="header">
    Inscription
</div>
<?php

if(isset($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['passverif'], $_POST['email'], $_POST['date_naiss']) and $_POST['email']!='')
{
    if(get_magic_quotes_gpc())
    {
        $_POST['prenom'] = stripslashes($_POST['prenom']);
        $_POST['nom'] = stripslashes($_POST['nom']);
        $_POST['mdp'] = stripslashes($_POST['mdp']);
        $_POST['passverif'] = stripslashes($_POST['passverif']);
        $_POST['email'] = stripslashes($_POST['email']);
        $_POST['date_naiss'] = stripslashes($_POST['date_naiss']);
    }
    if($_POST['mdp']==$_POST['passverif'])
    {
        if(strlen($_POST['mdp'])>=6)
        {
            if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
            {
                $mdp = mysql_real_escape_string($_POST['mdp']);
                $prenom = mysql_real_escape_string($_POST['prenom']);
                $nom = mysql_real_escape_string($_POST['nom']);
                $email = mysql_real_escape_string($_POST['email']);
                $date_naiss = mysql_real_escape_string($_POST['date_naiss']);
                $dn = mysql_num_rows(mysql_query('select id_user from Utilisateur where email="'.$email.'"'));
                if($dn==0)
                {
                    $dn2 = mysql_num_rows(mysql_query('select id_user from Utilisateur'));
                    $id_user = $dn2+1;
                    if(mysql_query('insert into Utilisateur(id_user, nom, prenom, date_naiss, email, mdp) values ('.$id_user.', "'.$nom.'", "'.$prenom.'", "'.$date_naiss.'", "'.$email.'", "'.$mdp.'")'))
                    {
                        $form = false;
                        ?>
                        <div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez désormais vous connecter avec vos identifiants.<br />
                            <a href="connexion.php">Se connecter</a></div>
                        <?php
                    }
                    else
                    {$form = true;
                        $message = 'Une erreur est survenue lors de l\'inscription.';
                    }
                }
            }
            else
            {
                $form = true;
                $message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
            }
        }
        else
        {
            $form = true;
            $message = 'Le mot de passe que vous avez entr&eacute; contient moins de 6 caract&egrave;res.';
        }
    }
    else
    {
        $form = true;
        $message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
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
        <form action="sign_up.php" method="post">
            Veuillez remplir ce formulaire pour vous inscrire:<br />
            <div class="center">
                <label for="prenom">Prénom</label><input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
                <label for="nom">Nom</label><input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
                <label for="mdp">Mot de passe<span class="small">(6 caract&egrave;res min.)</span></label><input type="password" name="mdp" /><br />
                <label for="passverif">Mot de passe<span class="small">(v&eacute;rification)</span></label><input type="password" name="passverif" /><br />
                <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
                <label for="date_naiss">Date de naissance format AAAA-MM-JJ</label><input type="text" name="date_naiss" value="<?php if(isset($_POST['date_naiss'])){echo htmlentities($_POST['date_naiss'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
                <input type="submit" value="Envoyer" />
            </div>
        </form>
    </div>
    <?php
}
?>
<?php include("footer.php"); ?>