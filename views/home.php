    <?php
    ob_start();
    if (!isset($_COOKIE['isConnected'])) { ?>
        <div class="container container-accueil">
            <div class="connexion">
                <button id="connexion" class=".bg-light">Connexion</button>

                <div class="form-connexion">
                    <form action="#" method="post">
                        <div class="form-floating mb-6">
                            <input type="text" class="form-control" name="pseudoConnexion" id="pseudoConnexion" placeholder="Pseudo">
                            <label for="pseudoConnexion">Pseudo</label>
                        </div>
                        <div class="form-floating mb-6">
                            <input type="password" class="form-control" name="passConnexion" id="passConnexion" placeholder="Mot de passe">
                            <label for="passConnexion">Mot de passe</label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark">Me connecter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="inscription">
                <button id="inscription" class=".bg-light">Inscription</button>

                <div class="form-inscription">
                    <form action="#" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="pseudoInscription" id="pseudoInscription" placeholder="Pseudo">
                            <label for="pseudoInscription">Pseudo</label>
                        </div>
                        <div class="row g-3">
                            <div class="col form-floating mb-3">
                                <input type="password" class="form-control" name="passInscription" id="passInscription" placeholder="Mot de passe">
                                <label for="passInscription">Mot de passe</label>
                            </div>
                            <div class="col form-floating mb-3">
                                <input type="password" class="form-control" name="passConfirmInscription" id="passConfirmInscription" placeholder="Confirmation mot de passe">
                                <label for="passConfirmInscription">Confirmation mot de passe</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark">M'inscrire</button>
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