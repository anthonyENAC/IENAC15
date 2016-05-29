<!-- L'entete et le menu -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

<?php
session_start();
include("entete.php");
$bdd=new PDO('mysql:host=localhost;dbname=IENAC15_GRIT', 'root', '');

if(isset($_GET['id_user']) AND $_GET['id_user'] > 0)
{
    $getid = intval($_GET['id_user']);
    $requser = $bdd->prepare('SELECT * FROM Utilisateur WHERE id_user = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

if(isset($_POST['submitcom'])) {
    $nomprenom = htmlspecialchars($_POST['nomprenom']);
    $emailcom = htmlspecialchars($_POST['emailcom']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($_POST['nomprenom']) AND !empty($_POST['emailcom']) AND !empty($_POST['message'])) {
        $reqmessage = $bdd->prepare("INSERT INTO Commentaires(Nom_Prenom, E_mail, Commentaire) VALUES (?, ?, ?)");
        $reqmessage->execute(array($nomprenom, $emailcom, $message));
        $pop='1';
    } else {
        $pop ='2';

    }
}
?>
<div id="popup_name1" class="popup_block">
    Votre message a été envoyé !
</div>

<div id="popup_name2" class="popup_block">
    Votre message n'a pas pu être envoyé ! Veuillez recommencer !
</div><?php
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
            <form method="post" action="/IENAC15/aman_begaud_gaulmin_thirion/recherche.php">
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
                                            $bdd = new PDO('mysql:host=localhost;dbname=IENAC15_GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        $reponse = $bdd->query('SELECT * FROM Station WHERE id_station=1');
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
                                            $bdd = new PDO('mysql:host=localhost;dbname=IENAC15_GRIT;charset=utf8', 'root', '');
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        $reponse = $bdd->query('SELECT nom_station FROM Station WHERE id_station=2');
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
                                        <input type="time" id="time_dep" name="heure_dep">
                                    </p>
                                </div>

                                <div id="global">
                                    <p><label>Arrivée</label><br/>
                                        <input type="time" id="time_arr" name="heure_max">
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
            <input name="nomprenom" id="nomprenom" placeholder="Nom Prénom" type="text"/><br/><br/>
            <input name="emailcom" id="emailcom" placeholder="Email" type="text"/><br/><br/>
            <input type="text" id="message" name="message" placeholder="Message"/>
            <a name="submitcom" href="#?w=500" rel="popup_name<?php echo $pop;?>" class="poplight" value="Envoyer" ><h3 id="bob">Envoyer</h3></a>
        </form>
        <br/>

    </div>
</div>

<?php
} 
else {
    echo "<h1>Bienvenue sur le site de la GRIT</h1><br />";
    header("Location : accueil.php");

    ?>
    <div id="area">
    <section id="itinéraire">
    <h2>
        <div style="padding:4px; border:4px solid #424380;">
            <div style="padding:3px; background-color:#424380;">
                <br/><br/><br/><br/>
                Trouvez votre itinéraire et calculez son coût. <br/><br/>
                Pour utiliser notre site, veuillez vous connecter
                en cliquant sur <a href="connexion.php">Se connecter</a> et n'hésitez pas à rejoindre notre communauté
                en laissant des commentaires.
                <br/><br/><br/><br/><br/>
            </div>
        </div>
    </h2>
    </section>
    </div>

    <?php
}
    ?>

<!-- Footer -->
<?php include("footer.php"); ?>


<script>
    $(document).ready(function() {
        $('a.poplight[href^=#]').click(function() {
            var popID = $(this).attr('rel'); //Trouver la pop-up correspondante
            var popURL = $(this).attr('href'); //Retrouver la largeur dans le href

//Récupérer les variables depuis le lien
            var query= popURL.split('?');
            var dim= query[1].split('&amp;');
            var popWidth = dim[0].split('=')[1]; //La première valeur du lien

//Faire apparaitre la pop-up et ajouter le bouton de fermeture
            $('#' + popID).fadeIn().css({
                    'width': Number(popWidth)
                })
                .prepend('<a href="#" class="close"><img src="/IENAC15/aman_begaud_gaulmin_thirion/images/close_pop.png" class="btn_close" title="Fermer" alt="Fermer" /></a>');

//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
            var popMargTop = ($('#' + popID).height() + 80) / 2;
            var popMargLeft = ($('#' + popID).width() + 80) / 2;

//On affecte le margin
            $('#' + popID).css({
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft
            });

//Effet fade-in du fond opaque
            $('body').append('<div id="fade"></div>'); //Ajout du fond opaque noir
//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues de IE
            $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

            return false;
        });

//Fermeture de la pop-up et du fond
        $('a.close, #fade').live('click', function() { //Au clic sur le bouton ou sur le calque...
            $('#fade , .popup_block').fadeOut(function() {
                $('#fade, a.close').remove();  //...ils disparaissent ensemble
            });
            return false;
        });

    });
</script>
