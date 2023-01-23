<?php
require_once "bootstrap.php";

    $_username = $_GET["user"];

    $user = $dbh->getUserData($_username);
    $templateParams["username"] = $user[0]["username"];
    $templateParams["firstname"] = $user[0]["fisrt_name"];
    $templateParams["lastname"] = $user[0]["last_name"];
    $templateParams["profilePicPath"] = $user[0]["profile_pic"];
    $templateParams["FriendsCount"] = $dbh->getFriendsCount($_username)[0]["COUNT(*)"];
    $templateParams["FollowerCount"] = $dbh->getFollowerCount($_username)[0]["COUNT(*)"];
    $templateParams["FollowingCount"] = $dbh->getFollowingCount($_username)[0]["COUNT(*)"];
    $templateParams["Posts"] = "prova";
    #$templateParams["Reviews"] = $dbh->getFriendsCount($_username);
    #$templateParams["AlbumsLiked"] = $dbh->getFriendsCount($_username);
    #$templateParams["ArtistsLiked"] = $dbh->getFriendsCount($_username);

    require "template/userPage.php";
?>