<?php
    require_once("bootstrap.php");
    if(isUserLoggedIn()){
        $res = $dbh->getAllNotificationsOfUser($_COOKIE["username"]);
        echo json_encode(count($res));
    }
?>