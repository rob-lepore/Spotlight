<?php

require_once("sendEmail.php");

function isUserLoggedIn(){
    return isset($_COOKIE["username"]);
}

function registerLoggedUser($username){
    $cookie_value = $username;
    setcookie("username", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

function setTheme(){
    if (!isset($_COOKIE["theme"])){
        $cookie_value = "light";
        setcookie("theme", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}

function changeTheme(){
    if($_COOKIE["username"] == "light"){
        $cookie_value = "dark";
    }else{
        $cookie_value = "light";
    }
    setcookie("theme", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function sec_session_start() {
    $session_name = 'sec_session_id'; // Imposta un nome di sessione
    $secure = true; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
    $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
    ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
    $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
    session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
    session_start(); // Avvia la sessione php.
    session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}

function mapToUsernames($el) {
    return $el["username"];
}

function sendEmailToNewAccount($email, $username){
    $body = "Hi " . $username . ", your account has been succesfully created.<br>The Spotlight Team";
    $emailData = array(
        "toEmail" => $email,
        "toName" => $username,
        "subject" => "Welcome to Spotlight",
        "body" => wordwrap($body,70)
        );
    sendEmail($emailData);
}
?>