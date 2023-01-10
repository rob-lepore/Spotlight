<?php 
require("auth.php");
// Now that we have an access token, we can make requests to the Spotify API.

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/tracks/$trackId");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

$response = curl_exec($ch);
$track = json_decode($response);
curl_close($ch);

?>