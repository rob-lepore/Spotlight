<?php 

require_once("bootstrap.php");

if(isUserLoggedIn()){
    require("template/searchPage.php");
}

?>