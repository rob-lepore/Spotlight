<?php
require_once 'bootstrap.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura

if(isUserLoggedIn()){
    $templateParams["title"] = "Spotlight - Home";
    require "template/esempioSpotifyAPI.php";
}
else{
    $templateParams["title"] = "Spotlight - Sign-Up";
    require "template/signupForm.php";
}
?>