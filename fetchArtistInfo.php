<?php
require("auth.php");

//some IDs to test:
// Pitbull 0TnOYISbd1XYRBk9myaseg
// Billie Eilish 6qqNVTkY8uBg9cP3Jd7DAH
// Childish Gambino 73sIBHcqh3Z3NyqHKZ7FOL
// Arctic Monkeys 7Ln80lUS6He07XvHI8qqHH

//get artist infos
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$artistId");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

$response = curl_exec($ch);
$artist_data = json_decode($response);
curl_close($ch);

//get artist top tracks
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$artistId/top-tracks?market=US");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

$response = curl_exec($ch);
$top_songs_data = json_decode($response);
$top_songs = $top_songs_data->tracks;
curl_close($ch);

//get artist's albums
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$artistId/albums?market=US");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

$response = curl_exec($ch);
$albums_data = json_decode($response);
$albums = $albums_data->items;
curl_close($ch);

//get tracks for each album
$ch = curl_init();

$tracks = [];
foreach ($albums as $album) {
  curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$album->id/tracks");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));
  $response = curl_exec($ch);
  $tracks_data = json_decode($response);
  $tracks_data->items["albumName"] = $album->name;
  $tracks_data->items["albumImg"] = $album->images[1]->url;
  $tracks[] = $tracks_data->items;
  curl_close($ch);
}

//get summary from wikipedia
$ch = curl_init();
$urlname = urlencode($artist_data->name);
$wikiurl = "https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&exintro=&titles=$urlname&formatversion=2&explaintext=&exsentences=3&exlimit=1";
curl_setopt($ch, CURLOPT_URL, $wikiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$data = json_decode($response);
$summary = $data->query->pages[0]->extract;
if (strlen($summary) == 0) {
  $summary = "No description available for this artist :(";
}

curl_close($ch);
