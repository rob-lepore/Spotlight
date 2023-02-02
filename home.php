<?php 
    require_once("bootstrap.php");
    if(isUserLoggedIn()){

        $username = $_COOKIE["username"];

        $templateParams["username"] = $username;
        $templateParams["profilePic"] = $dbh->getUserData($username)[0]["profile_pic"];
        require("template/homePage.php");
    } else {
        header('Location: ./');
        exit;
    }
?>