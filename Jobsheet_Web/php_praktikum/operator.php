<?php

$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo"Hasil + dari $a dan $b adalah $hasilTambah <br>";
echo"Hasil - dari $a dan $b adalah $hasilKurang <br>";
echo"Hasil * dari $a dan $b adalah $hasilKali <br>";
echo"Hasil / dari $a dan $b adalah $hasilBagi <br>";
echo"Hasil % dari $a dan $b adalah $sisaBagi <br>";
echo"Hasil ** dari $a dan $b adalah $pangkat <br>";

echo"<br><br>";
// tambahan 2
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

    // cetak
echo"hasil dari (==) $a dan $b adalah $hasilSama <br>";
echo"hasil dari (!=) $a dan $b adalah $hasilTidakSama <br>";
echo"hasil dari (<) $a dan $b adalah $hasilLebihKecil <br>";
echo"hasil dari (>) $a dan $b adalah $hasilLebihBesar <br>";
echo"hasil dari (<=) $a dan $b adalah $hasilLebihKecilSama <br>";
echo"hasil dari (>=) $a dan $b adalah $hasilLebihBesarSama <br>";

echo"<br><br>";
// tambahan 3
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo"hasil operator logika && dari $a dan $b adalah $hasilAnd <br>";
echo"hasil operator logika || dari $a dan $b adalah $hasilOr <br>";
echo"hasil dari operator logika !a adalah $hasilNotA <br>";
echo"hasil dari operator logika !b adalah $hasilNotB <br>";

echo"<br><br>";
// tambahan 4
echo"hasil jumlah dari $a dan $b adalah " . ($a += $b) . "<br>";
echo "hasil kurang dari $a dan $b adalah " . ($a -= $b) . "<br>";
echo"hasil kali dari $a dan $b adalah " . ($a *= $b) . "<br>";
echo "hasil bagi dari $a dan $b adalah " . ($a /= $b) . "<br>";
echo "hasil sisa bagi dari $a dan $b adalah " . ($a %= $b) . "<br>";
// kenapa ketika operator penugasan digabungkan dengan sting pada echo setelahnya terjadi eror?

echo"<br><br>";
// tambahan 5
$hasilIdentik = $a === $b;
$hasilTidakIdentikk = $a !== $b;

echo"Hasil (===) dari $a dan $b adalah $hasilIdentik <br>";
echo"Hasil (!==) dari $a dan $b adalah $hasilTidakIdentikk<br>";

?>