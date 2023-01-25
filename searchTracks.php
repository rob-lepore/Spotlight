<?php
    require("auth.php");
    // Now that we have an access token, we can make requests to the Spotify API.
    if (isset($_POST['query'])) {
        // Search for tracks containing the query text
        $query = $_POST['query'];
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=$query&type=track");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));
    
        $response = curl_exec($ch);
        $response_data = json_decode($response);

        // Return the response data as a JSON object
        header('Content-Type: application/json');
        echo json_encode($response_data);
    }
?>