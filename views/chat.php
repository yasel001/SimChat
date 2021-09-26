    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../others/css/styles.css">
        <title>SimChat - Chat</title>
    </head>

    <body>
        <?php if (isset($_COOKIE['isConnected'])) { ?>

            <div class="container" id="container">

            </div>

            <div id="container-btn">
                <form action="#" method="post" id="form">
                    <div id="div-textarea">
                        <label for="msg">Mon message : </label><br>
                        <textarea name="msg" id="msg" cols="35" rows="15" maxlength="300" placeholder="Veuillez écrire votre message"></textarea>
                        <button type="submit" id="btn">Envoyer</button>
                    </div>
                </form>
            </div>

            <script src="../others/js/ajax.js"></script>
            <script src="../others/js/getMessage.js"></script>
            <script src="../others/js/sendMessage.js"></script>
        <?php } else {
            header("Location: home.php");
        }
        ?>
    </body>

    </html>