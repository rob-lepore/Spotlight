<?php 
    require_once("bootstrap.php");
    if(isUserLoggedIn()){
        $username = $_COOKIE["username"];
        $templateParams["friendsPosts"] = $dbh->getFriendsPosts($username, $_SESSION["offset"]);
        $_SESSION["offset"]  = $_SESSION["offset"]  + 5;
        foreach($templateParams["friendsPosts"] as $post){
            $trackId = $post['song'];
            require("fetchTrackData.php");
            $postData['track'] = $track;
            $likes = $dbh->getPostLikes($post["post_id"]);
            $postData['likes'] = $likes;
            $postData['date'] = $post['date'];
            $postData['id'] = $post["post_id"];
            $postData['text'] = $post["text"];
            $postData['username'] = $post["username"];
            $postData["friendship"] = $dbh->isFriend($postData['username'], $_COOKIE["username"])[0]["COUNT(*)"] >= 1;
            $postData["profilePic"] = $dbh->getUserData($postData['username'])[0]["profile_pic"];
            $likes = array_map("mapToUsernames", $likes);
            $postData['isLiked'] = (in_array($_COOKIE["username"],array_values($likes)));
            require('template/postElement.php');
        }
    } else {
        header('Location: ./');
        exit;
    }
?>