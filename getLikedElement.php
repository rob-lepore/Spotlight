<?php
    require_once "bootstrap.php";
    if(isUserLoggedIn()){
        $res = $dbh->isLikedSpotifyElement($_GET["elementId"], $_COOKIE["username"]);
        $is_liked_element = isset($res[0]["element_link"]);
        echo json_encode($is_liked_element);
    }
?>