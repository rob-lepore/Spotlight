<?php
require_once("bootstrap.php");
if (isset($_POST['username_owner']) && isset($_POST['username_search']) && isset($_POST["type"])) {

    $response_data = $dbh->getUsersMatchRelationship($_POST["username_owner"], $_POST["username_search"], $_POST['type']);
    // Return the response data as a JSON object
    header('Content-Type: application/json');
    echo json_encode($response_data);
}


?>