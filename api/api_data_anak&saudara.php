<?php
require 'api_ip.php';
$ch = curl_init();

$url = $link.'api/Data-Keluarga/Store';

// Check if 'nik' is set and not empty before casting to int
$receivedData = $_POST["values"];
$nik = $receivedData[0];
$nama = $receivedData[1];
$jenis_kelamin = $receivedData[2];
$tgl_lahir = $receivedData[3];
$tempat_lahir = $receivedData[4];
$pendidikan = $receivedData[5];
$pekerjaan = $receivedData[6];
$hubungan = $receivedData[7];
$data = array(
    'nik' => $nik,
    'nama' => $nama,
    'jenis_kelamin' => $jenis_kelamin,
    'tempat_lahir' => $tempat_lahir,
    'tanggal_lahir' => $tgl_lahir, // Fix this line
    'pendidikan' => $pendidikan,
    'pekerjaan' => $pekerjaan,
    'hubungan' => $hubungan, // Fix this line
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