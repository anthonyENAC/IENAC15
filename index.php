<!-- L'entete et le menu -->

<?php
session_start();
include("entete.php");
$bdd=new PDO('mysql:host=localhost;dbname=GRIT', 'root', '');
if(isset($_GET['id_user']) AND $_GET['id_user'] > 0)
{
    $getid = intval($_GET['id_user']);
    $requser = $bdd->prepare('SELECT * FROM Utilisateur WHERE id_user = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>

<!-- Le corps de la page d'accueil -->
<div id ="contents">
    <div id="titre" align="center">
        <?php
        if(isset($_SESSION['id_user']))
        {
        $prenom = $_SESSION['prenom'];
        echo "<h1>Bonjour $prenom !</h1>"
        ?>

        <h2>Bienvenue sur le site de la GRIT</h2>
        <h3>Trouvez le trajet qui vous correspond !</h3>
    </div>
    <div id="area">
        <section id="itinéraire">
            <h2>
                <div style="padding:4px; border:4px solid #424380;">
                    <div style="padding:3px; background-color:#424380;">
                        Rechercher un Itinéraire
                    </div>
                </div>
            </h2>
            <form method="post" action="/IENAC15/aman_begaud_gaulmin_thirion/page_recherche.php">
                <div id="trajet" align="center">
                    <div class="row" align="center">
                            <div id="global1" align="center">
                                <p>
                                    <label for="pays">De</label><br/>
                                    <select name="ville_dep">
                                        <?php
                                        try {
                                            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        $reponse = $bdd->query('SELECT * FROM Station');
                                        while ($donnees = $reponse->fetch())
                                        {
                                        ?>
                                <p>
                                    <strong>station départ</strong>
                                    <option
                                        value="<?php echo $donnees['nom_station']; ?>"><?php echo $donnees['nom_station']; ?></option>
                                    :<br/>
                                </p>
                                <?php
                                }
                                $reponse->closeCursor();
                                ?>
                                </select>
                                </p>
                            </div>

                            <div id="global" align="center">
                                <p>
                                    <label for="pays">A</label><br/>
                                    <select name="ville_arr">
                                        <?php
                                        try {
                                            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        $reponse = $bdd->query('SELECT nom_station FROM Station');
                                        while ($donnees = $reponse->fetch())
                                        {
                                        ?>
                                <p>
                                    <strong>station d'arrivé</strong>
                                    <option
                                        value="<?php echo $donnees['nom_station']; ?>"><?php echo $donnees['nom_station']; ?></option>
                                    :<br/>
                                </p>
                                <?php
                                }
                                $reponse->closeCursor();
                                ?>
                                </select>
                                </p>
                            </div>

                            <script>
                                $(function () {
                                    $("#datepicker").datepicker();
                                });
                            </script>

                            <div class="row">
                                <div id="global">
                                    <p><label>Date de Départ</label><br/>
                                        <input name="date" type="date" id="date_depart"></p>
                                </div>

                                <div id="global">
                                    <p><label>Départ</label><br/>
                                        <input type="time" id="time_dep" name="time_dep">
                                    </p>
                                </div>

                                <div id="global">
                                    <p><label>Arrivée</label><br/>
                                        <input type="time" id="time_arr" name="time_arr">
                                    </p>
                                </div>

                            </div>
                            <br/>
                            <button class="button" type="submit">Rechercher</button>
                            <br /><br />
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div id="contacter">
        <div style="padding:4px; border:4px solid #424380;">
            <div style="padding:3px; background-color:#424380;">
                <h2>Des questions ou des commentaires?</h2>
            </div>
        </div>
        <form method="post" action="">
            <input name="name" placeholder="Nom Prénom" type="text" /><br/><br/>
            <input name="email" placeholder="Email" type="text" /><br/><br/>
            <input type="text" name="message" placeholder="Message" />
        </form>
        <button class="button" type="submit">Envoyer</button>
        <br /><br />
    </div>
</div>

<?php
}
else
{
    echo "Veuillez vous connecter <a href='connexion.php'>Se Connecter</a>";
    header("Location : accueil.php");
}
?>


<!-- Footer -->
<?php include("footer.php"); ?>