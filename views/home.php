<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../others/css/styles.css">
    <title>SimChat - Login</title>
</head>

<body>
    <?php if (!isset($_COOKIE['isConnected'])) { ?>
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
                            <input type="text" name="passConnexion" id="passConnexion">
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
                            <input type="text" name="passInscription" id="passInscription">
                        </div>
                        <div>
                            <label for="passConfirmInscription">Confirmation mot de passe : </label>
                            <input type="text" name="passConfirmInscription" id="passConfirmInscription">
                        </div>
                        <div>
                            <button type="submit">M'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../others/js/ajax.js"></script>
        <script src="../others/js/connexion.js"></script>
        <script src="../others/js/inscription.js"></script>

    <?php } else {
        header("Location: chat.php");
    } ?>
</body>

</html>