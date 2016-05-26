<!-- L'entete et le menu -->

<?php
session_start();
include("entete.php");
$bdd=new PDO('mysql:host=localhost;dbname=GRIT', 'root', 'mysql');

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
        <h1>Bonjour <?php echo $userinfo['prenom']; ?> !</h1>
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
            <div style="padding:1px; background-color:ivory; border:2px solid #656ab0; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;">
                    <div id="global1">
                        <p>
                            <label for="pays">De</label><br />
                            <select name="ville_dep" >
                                <?php
                                try
                                {
                                    // On se connecte à MySQL

                                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
                                }
                                catch(Exception $e)
                                {
                                    // En cas d'erreur, on affiche un message et on arrête tout
                                    die('Erreur : '.$e->getMessage());
                                }

                                // Si tout va bien, on peut continuer

                                // On récupère tout le contenu de la table jeux_video
                                $reponse = $bdd->query('SELECT * FROM Station');

                                // On affiche chaque entrée une à une

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                        <p>
                            <strong>station départ</strong> <option value="<?php echo $donnees['nom_station']; ?>"><?php echo $donnees['nom_station']; ?></option> :<br />
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
                            <label for="pays">De</label><br />
                            <select name="ville_arr" >
                                <?php
                                try
                                {
                                    // On se connecte à MySQL

                                    $bdd = new PDO('mysql:host=localhost;dbname=GRIT;charset=utf8', 'root', 'mysql');
                                }
                                catch(Exception $e)
                                {
                                    // En cas d'erreur, on affiche un message et on arrête tout
                                    die('Erreur : '.$e->getMessage());
                                }

                                // Si tout va bien, on peut continuer

                                // On récupère tout le contenu de la table jeux_video
                                $reponse = $bdd->query('SELECT nom_station FROM Station');

                                // On affiche chaque entrée une à une

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                        <p>
                            <strong>station d'arrivé</strong> <option value="<?php echo $donnees['nom_station']; ?>"><?php echo $donnees['nom_station']; ?></option> :<br />
                        </p>
                        <?php

                        }

                        $reponse->closeCursor(); // Termine le traitement de la requête
                        ?>
                        </select>
                        </p>
                    </div>

                <script>
                    $(function() {
                        $( "#datepicker" ).datepicker();
                    });
                </script>

                <div class="row">
                    <div id="global">
                        <p><label>Date de Départ</label><br /><input name="date" type="text" id="datepicker"></p>
                    </div>

                    <div id="global">
                        <p><label>Départ</label><br />
                            <select name="heure_dep">
                                <option value="05">05h</option>
                                <option value="06">06h</option>
                                <option value="07">07h</option>
                                <option value="08">08h</option>
                                <option value="09">09h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                            </select>
                        </p>
                    </div>

                    <div id="global">
                        <p><label>Arrivée</label><br />
                            <select name="heure_max">
                                <option value="08">08h</option>
                                <option value="09">09h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                            </select>
                        </p>
                    </div>

                </div>


                
                <br />
                <button class="button" type="submit">Rechercher</button>
            </div>
            </div>
            </div>
            </form>
        </section>
    </div>
    <div id="contacter">
        <h2>Des questions ou des commentaires?</h2>
        <div class="row">
            <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 form-group" >
                <form method="post" action="/IENAC15/aman_begaud_gaulmin_thirion/confirmation_message.php"  enctype="multipart/form-data">
                    <input name="name" placeholder="Nom Prénom" type="text" />
                    <input name="email" placeholder="Email" type="email" />
                    <textarea name="message" placeholder="Message"></textarea>
                    <button class="button" type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>    

<div
<!-- Footer -->
<?php include("footer.php"); ?>

