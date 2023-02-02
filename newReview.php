<?php
    require_once("bootstrap.php");
if(isUserLoggedIn()){
    if(isset($_GET["id"])){
        $albumId = $_GET["id"];
        require('fetchAlbumInfo.php');
        $data["image"] = $album_data->images[0]->url;
        $data["name"] = $album_data->name;
        $data["artists"] = $album_data->artists;
    }
    $templateParams["username"] = $_COOKIE["username"];
    $templateParams["date"] = date("Y-m-d");
    require("template/createReviewPage.php");
    //echo json_encode($data);
}else{
    header('Location: ./');
}

?>