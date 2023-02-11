<?php
    require_once("bootstrap.php");
    $reviewsNumber = $dbh->getTotalReviews($_COOKIE["username"]);
    echo (count($reviewsNumber)>$_SESSION["reviewOffset"] && count($reviewsNumber) != 0? "visible" : "hidden");
?>