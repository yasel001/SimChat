<?php

session_start();

require "models/manager.php";
$db = new DbManager("simchat");

require "controllerChat.php";
require "controllerLogin.php";

function afficherHome()
{
    require "views/home.php";
    $title = "SimChat - Login";
    require "./base.php";
}


function afficherChat()
{
    require "views/chat.php";
    $title = "SimChat - Chat";
    require "./base.php";
}
