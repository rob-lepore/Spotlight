<?php
    require_once("bootstrap.php");

    if(isUserLoggedIn() && isset($_GET["id"]) && isset($_GET["emo"])) {
        $trackId = $_GET["id"];
        $emotions = array(
            "emo0" => "😂",
            "emo1" => "😍",
            "emo2" => "😄",
            "emo3" => "🥲",
            "emo4" => "😭",
            "emo5" => "😤",
            "emo6" => "😵‍💫",
            "emo7" => "🤬",
            "emo8" => "🤡",
            "emo9" => "🤠",
        );
        $emo =$emotions[$_GET["emo"]];
        require("fetchTrackData.php");
        require("template/moodPreviewPage.php");
    }

?>