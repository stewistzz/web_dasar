<?php 
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo"Nilai Huruf : A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo"Nilai Huruf : B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo"Nilai Huruf : C";
} elseif ($nilaiNumerik < 70) {
    echo"Nilai Huruf : D";
}

// tambahan 2
echo"<br><br>";
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo"Atel tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer";

?>