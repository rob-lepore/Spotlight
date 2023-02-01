<?php
    require_once "bootstrap.php";
    if(isUserLoggedIn()){
        $templateParams["username"] = $_COOKIE["username"];
        $templateParams["date"] = date("Y-m-d");
        require 'template/createReviewPage.php';
    }else{
        header('Location: ./');
    }
?>