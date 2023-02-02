<?php
    require_once "bootstrap.php";
    if(isUserLoggedIn()){
        $userLikedElement = $dbh->getLikedElementByUser($_GET["user"], $_GET["type"]);
        echo json_encode($userLikedElement);
    }
?>