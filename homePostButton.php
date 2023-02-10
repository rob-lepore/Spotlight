<?php
    require_once("bootstrap.php");
    $postsNumber = $dbh->getTotalPosts($_COOKIE["username"]);
    echo (count($postsNumber)>$_SESSION["postOffset"] ? "visible" : "hidden");
?>