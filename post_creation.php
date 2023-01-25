<?php
    require_once("bootstrap.php");
    sec_session_start(); 
    
    if(isUserLoggedIn()){

        $trackId = $_GET["id"];
        $dbh->createPost($_POST['post_text'], $trackId);

    }
    header("Location: ./");
    exit;
?>