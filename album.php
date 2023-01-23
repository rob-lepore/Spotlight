<?php 
require_once("bootstrap.php");
sec_session_start();
if(isUserLoggedIn()){
    //6tkjU4Umpo79wwkgPMV3nZ
    //19bQiwEKhXUBJWY6oV3KZk

    $albumId = $_GET["id"];
    require("fetchAlbumInfo.php");

    $templateParams["title"] = "Spotlight - $album_data->name";
    $templateParams["albumName"] = $album_data->name;
    $templateParams["albumUrl"] = $album_data->external_urls->spotify;
    $templateParams["artists"] = $album_data->artists;
    $templateParams["releaseDate"] = $album_data->release_date;
    $templateParams["albumImage"] = $album_data->images[1]->url;
    $templateParams["likes"] = count($dbh->getAlbumLikes($albumId));
    $templateParams["tracks"] = $tracks;
    $templateParams["newReviewUrl"] = "#";
    $templateParams["newPostUrl"] = "#";
    
    require("template/albumPage.php");
} else {
    header('Location: ./');
}
?>