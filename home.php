<?php 
    require_once("bootstrap.php");
    if(isUserLoggedIn()){

        $username = $_COOKIE["username"];

        $templateParams["title"] = "Spotlight - Home";
        $templateParams["username"] = $username;
        $templateParams["profilePic"] = $dbh->getUserData($username)[0]["profile_pic"];
        $templateParams["followersReviews"] = $dbh->getFollowersReviews($username);
        require("template/homePage.php");
    } else {
        header('Location: ./');
        exit;
    }
?>