    <?php
    ob_start();
    if (!isset($_COOKIE['isConnected'])) { ?>
        <div class="container container-accueil">
            <div class="connexion">
                <button id="connexion">Connexion</button>

                <div class="form-connexion">
                    <form action="#" method="post">
                        <div>
                            <label for="pseudoConnexion">Pseudo : </label>
                            <input type="text" name="pseudoConnexion" id="pseudoConnexion">
                        </div>
                        <div>
                            <label for="passConnexion">Mot de passe : </label>
                            <input type="password" name="passConnexion" id="passConnexion">
                        </div>
                        <div>
                            <button type="submit">Me connecter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="inscription">
                <button id="inscription">Inscription</button>

                <div class="form-inscription">
                    <form action="#" method="post">
                        <div>
                            <label for="pseudoInscription">Pseudo : </label>
                            <input type="text" name="pseudoInscription" id="pseudoInscription">
                        </div>
                        <div>
                            <label for="passInscription">Mot de passe : </label>
                            <input type="password" name="passInscription" id="passInscription">
                        </div>
                        <div>
                            <label for="passConfirmInscription">Confirmation mot de passe : </label>
                            <input type="password" name="passConfirmInscription" id="passConfirmInscription">
                        </div>
                        <div>
                            <button type="submit">M'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="others/js/connexion.js"></script>
        <script src="others/js/inscription.js"></script>

    <?php } else {
        header("Location: index.php?action=afficherChat");
    }
    $page = ob_get_clean();
    ?>