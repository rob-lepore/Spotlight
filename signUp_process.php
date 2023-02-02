<?php
require_once 'bootstrap.php';

if(isset($_POST["username"], $_POST["email"], $_POST["p"], $_POST["first_name"], $_POST["last_name"])){
    $signup_result = $dbh->checkUser($_POST["username"], $_POST["email"]);
    if(count($signup_result)!=0){
        //Account non disponibile
        header("Location: ./signup.php?id=0");
    }
    else{
        // Recupero la password criptata dal form di inserimento.
        $password = $_POST['p'];
        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$random_salt);
        if(!($_FILES["propic"]["name"] === "")){
            $propic = $_FILES["propic"];
            list($result, $msg) = uploadImage(UPLOAD_DIR, $propic);
            if($result != 0){
                $propic = $msg;
                $dbh->createFullUser($_POST["username"], $_POST["email"], $password, $random_salt, $_POST["first_name"], $_POST["last_name"], $propic);
                registerLoggedUser($_POST["username"], $_POST["email"]);
                $msg = "Inserimento completato correttamente!";
                sendEmailToNewAccount($_POST["email"], $_POST["username"]);
                header('Location: ./signup.php?id=1');
                exit;
            }
            else{
                $msg .= "Ops! An error occured";
                header("Location: ./template/signup.php?id=2");
            }
        } else{
            $dbh->createUser($_POST["username"], $_POST["email"], $password, $random_salt, $_POST["first_name"], $_POST["last_name"]);
            registerLoggedUser($_POST["username"], $_POST["email"]);
            $msg = "Inserimento completato correttamente!";
            sendEmailToNewAccount($_POST["email"], $_POST["username"]);
            header('Location: ./signup.php?id=1');
            exit;
        }
    }
}
?>