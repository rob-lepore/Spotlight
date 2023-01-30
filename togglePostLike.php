<?php 

require("bootstrap.php");

$res = $dbh->togglePostLike($_POST["postId"]);

// Return the response data as a JSON object
header('Content-Type: application/json');
echo json_encode($res);
?>