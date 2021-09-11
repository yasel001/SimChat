<?php

require "models/DBManager.php";
require "models/MessageManager.php";

function controleMsg()
{
    $jsonDecoder = json_decode($_POST['data'], true);

    $pseudo = htmlspecialchars($jsonDecoder['pseudo']);
    if (empty($pseudo)) {
        echo "Le pseudo ne peut être vide";
        http_response_code(400);
        return;
    }
    if (strlen($pseudo) > 20) {
        echo "Pseudo max 20 caractères !";
        http_response_code(400);
        return;
    }

    $msg = htmlspecialchars($jsonDecoder['msg']);
    if (empty($msg)) {
        echo "Le message ne peut être vide";
        http_response_code(400);
        return;
    }
    if (strlen($msg) > 300) {
        echo "Pseudo max 300 caractères !";
        http_response_code(400);
        return;
    }

    $db = new DbManager("simchat");
    $msgManager = new MessageManager($db);

    if ($msgManager->insertMessage($pseudo, $msg)) {
        http_response_code(200);
    }
}


function recupMessages()
{
    $db = new DbManager("simchat");
    $msgManager = new MessageManager($db);

    $listMessage = json_encode($msgManager->getMessages());
    echo $listMessage;
    http_response_code(200);
}
