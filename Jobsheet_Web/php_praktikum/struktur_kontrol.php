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
// while
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


// tambahan 3
// for
echo"<br><br>";
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i=1; $i <= $jumlahLahan ; $i++) { 
    // jumlah buah
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo"Jumlah buah yang akan dipanen adalah: $jumlahBuah";

// tambahan 4
// foreach
echo"<br><br>";
$skorUjian = [84, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo"Total skor ujian adalah: $totalSkor";
?>