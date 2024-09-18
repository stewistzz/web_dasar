<?php

// bagian 1
$angka1 = 10;
$angka2 = 5;

$hasil = $angka1 + $angka2;

    // print
echo"Hasil penjumlahan $angka1 dan $angka2 adalah $hasil";

// bagian 2
$benar = true;
$salah = false;
echo"Variabel benar: $benar, variabel salah: $salah";

// bagian 3
// mendefinisikan konstanta untuk nilai tetap
define("NAMA_SITUS", "WebsiteKu.com");
define("TAHUN_PENDIRIAN", 2023);

echo"Selamat datang di " .NAMA_SITUS . ", situs yang didirikan pad atahun " . TAHUN_PENDIRIAN . ".";

?>