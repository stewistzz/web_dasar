<?php
// $username = 'root';
// $password = '';
// $database = 'dasar_web';

// try {
//     $db = new mysqli('localhost', $username, $password, $database);
//     if($db->connect_error){
//         die('Connection DB failed: ' . $db->connect_error);
//     }
// } catch(Exception $e){
//     die($e->getMessage());
// }

// new connection
$use_driver = 'sqlsrv'; // mysql atau sqlsrv
$host = 'LAPTOP-02HG34IM';
$username = ''; //'sa';
$password = '';
$database = 'dasar_web';
$db;

if ($use_driver == 'mysql') {
    try {
        $db = new mysqli('localhost', $username, $password, $database);
        if ($db->connect_error) {
            die('Connection DB failed: ' . $db->connect_error);
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else if ($use_driver == 'sqlsrv') {
    $credential = [
        'Database' => $database,
        'UID' => $username,
        'PWD' => $password
    ];
    try {
        $db = sqlsrv_connect($host, $credential);
        if (!$db) {
            $msg = sqlsrv_errors();
            die($msg[0]['message']);
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
// function getKategori()
// {
//     global $db;
//     $query = "SELECT * FROM m_kategori ORDER BY kategori_nama ASC";
//     $result = sqlsrv_query($db, $query);
//     $kategori = [];
//     if ($result) {
//         while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
//             $kategori[] = $row;
//         }
//     } else {
//         die(print_r(sqlsrv_errors(), true));
//     }
//     return $kategori;
// }
