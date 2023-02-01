
<?php
require_once("bootstrap.php");
if (isset($_POST['username'])) {

    $response_data = $dbh->getUsersMatch($_POST["username"]);
    // Return the response data as a JSON object
    header('Content-Type: application/json');
    echo json_encode($response_data);
}


?>