<?php 
    require_once("bootstrap.php");
    if(isUserLoggedIn()){
        $username = $_COOKIE["username"];
        $_SESSION["postOffset"]  = $_SESSION["postOffset"]  + 5;
        foreach($moods as $mood){
            $trackId = $mood['song'];
            require("fetchTrackData.php");
            $moodData["track"] = $track;
            $moodData["username"] = $mood["username"];
            $moodData["emo"] = $mood["emoji"];
            $moodData["gradient"] = $mood["gradient"];
            require('template/moodElement.php');
        }
    } else {
        header('Location: ./');
        exit;
    }
?>