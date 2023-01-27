<?php 
    require_once("bootstrap.php");

    if(isUserLoggedIn()){
        if(isset($_GET["id"])){
            $trackId = $_GET["id"];
            require("fetchTrackData.php");

            $templateParams["trackName"] = $track->name;
            $templateParams["trackId"] = $trackId;
            $templateParams["artists"] = $track->artists;
            $templateParams["albumImage"] = $track->album->images[1]->url;
        }
        $templateParams["title"] = "Spotlight - New Post";
        require("template/writePost.php");
    } else {
        header('Location: ./');
        exit;
    }
?>