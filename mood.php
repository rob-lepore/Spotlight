<?php 

    require_once("bootstrap.php");
    

    if(isUserLoggedIn()) {
        if(isset($_GET["id"])){
            $trackId = $_GET["id"];
            require("fetchTrackData.php");
            $templateParams["track"] = $track;
        }

        require("template/newMoodPage.php");

    }

?>