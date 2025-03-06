<?php
include('../lib/Session.php');
$session = new Session();

// if ($session->get('is_login') !== true) {
//     header('Location: login.php');
// }

include_once('../model/AdminModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'load') {
    // Instansiasi model buku
    $admin = new AdminModel();

    // Mendapatkan data buku
    $data = $admin->getData();

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
            $row['nip'],
            $row['nama'],
            $row['email'],
            $row['kontak'],
            // Button aksi
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['admin_id'] . ')"><i class="fa fa-edit"></i></button>
             <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['admin_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }

    // Mengirim data dalam format JSON
    echo json_encode($result);
}


if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $admin = new AdminModel();
    $data = $admin->getDataById($id);

    echo json_encode($data);
}

if ($act == 'save') {
    $data = [
        'account_id' => (int) antiSqlInjection($_POST['account_id']),
        'nip' => antiSqlInjection($_POST['nip']),
        'nama' => antiSqlInjection($_POST['nama']),
        'email' => antiSqlInjection($_POST['email']),
        'kontak' => antiSqlInjection($_POST['kontak']),
    ];
    $admin = new AdminModel();
    $admin->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil disimpan.'
    ]);
}

if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $data = [
        'account_id' => (int) antiSqlInjection($_POST['account_id']),
        'nip' => antiSqlInjection($_POST['nip']),
        'nama' => antiSqlInjection($_POST['nama']),
        'email' => antiSqlInjection($_POST['email']),
        'kontak' => antiSqlInjection($_POST['kontak']),
    ];

    if (is_null($data['account_id'])) {
        echo json_encode([
            'status' => false,
            'message' => 'ID Akun tidak boleh kosong.'
        ]);
        exit;
    }

    $admin = new AdminModel();
    $admin->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil diupdate.'
    ]);
}

if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $admin = new AdminModel();
    $admin->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil dihapus.'
    ]);
}
