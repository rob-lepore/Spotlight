<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["title"] = "Spotlight - Search";
    require("template/searchPage.php");
}

?>