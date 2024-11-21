<?php
include('../lib/Session.php');
$session = new Session();
if ($session->get('is_login') !== true) {
    header('Location: login.php');
}
include_once('../model/bukuModel.php');
include_once('../lib/Secure.php');
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'load') {
    $buku = new BukuModel();
    $data = $buku->getData();
    $result = [];
    $i = 1;
    while ($row = $data->fetch_assoc()) {
        $result['data'][] = 
        [
            $i,
            $row['kategori_id'],  // Menampilkan kategori_id dari buku
            $row['buku_kode'],  // Menampilkan kode buku
            $row['buku_nama'],  // Menampilkan nama buku
            $row['jumlah'],  // Menampilkan jumlah buku
            $row['deskripsi'],  // Menampilkan deskripsi buku
            $row['gambar'],  // Menampilkan gambar buku
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['buku_id'] . ')"><i class="fa fa-edit"></i></button>  
         <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['buku_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }
    echo json_encode($result);
}
if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $buku = new BukuModel();
    $data = $buku->getDataById($id);
    echo json_encode($data);
}
if ($act == 'save') {
    // validasi
    $data = 
    [
        'kategori_id' => antiSqlInjection($_POST['kategori_id']),
        'buku_kode' => antiSqlInjection($_POST['buku_kode']),
        'buku_nama' => antiSqlInjection($_POST['buku_nama']),
        'jumlah' => antiSqlInjection($_POST['jumlah']),
        'deskripsi' => antiSqlInjection($_POST['deskripsi']),
        'gambar' => antiSqlInjection($_POST['gambar'])
    ];
    // $kategori = new KategoriModel();
    $buku = new BukuModel();
    $buku->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data Buku Berhasil Disimpan.'
    ]);
}
if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    // validasi
    $data = 
    [
        'kategori_id' => antiSqlInjection($_POST['kategori_id']),
        'buku_kode' => antiSqlInjection($_POST['buku_kode']),
        'buku_nama' => antiSqlInjection($_POST['buku_nama']),
        'jumlah' => antiSqlInjection($_POST['jumlah']),
        'deskripsi' => antiSqlInjection($_POST['deskripsi']),
        'gambar' => antiSqlInjection($_POST['gambar'])
    ];
    $buku = new BukuModel();
    $buku->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data buku berhasil diupdate.'
    ]);
}
if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    // modified buku
    $buku = new BukuModel();
    $buku->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data buku berhasil dihapus.'
    ]);
}
