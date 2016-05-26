<!DOCTYPE html>
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
                <a href="index.php"><img src="images/logo.png" alt="LOGO" height="86" width="170" /></a>
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
                        echo "<a href='accueil.php'><p>Accueil</p></a>";
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if(isset($_SESSION["id_user"]))
                    {
                        $_a= $_SESSION["id_user"];
                        echo "<a href='contacts.php?id_user=$_a'<p>Contacts</p></a>";
                    }
                    else
                    {
                        echo "<a href='accueil.php'><p>Contacts</p></a>";
                    }
                    ?>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION["id_user"]))
                        {
                            echo "<a href='deconnexion.php'><p>Deconnexion</p></a>";
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

