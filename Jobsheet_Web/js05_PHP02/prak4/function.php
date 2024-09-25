<?php 
    // belajar membuat function
    function perkenalan()
    {
        echo "Assalamualaikum, ";
        echo "Perkenalkan, nama saya Dimas Setyo</br>"; // php dapat menyimpan tag html didalam echo
         echo "Senang berkenalan dengan anda<br>";
    }

    // calling function
    perkenalan();
    perkenalan();
    echo"<br><br>";

    // modifikasi dengan parameter
    function perkenalanParameter($nama, $salam)
    {
        echo $salam;
        echo "Perkenalkan, nama saya" . $nama . "</br>"; // php dapat menyimpan tag html didalam echo
         echo "Senang berkenalan dengan anda<br>";
    }

    // pemanggilan fungsi yang dibuat dengan value pada parameter
    perkenalanParameter("Dimas Setyo", "Hallo");

    echo"<hr>";

    $saya = "Nugroho";
    $ucapanSalam = "Selamat Pagi";

    // pemanggilan fungsi dengan value pada variabel
    perkenalanParameter($saya, $ucapanSalam);
?>