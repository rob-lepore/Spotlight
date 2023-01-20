<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])){
    $signup_result = $dbh->checkUser($_POST["username"], $_POST["email"]);
    if(count($signup_result)!=0){
        //Account non disponibile
        $templateParams["signupError"] = "Error! Username or email already used";
    }
    else{
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["propic"]);
        if($result != 0){
            $propic = $msg;
            $dbh->createUser($_POST["username"], $_POST["email"], $_POST["password"], $_POST["first_name"], $_POST["last_name"], $propic);
            registerLoggedUser($_POST["username"], $_POST["email"]);
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg .= "Errore in inserimento!";
        }
        
    }
    header("location: login.php?formmsg=".$msg);
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