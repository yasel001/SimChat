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

    if (!$responseExist['exist'] || !password_verify($pass, $responseExist[0]["password"])) {
        echo "Login ou mot de passe incorrect";
        http_response_code(400);
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
    $jsonDecoder = json_decode($_POST["data"], true);

    $pseudo = htmlspecialchars($jsonDecoder["pseudo"]);
    if (empty($pseudo)) {
        echo "Le pseudo ne peut être vide !";
        http_response_code(400);
        return;
    }

    $password = htmlspecialchars($jsonDecoder["password"]);
    if (empty($password)) {
        echo "Le mot de passe ne peut être vide !";
        http_response_code(400);
        return;
    }

    $confirmPassword = htmlspecialchars($jsonDecoder["passwordConfirm"]);
    if (empty($confirmPassword)) {
        echo "La confirmation de mot de passe ne peut être vide !";
        http_response_code(400);
        return;
    }

    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas";
        http_response_code(400);
        return;
    }

    global $db;
    $loginManager = new LoginManager($db);
    $responseExist = $loginManager->pseudoExist($pseudo);

    if ($responseExist["exist"]) {
        echo "Le pseudo $pseudo est déja utilisé";
        http_response_code(400);
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    if ($loginManager->inscrire($pseudo, $password)) {
        http_response_code(200);
    }
}
