<?php
    require_once("bootstrap.php");
    $postsNumber = $dbh->getTotalPosts($_COOKIE["username"]);
    echo (count($postsNumber)>$_SESSION["postOffset"] && count($postsNumber) != 0? "visible" : "hidden");
?>