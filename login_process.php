<?php
require_once 'bootstrap.php';
if(isset($_POST['email'], $_POST['p'])) { 
    $email = $_POST['email'];
    $password = $_POST['p']; // Recupero la password criptata.
    $checkLogin = $dbh->login($email, $password);
    if($checkLogin == 1) {
        // Login eseguito
        $templateParams["title"] = "Spotlight - Home";
        header('Location: ./album.php?id=6tkjU4Umpo79wwkgPMV3nZ');
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