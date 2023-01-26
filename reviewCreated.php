<?php
require_once "bootstrap.php";
if(isUserLoggedIn()){
    if(isset($_POST["username"]) && isset($_POST["date"]) && isset($_POST["album"]) && isset($_POST["text"]) && isset($_POST["score"]) && isset($_POST["number_of_likes"]) && isset($_POST["number_of_dislikes"]) && $_POST["album"] != null && strlen($_POST["text"]) > 0){
        $dbh->createReview($_POST);
        echo json_encode("SUCCESS");
    }else{
        echo json_encode("FAILURE");
    }
}
else{
    echo json_encode("FAILURE");
}
    
?>