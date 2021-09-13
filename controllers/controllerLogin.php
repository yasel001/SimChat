<?php

function connexion()
{
    $jsonDecoder = json_decode($_POST["data"], true);

    $pseudo = htmlspecialchars($jsonDecoder["pseudo"]);
    if (empty($pseudo)) {
        echo "Le pseudo ne peut être vide !";
        http_response_code(400);
        return;
    }

    $pass = $jsonDecoder["pass"];
    if (empty($pass)) {
        echo "Le mot de passe ne peut être vide !";
        http_response_code(400);
        return;
    }

    global $db;
    $loginManager = new LoginManager($db);
    $responseExist = $loginManager->pseudoExist($pseudo);

    if (!$responseExist['exist'] || strcmp($pass, $responseExist[0]["password"]) != 0) {
        echo "Login ou mot de passe incorrect";
        http_response_code(404);
        return;
    }

    $_SESSION["pseudo"] = $responseExist[0]["pseudo"];
    $_SESSION["id"] = $responseExist[0]["id"];
    setcookie("isConnected", true);

    echo json_encode("OK");
    http_response_code(200);
}


function inscription()
{
}
