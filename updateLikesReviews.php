<?php
//username_session is the actual viewver of the page, the username is the creator of the review
    require_once 'bootstrap.php';
    if(isUserLoggedIn() && isset($_POST["review_id"]) && isset($_POST["username"]) && isset($_POST["rating"]) && isset($_POST["username_session"])){
        $dbh->addOrUpdateLikeReview($_POST["review_id"], $_POST["username_session"], $_POST["rating"], $_POST["username_session"]);

        $res = $dbh->getLikesAndDislikesOfReview($_POST["review_id"], $_POST["username"]);

        echo json_encode($res);
    }else{
        echo json_encode("error");
    }
?>