<?php
    require_once("bootstrap.php");
    
    if(isUserLoggedIn()){

       $text = $_POST["commentText"];
       $user = $_COOKIE["username"];
       $postId = $_GET["id"];
       print_r($_POST);
       if($_POST["userReply"] == ""){
        $posd = $dbh->getPostData($postId);
        $username = $posd[0]["username"];
        $us = $dbh->getUserData($username);
        $email = $us[0]["email"];
        sendEmailToCommentOnyourPost($email, $username, $postId);
        $dbh->createComment($postId, $user, $text);
       } else {
        $replyTo = $_POST["userReply"];
        $threadComment = $_POST["commentId"];
        echo $replyTo;
        $dbh->createReply($user, $text, $replyTo, $threadComment);
       }

    }
    header("Location: ./post.php?id=" . $postId);
    exit;
?>