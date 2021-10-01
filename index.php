<?php

require "controllers/controller.php";

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET["action"]) {
        case 'afficherChat':
            afficherChat();
            break;

        case "listeMsg":
            if ($_COOKIE['isConnected']) {
                recupMessages();
            }
            break;

        default:
            http_response_code(404);
            break;
    }
} else if (isset($_POST['action']) && !empty($_POST['action'])) {
    switch ($_POST["action"]) {
        case "postMessage":
            if ($_COOKIE['isConnected']) {
                controleMsg();
            }
            break;

        case "connexion":
            connexion();
            break;

        case "inscription":
            inscription();
            break;

        case "deconnexion":
            deconnexion();
            break;

        default:
            echo "Page introuvable";
            http_response_code(404);
            break;
    }
} else {
    afficherHome();
}
