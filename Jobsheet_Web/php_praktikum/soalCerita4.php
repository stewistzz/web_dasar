<?php 

$poin = 600;
// tampilan poin
echo"Totak skor pemain: $poin<br>";

// ternary
$tambahanHadiah = ($poin > 500) ? "Apakah pemain mendapatkan hadiah tambahan? (YA)" : "Apakah pemain mendapatkan hadiah tambahan? (Tidak)";

echo $tambahanHadiah;

// if($poin > 500) {
//     echo "Apakah pemain mendapatkan hadiah tambahan? (YA)";
// } else {
//     echo "Apakah pemain mendapatkan hadiah tambahan? (TIDAK)";
// }

?>