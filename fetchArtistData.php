<?php
require("auth.php");

//some IDs to test:
// Pitbull 0TnOYISbd1XYRBk9myaseg
// Billie Eilish 6qqNVTkY8uBg9cP3Jd7DAH
// Childish Gambino 73sIBHcqh3Z3NyqHKZ7FOL
// Arctic Monkeys 7Ln80lUS6He07XvHI8qqHH

//get artist infos
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/".$_GET["artistId"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

$response = curl_exec($ch);
//echo $response;
$artist_data = json_decode($response);
echo json_encode($artist_data);
curl_close($ch);
?>