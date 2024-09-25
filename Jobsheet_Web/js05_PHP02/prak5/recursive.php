<?php 
    // recursive function
    /* bagian pertama */
    function tampilkanHaloDunia()
    {
        echo"Hallo dunia! <br>";
        // pemanggilan dirinya
        tampilkanHaloDunia();
    }

    // call function
    // tampilkanHaloDunia();

    /** bagian kedua */
    // menggunakan for
    for ($i=1; $i <= 25; $i++) { 
        echo"Perulangan ke-{$i} <br>";
    }
    echo"<hr>";
    // menggunakan recursive
    function tampilkanAngka(int $jumlah, int $indeks = 1)
    {
        echo"Perulangan ke-{$indeks} <br>";

        // recursive call
        if ($indeks < $jumlah)
        {
            tampilkanAngka($jumlah, $indeks+ 1);
        }
    }
    tampilkanAngka(20);
?>