<?php
require_once 'bootstrap.php';
sec_session_start();
if(isUserLoggedIn()){
    if($_GET["type"] == 0){
        $dbh->followUser($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 1){
        $dbh->unfollowUser($_COOKIE["username"], $_GET["user"]);
    }else if($_GET["type"] == 2){
        //$dbh->
    }else if($_GET["type"] == 3){
        $dbh->eliminateFriend($_COOKIE["username"], $_GET["user"]);
    }
    header("Location: /Spotlight/getUsersInfo.php?user=".$_GET["user"]);
}
else{
    header("Location: ./");
}
?>