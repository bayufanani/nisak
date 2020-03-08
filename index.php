<?php
header('Content-Type: application/json');

if (!isset($_GET['search'])) {
    echo json_encode([
        'success' => false,
        'message' => 'parameter search tidak ada'
    ]);
    return;
}

$dataPasien = file_get_contents('dummy.json');
$json = json_decode($dataPasien);
$search = $_GET['search'];

$respon = [];
foreach ($json as $data) {
    // if (strpos(strtolower($data->pasien->nama), strtolower($search)) !== false) {
    if ($data->no_registrasi == $search) {
        array_push($respon, $data);
    }
}

if (count($respon)  < 1) {
    echo json_encode([
        'success' => false,
        'message' => 'data tidak ditemukan'
    ]);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'berhasil',
    'payload' => $respon
]);
