<?php
require_once 'bootstrap.php';
if(isset($_POST['email'], $_POST['password'])) { 
    $email = $_POST['email'];
    $password = $_POST['password']; // Recupero la password criptata.
    if($dbh->login($email, $password) == true) {
        // Login eseguito
        $templateParams["title"] = "Spotlight - Home";
        require "template/esempioSpotifyAPI.php";
    } else {
        // Login fallito
        $templateParams["loginError"] = "LOGIN ERROR";
        $templateParams["title"] = "Spotlight - Login";
        require "template/loginPage.php";
    }
} else { 
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}
?>