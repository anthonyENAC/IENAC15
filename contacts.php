<!-- L'entete et le menu -->
    <?php include("entete.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION['id_user']))
    {
        ?>

        <div id="concepteur">
            <h2>Concepteurs du site</h2>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3" align="center">
                        <img src="images/guillaume_thirion.jpg" alt="Photo de Guillaume THIRION" id="pic"/><br/>
                        <div>
                            <a href="guillaume_thirion_cv.php">Guillaume THIRION</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3" align="center">
                        <img src="images/matthieu_gaulmin.jpg" alt="Photo de Matthieu GAULMIN" id="pic"/><br/>
                        <a href="matthieu_gaulmin_cv.php">Matthieu GAULMIN</a>
                    </div>
                    <div class="col-xs-6 col-sm-3" align="center">
                        <img src="images/clement_begaud.jpg" alt="Photo de Clément BEGAUD" id="pic"/><br/>
                        <div>
                            <a href="clement_begaud_cv.php">Clément BEGAUD</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3" align="center">
                        <img src="images/anthony_aman.jpg" alt="Photo de Anthony AMAN" id="pic"/><br/>
                        <div>
                            <a href="anthony_aman_cv.php">Anthony AMAN</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <?php
    }
    else
    {
        echo "Veuillez vous connecter <a href='connexion.php'>Se Connecter</a>";
    }
        ?>
<!-- Footer -->
<?php include("footer.php"); ?>