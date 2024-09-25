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

    /* modifikasi fungsi dengan parameter */
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
    echo"<br><br>";

    /* modifikasi fungsi dengan parameter add nilai default */
    function perkenalanDefault($nama, $salam ="Assalamualaikum")
    {
        echo $salam;
        echo " Perkenalkan, nama saya" . $nama . "</br>";
         echo "Senang berkenalan dengan anda<br>";
    }
    // memanggil fungsi yang sudah dibuat
    perkenalanDefault("Dimas Setyo", "Hallo");
    echo"<hr>";

    // memanggil fungsi dengan parameter variabel
    $sayaNew = "Setyo";
    $ucapanSalamNew = "Selamat pagi";
    // call function
    perkenalanDefault($sayaNew);
    echo"<br><br>";

    /* modifikasi fungsi dengan nilai pengembalian */
    function hitungUmur($thn_lahir, $thn_sekarang)
    {
        $umur = $thn_sekarang - $thn_lahir;
        return $umur;
    }
    // pemanggilan function
    echo"Umur saya adalah " . hitungUmur(1988, 2023) . " Tahun";
    echo"<br><br>";
    
    /*pemanggilan function didalam function*/
    function hitungUmurCall($thn_lahir, $thn_sekarang)
    {
        $umur = $thn_sekarang - $thn_lahir;
        return $umur;
    }
    function perkenalanUmur($nama, $salam = "Assalamualaikum")
    {
        echo $salam;
        echo " Perkenalkan, nama saya" . $nama . "</br>";

        // call other function
         echo "Saya berusia" . hitungUmurCall(1988, 2023) . " tahun";
         echo"Senang berkenalan dengan anda";
    }

    
?>