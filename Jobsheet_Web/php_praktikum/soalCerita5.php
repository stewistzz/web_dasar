<?php 
$nilaiSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

// Menghitung total nilai dan jumlah siswa
$totalNilai = 0;
foreach ($nilaiSiswa as $nilai) {
    $totalNilai += $nilai[1];
}

// Menghitung rata-rata nilai
$rataRata = $totalNilai / count($nilaiSiswa);

// Menampilkan siswa yang nilainya di atas rata-rata
echo "Nilai rata-rata kelas: " . $rataRata . "<br>";
echo "Siswa dengan nilai di atas rata-rata: <br>";
foreach ($nilaiSiswa as $nilai) {
    if ($nilai[1] > $rataRata) {
        echo $nilai[0] . " dengan nilai " . $nilai[1] . "<br>";
    }
}
?>