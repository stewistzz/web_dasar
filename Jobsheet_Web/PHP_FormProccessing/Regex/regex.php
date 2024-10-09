<?php
    $pattern = '/[a-z]/'; // regex mencocokkan huruf kecil
    $text = 'This is a Sample Text.';

    // pemilihan
    if (preg_match($pattern, $text)) {
        echo"Huruf kecil ditemukan!";
    } else {
        echo"Tidak ada huruf kecil!";
    }
    
?>