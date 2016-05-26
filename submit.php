<?php include ('entete.php');
session_start();

$mysqli = new mysqli("localhost", "root", "mysql", "GRIT");
if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
    }



$option1 = isset($_POST['new_type']) ? true : false;
$option2 = isset($_POST['nom_station'], $_POST['lat'], $_POST['lng']) ? true : false;
$option3 = isset($_POST['ajout_admin']) ? true : false;
$option4 = isset($_POST['new_duree'], $_POST['new_heure'], $_POST['new_prix'], $_POST['troncon'], $_POST['etat_mode'],
    $_POST['type_mode']) ? true : false;
$option5 = isset($_POST['station_dep'], $_POST['station_arr']) ? true : false;


if ($option1) {
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
    else {
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    }
    $mysqli->close();
    }

if ($option2) {
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
    else {
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    }
    $mysqli->close();
}

if ($option3) {
    $ajout_admin = htmlentities($_POST['ajout_admin'], ENT_QUOTES, "UTF-8");

    if ($mysqli->query("INSERT INTO Administrateur VALUES ($ajout_admin)") === TRUE)
    {
        ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
        <?php
    }
    else {
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    }
    $mysqli->close();
}

if ($option4) {
    $etat = htmlentities($_POST['etat_mode'], ENT_QUOTES, "UTF-8");
    $type = htmlentities($_POST['type_mode'], ENT_QUOTES, "UTF-8");
    $new_duree = htmlentities($_POST['new_duree'], ENT_QUOTES, "UTF-8");
    $new_heure1 = htmlentities($_POST['new_heure'], ENT_QUOTES, "UTF-8");
    $new_heure2 = explode(":", $new_heure1);
    $new_heure = intval($new_heure2[0])*3600 + intval($new_heure2[1])*60;
    $new_prix = htmlentities($_POST['new_prix'], ENT_QUOTES, "UTF-8");
    $troncon = htmlentities($_POST['troncon'], ENT_QUOTES, "UTF-8");
    
    if ($mysqli->query("INSERT INTO Mode_Transport VALUES ('', $etat, $type)") === TRUE)
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse3 = $bdd->query('SELECT MAX(id_transport) AS max_id FROM Mode_Transport');
        $id_transp = $reponse3->fetch();
        if ($mysqli->query("INSERT INTO Transport_Troncon VALUES ('', $new_duree, $new_heure, $new_prix, $id_transp[0], $troncon)") === TRUE)
        ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
        <?php
    }
    else {
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    }
    $mysqli->close();
}

if ($option5) {
    $station_dep = htmlentities($_POST['station_dep'], ENT_QUOTES, "UTF-8");
    $station_arr = htmlentities($_POST['station_arr'], ENT_QUOTES, "UTF-8");
    $nom_troncon = htmlentities($_POST['nom_troncon'], ENT_QUOTES, "UTF-8");

    if ($mysqli->query("INSERT INTO Troncon VALUES ('', '$nom_troncon', $station_dep, $station_arr)") === TRUE)
    {
        ?>
        <div align="center">
            <img src="images/ok.svg" height="128px" width="128px">
            <h4>Les nouvelles données ont bien été ajoutées à la base de données.</h4>
        </div>
        <?php
    }
    else {
        ?>
        <div align="center">
            <img src="images/error.png" height="128px" width="128px">
            <h4>Problème détécté dans l'ajout des données.</h4>
        </div>
        <?php ;
    }
    $mysqli->close();
}
?>

<div align="center">
    <a href="admin.php">Retourner à la page d'administration</a>
</div>

<?php include("footer.php"); ?>