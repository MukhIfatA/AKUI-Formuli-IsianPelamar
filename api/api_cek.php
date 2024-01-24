<?php
$nik = $_GET['nik'];
//$jabatan_id = $_GET['jabatan_id'];

// Validate or sanitize input as needed

// Build the URL with query parameters
require 'api_ip.php';
// $ch = curl_init();

$url = $link.'api/Pelamar?nik=' . urlencode($nik);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
// Correct option for specifying GET method
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute cURL session
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the response

$data = json_decode($response);
echo $response;
?>