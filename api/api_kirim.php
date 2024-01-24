<?php
require 'api_ip.php';
$ch = curl_init();

$url = $link.'api/Data-Keluarga/Store';

// Check if 'nik' is set and not empty before casting to int
$nik = isset($_POST['nik']) ? (int) $_POST['nik'] : 0;

$data = array(
    'nik' => $nik,
    'nama' => $_POST['nama'],
    'jenis_kelamin' => $_POST['jk'],
    'tempat_lahir' => $_POST['tmptlahir'],
    'tanggal_lahir' => isset($_POST['tgllahir']) ? date('Y-m-d', strtotime($_POST['tgllahir'])) : '0000-00-00',
    'pendidikan' => $_POST['pendidikan'],
    'pekerjaan' => $_POST['pekerjaan'],
    'hubungan' => $_POST['status'],
);

// Set the content type to JSON
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Set this option to get the response as a string

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(array('error' => 'Curl error: ' . curl_error($ch)));
} else {
    // Process the response
    echo $response;
}

curl_close($ch);
?>