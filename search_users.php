<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["user"] = $_GET["user"];
    $templateParams["title"] = "Search Users";
    $templateParams["isfriend"] = $dbh->isFriend($_COOKIE["username"], $_GET["user"])[0]["COUNT(*)"] >= 1;
    require("template/searchUsersPage.php");
}else{
    header('Location: ./');
}

?>