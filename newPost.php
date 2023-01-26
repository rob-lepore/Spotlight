<?php 
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        $trackId = $_GET["id"];
        require("fetchTrackData.php");

        $templateParams["title"] = "Spotlight - New Post";
        $templateParams["trackName"] = $track->name;
        $templateParams["trackId"] = $trackId;
        $templateParams["artists"] = $track->artists;
        $templateParams["albumImage"] = $track->album->images[1]->url;
        require("template/writePost.php");
    } else {
        header('Location: ./');
        exit;
    }
?>