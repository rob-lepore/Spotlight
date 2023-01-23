<?php

require_once 'bootstrap.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
$id = $_GET["id"];

if(isUserLoggedIn()){
    $templateParams["title"] = "Spotlight - Home";
    require "template/esempioSpotifyAPI.php";
}
else{
    $templateParams["title"] = "Spotlight - Sign-Up";
    if($id == 0){
        $templateParams["signupError"] = "Error! Username or email already used";
    }
    if($id == 2){
        $templateParams["loginError"] = "Ops! An error occured";
    }

    require "template/signUpForm.php";
}
?>