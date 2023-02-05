<?php 

    require_once("bootstrap.php");

    if($_COOKIE["theme"] == "light"){
        $cookie_value = "dark";
    }else{
        $cookie_value = "light";
    }
    
    setcookie("theme", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>