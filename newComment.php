<?php
    require_once("bootstrap.php");
    
    if(isUserLoggedIn()){

       $text = $_POST["commentText"];
       $user = $_COOKIE["username"];
       $postId = $_GET["id"];
       print_r($_POST);
       if($_POST["userReply"] == ""){
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