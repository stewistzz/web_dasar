 <?php

$totalKursi = 45;
$pengurangan = 28;
$totalKursiSekarang = $totalKursi - $pengurangan;

$persenKursi = ($totalKursiSekarang / $totalKursi) * 100;

echo"Kursi Semula : $totalKursi <br>";
echo"Kursi yang ditempati : $pengurangan <br>";
echo"Total kursi sekarang : $totalKursiSekarang <br>";
echo"Persentase Kursi : $persenKursi %";

?>