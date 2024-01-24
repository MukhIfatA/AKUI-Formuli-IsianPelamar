<?php
require 'api_ip.php';
$ch = curl_init();

$url = $link . 'api/Pengalaman-Terakhir/Store';

// Check if 'nik' is set and not empty before casting to int
$nik = isset($_POST['nik']) ? (int) $_POST['nik'] : 0;

$data = array(
    'nik' => $nik,
    'nama_perusahaan' => $_POST['namaPerusahaan'],
    'alamat_perusahaan' => $_POST['alamatPerusahaan'],
    'kota' => $_POST['kotaPerusahaan'],
    'nomor_telp_kantor' => $_POST['telpPerusahaan'],
    'jabatan_terakhir' => $_POST['jbtnPerusahaan'],
    'nama_atasan' => $_POST['atasanPerusahaan'],
    'nomor_telp_atasan' => $_POST['telpAtasan'],
    'mulai_kerja' => $_POST['dariPerusahaan'],
    'selesai_kerja' => $_POST['selesai_kerja'],
    'gaji_terakhir' => $_POST['gaji_terakhir'],
    'alasan_keluar' => $_POST['alasan_keluar'],
    'deskripsi_pekerjaan' => $_POST['deskripsi_pekerjaan'],
    'alasan_melamar' => $_POST['pnjlsn'],

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