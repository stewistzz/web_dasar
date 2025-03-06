<?php 
define('HOST', 'localhost'); // biasanya localhost
define('USER', 'root');       // user default di XAMPP biasanya 'root'
define('PASSWORD', '');       // tidak ada password
define('DATABASE', 'prakwebdb'); // nama database

$dbl = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$dbl) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>s