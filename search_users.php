<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["user"] = $_GET["user"];
    require("template/searchUsersPage.php");
}

?>