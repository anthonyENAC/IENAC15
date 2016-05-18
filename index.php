<!-- L'entete et le menu -->

<?php include("entete.php"); ?>

<!-- Le corps de la page d'accueil -->
<div id ="contents">
    <div id="titre">
        <h1>Bienvenue sur le site de la GRIT</h1>
        <h2>Trouvez le trajet qui vous correspond !</h2>
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
                    <div id="global">
                        <p>
                            <label for="pays">De</label><br />
                            <select name="ville_dep" >
                                <option value="Ramonville">Ramonville</option>
                            </select>
                        </p>
                    </div>

                    <div id="global">
                        <p>
                            <label for="pays">à</label><br />
                            <select name="ville_arr">
                                <option value="La Défense">La Défense</option>
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
                                <option value="08h">08h</option>
                                <option value="09h">09h</option>
                                <option value="10h">10h</option>
                                <option value="11h">11h</option>
                                <option value="12h">12h</option>
                                <option value="13h">13h</option>
                                <option value="14h">14h</option>
                                <option value="15h">15h</option>
                                <option value="16h">16h</option>
                            </select>
                        </p>
                    </div>

                    <div id="global">
                        <p><label>Arrivée</label><br />
                            <select name="heure_max">
                                <option value="08h">08h</option>
                                <option value="09h">09h</option>
                                <option value="10h">10h</option>
                                <option value="11h">11h</option>
                                <option value="12h">12h</option>
                                <option value="13h">13h</option>
                                <option value="14h">14h</option>
                                <option value="15h">15h</option>
                                <option value="16h">16h</option>
                            </select>
                        </p>
                    </div>

                </div>


                <p id="global"><label>Mode de Transport</label><br />
                    <select name="transport">
                        <option value="Bus">Bus</option>
                        <option value="Métro">Métro</option>
                        <option value="Avion">Avion</option>
                        <option value="Train">Train</option>
                    </select>
                </p>
                <br />
                <button class="button" type="submit">Rechercher</button>
            </div>
            </div>
            </div>
            </form>
        </section>
    </div>
</div>
</div>    

<div
<!-- Footer -->
<?php include("footer.php"); ?>

