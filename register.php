<?php include("entete.php"); ?>

<html>
<head>
    <meta charset="utf-8">
</head>
    <body>
    <div align="center">
        <h2>Inscription</h2>
        <br />

<?php

$bdd=new PDO('mysql:host=localhost;dbname=GRIT', 'root', 'mysql');

if(isset($_POST['forminscription']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $mdp=sha1($_POST['mdp']);
    $mdp2=sha1($_POST['mdp2']);
    $date_naiss=date($_POST['date_naiss']);

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
                        if ($mdp == $mdp2)
                        {

                            if ($mdp >= 6)
                            {
                                    $insertmbr = $bdd->prepare("INSERT INTO Utilisateur(nom, prenom, email, mdp, date_naiss) VALUES(?, ?, ?, ?, ?)");
                                    $insertmbr->execute(array($nom, $prenom, $email, $mdp, $date_naiss));
                                    $form = false;

                            ?>
                            <div class="message" align="center">Vous avez bien été inscrit. Vous pouvez désormais vous
                                connecter avec vos identifiants.<br/>
                                <a href="connexion.php">Se connecter</a></div>
                            <?php
                            }
                            else
                            {
                                $form=true;
                                $erreur="Votre mot de passe n'est pas assez long.";

                            }
                        }
                        else
                        {
                            $form=true;
                            $erreur = "Vos mots de passe ne correscpondent pas.";
                        }
                    }
                    else
                    {
                        $form=true;
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                }
                else
                {
                    $form=true;
                    $erreur="Votre adresse mail n'est pas valide !";
                }
            }

            else
            {
                $form=true;
                $erreur="Votre prenom ne doit pas dépasser 20 caractères !";
            }

        }
        else
        {
            $form=true;
            $erreur="Votre nom ne doit pas dépasser 20 caractères !";
        }

    }
    else
    {
        $form=true;
        $erreur="Tous les champs doivent être complétés";
    }
}
else
{
    $form=true;
}
if($form)
{
    if (isset($erreur))
    {
        echo "<font color='red'>" . $erreur . "</font>";
    }
                ?>
    <h5>Veuillez remplir le formulaire ci-dessous.</h5>
    <br /><br />
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td align="right">
                                <label for="nom">Nom : </label>
                            </td>
                            <td>
                                <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if (isset($nom)) {
                                    echo $nom;
                                } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="prenom">Prenom : </label>
                            </td>
                            <td>
                                <input type="text" placeholder="Prenom" id="prenom" name="prenom"
                                       value="<?php if (isset($prenom)) {
                                           echo $prenom;
                                       } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="email">Email : </label>
                            </td>
                            <td>
                                <input type="email" placeholder="Email" id="email" name="email"
                                       value="<?php if (isset($email)) {
                                           echo $email;
                                       } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="mdp">Mot de passe (min 6 caractères) : </label>
                            </td>
                            <td>
                                <input type="password" placeholder="Password" id="mdp" name="mdp"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="mdp2">Confirmez votre mot de passe : </label>
                            </td>
                            <td>
                                <input type="password" placeholder="Confirmez mdp" id="mdp2" name="mdp2"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="date_naiss">Date de naissance :</label>
                            </td>
                            <td>
                                <input type="date" id="date_naiss" name="date_naiss" placeholder="Date de naissance"/><br/>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <input type="submit" name="forminscription" value="S'inscrire"/>
                    <br/><br/>
                </form>
                <?php
}
            ?>
        </div>
    </body>
    <?php include("footer.php"); ?>
</html>
