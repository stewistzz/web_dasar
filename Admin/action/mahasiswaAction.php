<?php
include('../lib/Session.php');
$session = new Session();

// if ($session->get('is_login') !== true) {
//     header('Location: login.php');
// }

include_once('../model/MahasiswaModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'load') {
    // Instansiasi model mhs
    $mhs = new MahasiswaModel();

    // Mendapatkan data mhs
    $data = $mhs->getData();

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
            $row['nama'],
            $row['nim'],
            $row['email'],
            $row['angkatan'],
            $row['nama_kelas'],
            $row['status'],
            // Button aksi
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['mahasiswa_id'] . ')"><i class="fa fa-edit"></i></button>
             <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['mahasiswa_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }

    // Mengirim data dalam format JSON
    echo json_encode($result);
}


if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $mhs = new MahasiswaModel();
    $data = $mhs->getDataById($id);

    echo json_encode($data);
}

if ($act == 'save') {
    $data = [
        'account_id' => (INT) antiSqlInjection($_POST['account_id']),
        'nama' => antiSqlInjection($_POST['nama']),
        'nim' => antiSqlInjection($_POST['nim']),
        'email' => antiSqlInjection($_POST['email']),
        'angkatan' => antiSqlInjection($_POST['angkatan']),
        'nama_kelas' => antiSqlInjection($_POST['nama_kelas']),
        'status' => antiSqlInjection($_POST['status']),
        // 'mhs_kode' => antiSqlInjection($_POST['mhs_kode']),
        // 'mhs_nama' => antiSqlInjection($_POST['mhs_nama']),
        // 'kategori_id' => (int)antiSqlInjection($_POST['kategori_id']),
        // 'jumlah' => (int)antiSqlInjection($_POST['jumlah']),
        // 'deskripsi' => antiSqlInjection($_POST['deskripsi']),
        // 'gambar' => antiSqlInjection($_POST['gambar'])
    ];
    $mhs = new MahasiswaModel();
    $mhs->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil disimpan.'
    ]);
}

if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $data = [
        'account_id' => (!empty($_POST['account_id'])) ? (int)antiSqlInjection($_POST['account_id']) : null,
        'nama' => antiSqlInjection($_POST['nama']),
        'nim' => antiSqlInjection($_POST['nim']),
        'email' => antiSqlInjection($_POST['email']),
        'angkatan' => antiSqlInjection($_POST['angkatan']),
        'nama_kelas' => antiSqlInjection($_POST['nama_kelas']),
        'status' => antiSqlInjection($_POST['status']),
        // 'mhs_kode' => antiSqlInjection($_POST['mhs_kode']),
        // 'mhs_nama' => antiSqlInjection($_POST['mhs_nama']),
        // 'kategori_id' => (!empty($_POST['kategori_id'])) ? (int)antiSqlInjection($_POST['kategori_id']) : null,
        // 'jumlah' => (!empty($_POST['jumlah'])) ? (int)antiSqlInjection($_POST['jumlah']) : 0,
        // 'deskripsi' => (!empty($_POST['deskripsi'])) ? antiSqlInjection($_POST['deskripsi']) : 'Tidak ada deskripsi',
        // 'gambar' => antiSqlInjection($_POST['gambar'])
    ];

    if (is_null($data['account_id'])) {
        echo json_encode([
            'status' => false,
            'message' => 'ID Akun tidak boleh kosong.'
        ]);
        exit;
    }

    $mhs = new MahasiswaModel();
    $mhs->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil diupdate.'
    ]);
}

if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $mhs = new MahasiswaModel();
    $mhs->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil dihapus.'
    ]);
}
