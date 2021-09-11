<?php

require "controllers/controllerChat.php";

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET["action"]) {
        case "listeMsg":
            recupMessages();
            break;

        default:
            http_response_code(404);
            break;
    }
} else if (isset($_POST['action']) && !empty($_POST['action'])) {
    switch ($_POST["action"]) {
        case "postMessage":
            controleMsg();
            break;

        default:
            http_response_code(404);
            break;
    }
} else {
    header('Location: views/chat.php');
}
