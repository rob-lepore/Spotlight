<?php
require_once 'bootstrap.php';

sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
$id = $_GET["id"];

if(isUserLoggedIn()){
    $templateParams["title"] = "Spotlight - Home";
    require "template/esempioSpotifyAPI.php";
}
else{
    $templateParams["title"] = "Spotlight - Login";
    if($id == 0){
        $templateParams["loginTries"] = "WARNING! Too many tries. Access to this account is temporarily unavailable";
    }
    if($id == 2){
        $templateParams["loginError"] = "Error! Invalid email or password";
    }

    require "template/loginPage.php";
}
?>