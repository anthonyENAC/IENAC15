<!-- L'entete et le menu -->
    <?php $contact=1 ?>
    <?php include("entete.php"); ?>

    <div id="concepteur">
        <h2>Concepteurs du site</h2>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <img src="images/guillaume_thirion.jpg" alt="Photo de Guillaume THIRION" id="pic" />
                    <div>
                        <a href="guillaume_thirion_cv.php">Guillaume THIRION</a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <img src="images/matthieu_gaulmin.jpg" alt="Photo de Matthieu GAULMIN" id="pic" />
                    <a href="matthieu_gaulmin_cv.php">Matthieu GAULMIN</a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <img src="images/clement_begaud.jpg" alt="Photo de Clément BEGAUD" id="pic" />
                    <div>
                        <a href="clement_begaud_cv.php">Clément BEGAUD</a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <img src="images/anthony_aman.jpg" alt="Photo de Anthony AMAN" id="pic" />
                    <div>
                        <a href="anthony_aman_cv.php">Anthony AMAN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contacter">
        <h2>Des questions ou des commentaires?</h2>
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 form-group" >
                    <form method="post" action="/IENAC15/python/page2.py/fcontacter"  enctype="multipart/form-data">
                        <input name="name" placeholder="Nom Prénom" type="text" />
                        <input name="email" placeholder="Email" type="text" />
                        <textarea name="message" placeholder="Message"></textarea>
                        <button class="button" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
    </div>
         
</body>

