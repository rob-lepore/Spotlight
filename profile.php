<?php
require_once "bootstrap.php";
if(isUserLoggedIn()){

    $_username = $_GET["user"];

    $user = $dbh->getUserData($_username);
    $templateParams["title"] = "Profile: " . $user[0]["username"];
    $templateParams["username"] = $user[0]["username"];
    $templateParams["firstname"] = $user[0]["first_name"];
    $templateParams["lastname"] = $user[0]["last_name"];
    $templateParams["profilePicPath"] = $user[0]["profile_pic"];
    $templateParams["FriendsCount"] = $dbh->getFriendsCount($_username)[0]["COUNT(*)"];
    $templateParams["FollowerCount"] = $dbh->getFollowerCount($_username)[0]["COUNT(*)"];
    $templateParams["FollowingCount"] = $dbh->getFollowingCount($_username)[0]["COUNT(*)"];
    $templateParams["Posts"] = "prova";
    $templateParams["is_friend"] = $dbh->isFriend($user[0]["username"], $_COOKIE["username"])[0]["COUNT(*)"] >= 1;
    $templateParams["sent_request"] = $dbh->sentFriendRequest($_COOKIE["username"], $_GET["user"])[0]["requests"] >= 1;
    $templateParams["received_request"] = $dbh->receivedFriendRequest($_COOKIE["username"], $_GET["user"])[0]["requests"] >=1;
    $templateParams["is_follower"] = $dbh->isFollower($user[0]["username"], $_COOKIE["username"])[0]["COUNT(*)"] >= 1;
    $userPosts = $dbh->getPostsOfUser($user[0]["username"]);
    $userReviews = $dbh->getReviewsOfUser($user[0]["username"]);
    $userLastMood = $dbh->getLastMood($user[0]["username"]);

    require "template/userPage.php";
}else{
    header('Location: ./');
}
?>