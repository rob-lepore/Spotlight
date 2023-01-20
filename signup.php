<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])){
    $signup_result = $dbh->checkUser($_POST["username"], $_POST["email"]);
    if(count($signup_result)!=0){
        //Account non disponibile
        $templateParams["signupError"] = "Error! Username or email already used";
    }
    else{
        registerLoggedUser($_POST["username"], $_POST["email"]);
        $dbh->createUser($_POST["username"], $_POST["email"], $_POST["password"], $_POST["first_name"], $_POST["last_name"]);
    }
}

if(isUserLoggedIn()){
    $templateParams["title"] = "Spotlight - Home";
    require "template/esempioSpotifyAPI.php";
}
else{
    $templateParams["title"] = "Spotlight - Sign-Up";
    require "template/signupForm.php";
}
?>