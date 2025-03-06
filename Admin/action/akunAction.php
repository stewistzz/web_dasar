<?php
include('../lib/Session.php');
$session = new Session();

// if ($session->get('is_login') !== true) {
//     header('Location: login.php');
// }

include_once('../model/AkunModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'load') {
    // Instansiasi model buku
    $buku = new AkunModel();

    // Mendapatkan data buku
    $data = $buku->getData();

    // Memeriksa apakah data kosong
    if (empty($data)) {
        echo json_encode(['error' => 'No data found']);
        exit; // Menghentikan eksekusi lebih lanjut jika data kosong
    }

    // Membuat array untuk menyimpan data yang akan dikirim
    $result = [];
    $i = 1;

    // Mengisi array dengan data
    foreach ($data as $row) {
        $result['data'][] = [
            $i, // Nomor urut
            $row['account_id'],
            $row['username'],
            $row['password'],
            $row['role_name'],
            // Button aksi
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['account_id'] . ')"><i class="fa fa-edit"></i></button>
             <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['account_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }

    // Mengirim data dalam format JSON
    echo json_encode($result);
}


if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $buku = new AkunModel();
    $data = $buku->getDataById($id);

    echo json_encode($data);
}

if ($act == 'save') {
    $data = [
        'username' => antiSqlInjection($_POST['username']),
        'password' => antiSqlInjection($_POST['password']),
        'role_name' => antiSqlInjection($_POST['role_name']),    
    ];
    $buku = new AkunModel();
    $buku->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil disimpan.'
    ]);
}

if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $data = [
        'username' => antiSqlInjection($_POST['username']),
        'password' => antiSqlInjection($_POST['password']),
        'role_name' => antiSqlInjection($_POST['role_name']),    
    ];

    if (is_null($data['account_id'])) {
        echo json_encode([
            'status' => false,
            'message' => 'ID Akun tidak boleh kosong.'
        ]);
        exit;
    }

    $buku = new AkunModel();
    $buku->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil diupdate.'
    ]);
}

if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $buku = new AkunModel();
    $buku->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil dihapus.'
    ]);
}
