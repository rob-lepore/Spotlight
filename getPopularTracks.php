<?php
    require("auth.php");
  
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/playlists/37i9dQZEVXbMDoHDwVN2tF/tracks");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));

    $response = curl_exec($ch);
    $response_data = json_decode($response);

    // Return the response data as a JSON object
    header('Content-Type: application/json');
    echo json_encode($response_data);
    
?>