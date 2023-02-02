<?php
    require_once 'bootstrap.php';
    if(isUserLoggedIn()){
        $is_liked = -1;
        if(isset($templateParams["review_id"]) && isset($_COOKIE["username"])){
            $value = $dbh->getIsLikedReview($templateParams["review_id"], $_COOKIE["username"]);
            if(isset($value[0]["isLike"])){
                $is_liked = $value[0]["isLike"];
            }
        }
    }else{
        header('Location: ./');
        exit;
    }
?>