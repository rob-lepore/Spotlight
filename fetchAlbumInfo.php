<?php
    require("auth.php");

    //get album infos
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $album_data = json_decode($response, true);
    curl_close($ch);

    //get tracks
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId/tracks?limit=50");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $tracks = json_decode($response);
    curl_close($ch);

?>