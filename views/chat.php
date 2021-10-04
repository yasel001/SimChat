<?php
ob_start();
if (isset($_COOKIE['isConnected'])) { ?>

    <div>
        <div class="tools espace-bas-blanc">
            <?= $_SESSION["pseudo"]; ?>
            <button id="btnDeconnect" class="btn btn-danger">Se deconnecter</button>
        </div>

        <br><br>

        <div class="container" id="container">

        </div>
    </div>

    <div id="container-btn">
        <form action="#" method="post" id="form">
            <div class="form-floating mb-3">
                <textarea class="form-control" name="msg" id="msg" style="height: 250px" maxlength="300" placeholder="Mon message"></textarea>
                <label for="msg">Mon message</label>
                <button type="submit" id="btn" class="btn btn-success">Envoyer</button>
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