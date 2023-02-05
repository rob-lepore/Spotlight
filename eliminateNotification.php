<?php
    require_once("bootstrap.php");
    if(isUserLoggedIn() && isset($_POST["id"])){
        $dbh->eliminateNotification($_POST["id"]);
    }
?>