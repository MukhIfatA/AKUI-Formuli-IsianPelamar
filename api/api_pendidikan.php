<?php
require 'api_ip.php';
$ch = curl_init();

$url = $link . 'api/Data-Pendidikan/Store';

// Check if 'nik' is set and not empty before casting to int
//$nik = isset($_POST['nik']) ? (int) $_POST['nik'] : 0;
$receivedData = $_POST['values'];
$nik = $receivedData[0];
$jenis_sekolah = $receivedData[1];
$nama_sekolah = $receivedData[2];
$lokasi = $receivedData[3];
$jurusan = $receivedData[4];
$waktuDari = $receivedData[5];
$sampai = $receivedData[6];
$statusLulus = $receivedData[7];
$nilai = $receivedData[8];
$gelar = $receivedData[9];
$data = array(
    'nik' => $nik,
    'jenis_sekolah' => $jenis_sekolah,
    'nama_sekolah' => $nama_sekolah,
    'lokasi' => $lokasi,
    'jurusan' => $jurusan,
    'tahun_masuk' => $waktuDari,
    'tahun_keluar' => $sampai,
    'lulus' => $statusLulus,
    'nilai' => $nilai,
    'gelar' => $gelar,
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