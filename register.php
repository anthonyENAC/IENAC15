<?php include("entete.php"); ?>

<?php

$bdd=new PDO('mysql:host=localhost;dbname=GRIT', 'root', '');

if(isset($_POST['forminscription']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $mdp=sha1($_POST['mdp']);
    $mdp2=sha1($_POST['mdp2']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $nomlenght=strlen($nom);
        if($nomlenght <= 20)
        {
            $prenomlenght=strlen($prenom);
            if($prenomlenght <= 20)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail=$bdd->prepare("SELECT * FROM Utilisateur WHERE email = ?");
                    $reqmail->execute(array($email));
                    $mailexist=$reqmail->rowCount();
                    if($mailexist==0)
                    {
                        if ($mdp == $mdp2) {
                            $insertmbr = $bdd->prepare("INSERT INTO Utilisateur(nom, prenom, email, mdp) VALUES(?, ?, ?, ?)");
                            $insertmbr->execute(array($nom, $prenom, $email, $mdp));
                            $erreur = "Votre compte a bien été créé !";
                            header('Location: index.php');
                        } else {
                            $erreur = "Vos mots de passe ne correscpondent pas";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                }
                else
                {
                    $erreur="Votre adresse mail n'est pas valide !";
                }
            }

            else
            {
                $erreur="Votre prenom ne doit pas dépasser 20 caractères !";
            }

        }
        else
        {
            $erreur="Votre nom ne doit pas dépasser 20 caractères !";
        }

    }
    else
    {
        $erreur="Tous les champs doivent être complétés";
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <h2>Inscription</h2>
            <br /><br />
            <?php
            if(isset($erreur))
            {
                echo "<font color='red''>".$erreur."</font>";
            }
            ?>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td align="right">
                            <label for="nom">Nom : </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;} ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="fprenom">Prenom : </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Email : </label>
                        </td>
                        <td>
                            <input type="email" placeholder="Email" id="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mdp">Mot de passe : </label>
                        </td>
                        <td>
                            <input type="password" placeholder="Password" id="mdp" name="mdp" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mdp2">Confirmez votre mot de passe : </label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez mdp" id="mdp2" name="mdp2" />
                        </td>
                    </tr>
                </table>
                <br />
                <input type="submit" name="forminscription" value="S'inscrire" />
                <br /><br />
            </form>
        </div>
    </body>
    <?php include("footer.php"); ?>
</html>