<?php 

require("bootstrap.php");

$dbh->createSpotifyElement("album", $_POST["albumId"]);
$res = $dbh->toggleSpotifyElementLike($_POST["albumId"]);

// Return the response data as a JSON object
header('Content-Type: application/json');
echo json_encode($res);
?>