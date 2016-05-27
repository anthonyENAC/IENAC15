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
                <div id="trajet">
                    <div class="row">
                        <div
                            style="padding:1px; background-color:ivory; border:2px solid #656ab0; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;">
                            <div id="global1">
                                <p>
                                    <label for="pays">De</label><br/>
                                    <select name="ville_dep">
                                        <?php
                                        try {
                                            // On se connecte à MySQL

                                            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            // En cas d'erreur, on affiche un message et on arrête tout
                                            die('Erreur : ' . $e->getMessage());
                                        }

                                        // Si tout va bien, on peut continuer

                                        // On récupère tout le contenu de la table jeux_video
                                        $reponse = $bdd->query('SELECT * FROM Station');

                                        // On affiche chaque entrée une à une

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

                                $reponse->closeCursor(); // Termine le traitement de la requête
                                ?>
                                </select>
                                </p>
                            </div>

                            <div id="global">
                                <p>
                                    <label for="pays">De</label><br/>
                                    <select name="ville_arr">
                                        <?php
                                        try {
                                            // On se connecte à MySQL

                                            $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            // En cas d'erreur, on affiche un message et on arrête tout
                                            die('Erreur : ' . $e->getMessage());
                                        }

                                        // Si tout va bien, on peut continuer

                                        // On récupère tout le contenu de la table jeux_video
                                        $reponse = $bdd->query('SELECT nom_station FROM Station');

                                        // On affiche chaque entrée une à une

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

                                $reponse->closeCursor(); // Termine le traitement de la requête
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
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div id="contacter">
        <div style="padding:4px; border:4px solid #424380;">
            <div style="padding:3px; background-color:#424380;">
                <h2>Des questions ou des commentaires?
            </div>
        </div>
        <form method="post" action="">
            <input name="name" placeholder="Nom Prénom" type="text"/><br/><br/>
            <input name="email" placeholder="Email" type="text"/><br/><br/>
            <input type="text" name="message" placeholder="Message"/>
        </form>
        <br/>
        <button class="button" type="submit">Envoyer</button>
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

