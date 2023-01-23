<?php
require_once 'bootstrap.php';
if(isset($_POST['email'], $_POST['p'])) { 
    $email = $_POST['email'];
    $password = $_POST['p']; // Recupero la password criptata.
    $checkLogin = $dbh->login($email, $password);
    if($checkLogin == 1) {
        // Login eseguito
        header('Location: ./login.php?id=1');
        exit;
    } else if($checkLogin == 0) {
        // Brute Force
        header("Location: ./login.php?id=0");
    } else if($checkLogin == 2) {
        // Login fallito
        header("Location: ./login.php?id=2");
    }
} else { 
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}
?>