<?php 
$nama = @$_GET['nama']; // tanda @ agar tidak ada peringatan eror ketika keynya kosong
$usia = @$_GET['usia']; // tanda @ agar tidak ada peringatan eror ketika keynya kosong

echo"Halo {$nama}! Apakahh benar anda berusia {$usia} tahun?";
?>