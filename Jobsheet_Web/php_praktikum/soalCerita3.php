<?php 

$hargaBarang = 120000;

if ($hargaBarang > 100000) {
    $diskon = 0.2;
    $hargaDiskon = $hargaBarang - ($hargaBarang * $diskon);
}
echo"Harga barang sebelum diskon: $hargaBarang<br> Diskon: 0.2<br>";
echo"Harga barang setelah diskon: $hargaDiskon";

?>