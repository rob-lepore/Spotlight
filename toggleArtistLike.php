<?php 

require("bootstrap.php");

$dbh->createSpotifyElement("artist", $_POST["artistId"]);
$res = $dbh->toggleSpotifyElementLike($_POST["artistId"]);

// Return the response data as a JSON object
header('Content-Type: application/json');
echo json_encode($res);
?>