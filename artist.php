<?php 
    require_once("bootstrap.php");

    $artistId = $_GET["id"];
    $infos = require("fetchArtistInfo.php");

    $templateParams["title"] = "Spotlight - $artist_data->name";
    $templateParams["artistName"] = $artist_data->name;
    $templateParams["artistImage"] = $artist_data->images[2]->url;
    $templateParams["followers"] = $artist_data->followers->total;
    $templateParams["likes"] = count($dbh->getArtistLikes($artistId));
    $templateParams["summary"] = $summary;
    $templateParams["topSongs"] = $top_songs;
    $templateParams["albums"] = $albums;
    $templateParams["tracks"] = $tracks;
    $templateParams["newPostUrl"] = "#";
    $templateParams["albumBaseUrl"] = "#";
    
    
    
    require("template/artistPage.php");
?>