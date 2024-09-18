<?php 
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$nilaiTotal = 0;

foreach ($nilaiSiswa as $n) {
    if ($n < 92 && $n > 70) {
        $nilaiTotal += $n;
    } else {
        continue;
    }
    echo"Nilai dari siswa: $nilaiTotal<br>";
}
echo"Nilai Total Siswa adalah: $nilaiTotal";
?>