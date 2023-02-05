<?php
    require_once("bootstrap.php");
    if(isUserLoggedIn()){
        $notifications = $dbh->getAllNotificationsOfUser($_COOKIE["username"]);
        for($i=0;$i<count($notifications);$i++){
            $user = $dbh->getUserData($notifications[$i]["username_source"]);
            $data[$i]["source_username"] = $user[0]["username"];
            $data[$i]["source_profile_pic"] = $user[0]["profile_pic"];
            $data[$i]["id"] = $notifications[$i]["notification_id"];
            if(isset($notifications[$i]["review_id"])){
                $data[$i]["type"] = "Review";
                $like = $dbh->getIsLikedReview($notifications[$i]["review_id"], $user[0]["username"]);
                if(isset($like[0]["isLike"])){
                    $data[$i]["isLike"] = $like[0]["isLike"];
                }
                $data[$i]["review_id"] = $notifications[$i]["review_id"];
            }elseif(isset($notifications[$i]["mood_id"])){
                $data[$i]["type"] = "Mood";
                $data[$i]["mood_id"] = $notifications[$i]["mood_id"];
            }elseif(isset($notifications[$i]["post_id"])){
                $data[$i]["type"] = "Post";
                $data[$i]["post_id"] = $notifications[$i]["post_id"];
            }elseif(isset($notifications[$i]["friend_request_id"])){
                $data[$i]["type"] = "Friend_request";
            }else{
                $data[$i]["type"] = "Follow";
            }
        }
        require('template/notificationPage.php');
    }else{
        header('Location: ./');
        exit;
    }
?>