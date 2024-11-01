<?php 

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

// periksa keberhasilan dari koneksi ke database
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>