<?php 
// datetime
date_default_timezone_set("Asia/Jakarta");
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "structure");

// periksa keberhasilan dari koneksi ke database
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>