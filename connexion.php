<?php include('entete.php'); ?>

<html>
    <head>
        <meta charset="utf-8">
    </head>

<?php
if(!isset($_SESSION))
{
    session_start();
}

$bdd=new PDO('mysql:host=localhost;dbname=GRIT', 'root', '');


if(isset($_POST["formconnexion"]))
{
    $emailconnect=htmlspecialchars($_POST["emailconnect"]);
    $mdpconnect=sha1($_POST["mdpconnect"]);
    if(!empty($emailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE email = ? AND mdp = ?");
        $requser->execute(array($emailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id_user'] = $userinfo['id_user'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['email'] = $userinfo['email'];
            
            $reqadmin = $bdd->prepare("SELECT * FROM Administrateur WHERE id_user = ?");
            $reqadmin->execute(array($_SESSION['id_user']));
            $adminexist = $reqadmin->rowCount();
            if($adminexist == 1)
            {
                $_SESSION['co'] = 2;
                header('Location: index.php?id_user='.$_SESSION['id_user']);
            }
            else
            {
                $_SESSION['co'] = 1;
                header('Location: index.php?id_user='.$_SESSION['id_user']);
            }
        }
        else
        {
            $erreur = "L'identifiant ou le mot de passe est incorrect !";
        }
    }
    else
    {
        $form = true;
        $erreur = "Tous les champs doivent être remplis";
    }
}

?>

    <div class="header" align="center">
        <h2>Connexion</h2>
    </div>
        <div class="content" align="center">
            <form action="connexion.php" method="post">
                Veuillez entrer vos identifiants pour vous connecter :<br /><br />
                <?php if (isset($erreur))
                        {
                            echo "<font color='red'>" . $erreur . "</font>";
                        } ?>
                <div class="center" >
                    <table>
                        <tr>
                            <td align="right">
                                <label for="emailconnect">Identifiant  :</label>
                            </td>
                            <td>
                                <input type="email" placeholder="email" name="emailconnect" id="emailconnect" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="mdpconnect">Mot de passe  :</label>
                            </td>
                            <td>
                                <input type="password" placeholder="mot de passe" name="mdpconnect" id="mdpconnect" /><br />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" name="formconnexion" value="Connexion" />
                </div>
                <br />
                <div>
                    <h4>Si vous n'avez pas de compte : <a href="register.php">S'inscrire</a></h4>
                </div>
            </form>
        </div>

</html>

<?php include("footer.php"); ?>