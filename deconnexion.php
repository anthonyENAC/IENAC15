<?php include('entete.php');
if(!isset($_SESSION))
{
    session_start();
}
$_SESSION=array();
session_destroy();
?>
    <html>
    
            <div align="center">
                <h4>Vous avez bien été déconnecté.</h4>
            </div>
            <br />
            <div align="center">
                <h4>Pour vous connecter, cliquer ici : <a href="connexion.php">Se connecter</a></h4>
            </div>
        

    </html>

<?php include("footer.php"); ?>