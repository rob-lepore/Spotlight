<?php

// First, we need to obtain an access token from the Spotify API.
// You will need to sign up for a developer account and obtain your own client ID and client secret.

$client_id = '1686c8ca314849bd84b928a8e44ba0b1';
$client_secret = '8c721bdda6474bba919c9b286016620b';

// Make a request to the token endpoint to obtain an access token
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, "$client_id:$client_secret");

$response = curl_exec($ch);

/* oppure

$response = http_post_data('https://accounts.spotify.com/api/token', "grant_type=client_credentials", [
  'headers' => [
    'Authorization: Basic ' . base64_encode("$client_id:$client_secret"),
  ],
]);

*/

$response_data = json_decode($response);
$access_token = $response_data->access_token;

?>