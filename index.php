<?php
header('Content-Type: application/json');

if (!isset($_GET['search'])) {
    echo json_encode([
        'succes' => false,
        'message' => 'parameter search tidak ada'
    ]);
    return;
}

$dataPasien = file_get_contents('dummy.json');
$json = json_decode($dataPasien);
$search = $_GET['search'];

$respon = [];
foreach ($json as $data) {
    if (strpos(strtolower($data->pasien->nama), strtolower($search)) !== false) {
        array_push($respon, $data);
    }
}

echo json_encode([
    'success' => true,
    'message' => 'berhasil',
    'payload' => $respon
]);
