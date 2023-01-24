<?php 
    require_once("bootstrap.php");
    sec_session_start(); 
    
    if(isUserLoggedIn()){

        $artistId = $_GET["id"];
        require("fetchArtistInfo.php");

        $likes = $dbh->getArtistLikes($artistId);
        $likes = array_map("mapToUsernames", $likes);

        $templateParams["artistId"] = $artistId;
        $templateParams["title"] = "Spotlight - $artist_data->name";
        $templateParams["artistName"] = $artist_data->name;
        $templateParams["artistImage"] = $artist_data->images[2]->url;
        $templateParams["followers"] = $artist_data->followers->total;
        $templateParams["likes"] = count($likes);
        $templateParams["isLiked"] = in_array($_COOKIE["username"], $likes);
        $templateParams["summary"] = $summary;
        $templateParams["topSongs"] = $top_songs;
        $templateParams["albums"] = $albums;
        $templateParams["tracks"] = $tracks;
        $templateParams["newPostUrl"] = "#";
        $templateParams["albumBaseUrl"] = "./album.php?id=";
        require("template/artistPage.php");
    } else {
        header("Location: ./");
        exit;
    }
?>