<?php 
    // recursive function
    function tampilkanHaloDunia()
    {
        echo"Hallo dunia! <br>";
        // pemanggilan dirinya
        tampilkanHaloDunia();
    }

    // call function
    tampilkanHaloDunia();
?>