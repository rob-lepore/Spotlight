<?php
require_once 'bootstrap.php';
if(isset($_POST['email'], $_POST['password'])) { 
    $email = $_POST['email'];
    $password = $_POST['password']; // Recupero la password criptata.
    $checkLogin = $dbh->login($email, $password);
    if($checkLogin == 1) {
        // Login eseguito
        $templateParams["title"] = "Spotlight - Home";
        require "template/esempioSpotifyAPI.php";
    } else if($checkLogin == 0) {
        // Brute Force
        $templateParams["loginTries"] = "WARNING! Too many tries. Access to this account is temporarily unavailable";
        $templateParams["title"] = "Spotlight - Login";
        require "template/loginPage.php";
    } else if($checkLogin == 2) {
        // Login fallito
        $templateParams["title"] = "Spotlight - Login";
        $templateParams["loginError"] = "Error! Invalid email or password";
        require "template/loginPage.php";
    }
} else { 
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}
?>