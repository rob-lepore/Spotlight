<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){
    if($_GET["type"] == 0){
        $us = $dbh->getUserData($_GET["user"]);
        $email = $us[0]["email"];
        sendEmailToFollowing($email, $_COOKIE["username"], $_GET["user"]);
        $dbh->followUser($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 1){
        $dbh->unfollowUser($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 2){
        $dbh->sendFriendRequest($_COOKIE["username"], $_GET["user"]);
        $us = $dbh->getUserData($_GET["user"]);
        $email = $us[0]["email"];
        sendEmailToFriendRequestReceived($email, $_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 3){
        $dbh->eliminateFriendRequest($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 4){
        $dbh->eliminateFriend($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 5){
        $dbh->acceptFriendRequest($_COOKIE["username"], $_GET["user"]);
    }
    //header("Location: /Spotlight/profile.php?user=".$_GET["user"]);
}
else{
    header("Location: ./");
}
?>