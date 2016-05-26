<?php include ('entete.php');
session_start();

$mysqli = new mysqli("localhost", "root", "mysql", "GRIT");
if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
    }


$option1 = isset($_POST['etat_mode'],$_POST['type_mode']) ? true : false;
$option2 = isset($_POST['new_type']) ? true : false;
$option3 = isset($_POST['nom_station'], $_POST['lat'], $_POST['lng']) ? true : false;

if($option1) {
    $etat = htmlentities($_POST['etat_mode'], ENT_QUOTES, "UTF-8");
    $type = htmlentities($_POST['type_mode'], ENT_QUOTES, "UTF-8");

    if ($mysqli->query("INSERT INTO Mode_Transport VALUES ('', $etat, $type)") === TRUE)
    {
       ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
    <?php
    }
    else
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
    <?php ;
    $mysqli->close();
    }


if ($option2) {
    $new_type = htmlentities($_POST['new_type'], ENT_QUOTES, "UTF-8");

    if ($mysqli->query("INSERT INTO Mode_Type VALUES ('', '$new_type')") === TRUE)
    {
        ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
    <?php
    }
    else
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    $mysqli->close();
    }

if ($option3) {
    $nom_station = htmlentities($_POST['nom_station'], ENT_QUOTES, "UTF-8");
    $lat = htmlentities($_POST['lat'], ENT_QUOTES, "UTF-8");
    $lng = htmlentities($_POST['lng'], ENT_QUOTES, "UTF-8");

    if ($mysqli->query("INSERT INTO Station VALUES ('', '$nom_station', '$lat', '$lng')") === TRUE)
    {
        ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
        <?php
    }
    else
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
    <?php ;
    $mysqli->close();
}

?>

<div align="center">
    <a href="admin.php">Retourner à la page d'administration</a>
</div>

<?php include("footer.php"); ?>