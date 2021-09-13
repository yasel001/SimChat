<?php

function controleMsg()
{
    $jsonDecoder = json_decode($_POST['data'], true);

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

    global $db;
    $msgManager = new MessageManager($db);

    if ($msgManager->insertMessage($_SESSION["pseudo"], $msg)) {
        echo json_encode("OK");
        http_response_code(200);
    }
}


function recupMessages()
{
    global $db;
    $msgManager = new MessageManager($db);

    $listMessage = json_encode($msgManager->getMessages());
    echo $listMessage;
    http_response_code(200);
}
