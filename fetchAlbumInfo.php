<?php
    require("auth.php");

    //get album infos
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $album_data = json_decode($response);
    curl_close($ch);

    //get tracks
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId/tracks");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $tracks = json_decode($response);
    curl_close($ch);

    //get tracks
    $ch = curl_init();
    $tracks = [];

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId/tracks");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $tracks_data = json_decode($response);
    $tracks_data->items["albumName"] = $album_data->name;
    $tracks_data->items["albumImg"] = $album_data->images[1]->url;
    $tracks[] = $tracks_data->items;
    curl_close($ch);

?>