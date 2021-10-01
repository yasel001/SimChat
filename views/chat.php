<?php
ob_start();
if (isset($_COOKIE['isConnected'])) { ?>

    <div>
        <div class="tools espace-bas-blanc">
            <?= $_SESSION["pseudo"]; ?>
            <button id="btnDeconnect">Se deconnecter</button>
        </div>

        <br><br>

        <div class="container" id="container">

        </div>
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

    <script src="others/js/getMessage.js"></script>
    <script src="others/js/sendMessage.js"></script>
    <script src="others/js/deconnect.js"></script>
<?php } else {
    header("Location: index.php");
}
$page = ob_get_clean();
?>