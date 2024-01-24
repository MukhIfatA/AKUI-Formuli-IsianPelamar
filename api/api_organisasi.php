<?php
require 'api_ip.php';
$ch = curl_init();

$url = $link.'api/Pengalaman-Organisasi/Store';

// Check if 'nik' is set and not empty before casting to int
//$nik = isset($_POST['nik']) ? (int) $_POST['nik'] : 0;
$receivedData = $_POST['values'];
$nik = isset($receivedData[0]) ? (int) $receivedData[0] : 0;

$jenis_sekolah = $receivedData[1];
$lokasi = $receivedData[2];
$waktuDari = $receivedData[3];
$sampai = $receivedData[4];
// $statusLulus = $receivedData[6];
//  = $receivedData[7];
// $nilai = $receivedData[8];
// $gelar = $receivedData[9];


$data = array(
    'nik' => $nik,
    'nama_organisasi' => $jenis_sekolah,
    'tahun' => $lokasi,
    'lokasi' => $waktuDari,
    'jabatan' => $sampai,


);
// var_dump($data);
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