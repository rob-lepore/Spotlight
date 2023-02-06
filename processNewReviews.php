<?php 
    require_once("bootstrap.php");
    if(isUserLoggedIn()){
        $username = $_COOKIE["username"];
        $templateParams["followersReviews"] = $dbh->getFollowersReviews($username, $_SESSION["offset"]);
        $_SESSION["offset"]  = $_SESSION["offset"]  + 5;
        foreach($templateParams["followersReviews"] as $review){
            $templateParams['text'] = $review['text'];
            $templateParams['number_of_likes'] = $review['number_of_likes'];
            $templateParams['number_of_dislikes'] = $review['number_of_dislikes'];
            $templateParams['date'] = $review['date'];
            $templateParams['score'] = $review["score"];
            $templateParams['id'] = $review["album"];
            $templateParams['username'] = $review["username"];
            $templateParams["is_follower"] = $dbh->isFollower($templateParams['username'], $_COOKIE["username"])[0]["COUNT(*)"] >= 1;
            $templateParams["max-chars"] = 150;
            $templateParams["review_id"] = $review["review_id"];
            $templateParams["profilePicPath"] = $dbh->getUserData($templateParams['username'])[0]["profile_pic"];
            require('template/reviewPage.php');
        }
    } else {
        header('Location: ./');
        exit;
    }
?>