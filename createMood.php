<?php 

    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        $dbh->createMood($_COOKIE["username"], $_POST["song"], $_POST["emoji"], $_POST["gradient"]);
    }

?>