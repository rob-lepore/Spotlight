<?php 
    require_once("bootstrap.php");
    sec_session_start();

    if(isUserLoggedIn()){
        $trackId = $_GET["id"];
        require("fetchTrackData.php");

        $templateParams["title"] = "Spotlight - New Post";
        $templateParams["trackame"] = $track->name;
        $templateParams["artists"] = $track->artists;
        $templateParams["albumImage"] = $track->album->images[1]->url;
        require("template/writePost.php");
    } else {
        header('Location: ./');
        exit;
    }
?>