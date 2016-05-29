<!DOCTYPE html>
<?php
if(!isset($_SESSION))
{
    session_start();
}
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>GRIT</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel='stylesheet' type='text/css' href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/event.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js" ></script>
        <script type="text/javascript" src="js/bootstrap-table.min.js" ></script>
    </head>

    <body>

        <div id="header">
            <div class="area">
                <div id="logo">
                    <a href=<?php
                    if(isset($_SESSION["id_user"]))
                    {
                        $_a= $_SESSION["id_user"];
                        echo "index.php?id_user=$_a";
                    }
                    else
                    {
                        echo "index.php";
                    }
                    ?>><img src="images/logo.png" alt="LOGO" height="86" width="170" /></a>
                </div>
                <ul id="navigation">
    
                    <li class='selected'>
                        <?php
                        if(isset($_SESSION["id_user"]))
                        {
                            $_a= $_SESSION["id_user"];
                            echo "<a href='index.php?id_user=$_a'<p>Accueil</p></a>";
                        }
                        else
                        {
                            echo "<a href='index.php'><p>Accueil</p></a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if(isset($_SESSION["id_user"]))
                        {
                            if($_SESSION['co'] == 2)
                            {
                                $_a= $_SESSION["id_user"];
                                echo "<a href='admin.php?id_user=$_a'<p>Admin</p></a>";
                            }
                            else
                            {
                                $_a= $_SESSION["id_user"];
                                echo "<a href='contacts.php?id_user=$_a'<p>Contact</p></a>";
                            }
                        }
                        else
                        {
                            echo "<a href='index.php'><p>Contact</p></a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                            if(isset($_SESSION["id_user"]))
                            {
                                echo "<a href='deconnexion.php'><p>Déconnexion</p></a>";
                            }
                            else
                            {
                               echo "<a href='connexion.php'><p>Connexion</p></a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div> 

