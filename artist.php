<?php 
    require_once("bootstrap.php");

    $artistId = $_GET["id"];
    $infos = require("fetchArtistInfo.php");

    $templateParams["title"] = "Spotlight - $artist_data->name";
    $templateParams["artistName"] = $artist_data->name;
    $templateParams["artistImage"] = $artist_data->images[2]->url;
    $templateParams["followers"] = $artist_data->followers->total;
    $templateParams["likes"] = 0;
    $templateParams["summary"] = $summary;
    $templateParams["topSongs"] = $top_songs;
    $templateParams["albums"] = $albums;
    $templateParams["tracks"] = $tracks;
    
    
    
    require("template/artistPage.php");
?>