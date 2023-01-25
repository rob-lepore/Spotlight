<?php
    require_once("bootstrap.php");
    
    if(isUserLoggedIn()){

        $trackId = $_GET["id"];
        $dbh->createPost($_POST['post_text'], $trackId);

    }
    header("Location: ./");
    exit;
?>