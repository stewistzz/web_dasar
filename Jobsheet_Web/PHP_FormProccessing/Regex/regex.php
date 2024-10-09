<?php
    $pattern = '/[a-z]/'; // regex mencocokkan huruf kecil
    $text = 'This is a Sample Text.';

    // pemilihan
    if (preg_match($pattern, $text)) {
        echo"Huruf kecil ditemukan!";
    } else {
        echo"Tidak ada huruf kecil!";
    }
    
    echo"<br><hr>";
    $pattern = '/[0-9]+/';
    $text = 'There are 123 apples.';

    if (preg_match($pattern, $text,$matches)) {
        echo"Cocokkan : " . $matches[0];
    } else {
        echo"Tidak ada yang cocok";
    }

    echo"<br><hr>";
    $pattern = '/apple/';
    $replacement = 'banana';
    $text = 'I like apple pie. ';
    $new_text = preg_replace($pattern, $replacement, $text);
    echo $new_text;

    echo"<br><hr>";
    $pattern = '/go*d/'; // mencari kecocokan kata god, good, goopd, tergantung jumlah o nya sebanyak kali
    $text = 'god is good';

    if (preg_match($pattern, $text, $matches)) {
        echo"Cocokkan : " . $matches[0];
    } else {
        echo"Tidak ada yang cocok!";
    }

    echo"<br><hr>";
    // pertanyaan 5.5
    $pattern = '/go?d/'; // mencari kecocokan kata god, good, goopd, tergantung jumlah o nya sebanyak kali
    $text = 'god is good';

    if (preg_match($pattern, $text, $matches)) {
        echo"Cocokkan : " . $matches[0];
    } else {
        echo"Tidak ada yang cocok!";
    }

    echo"<br><hr>";
    // pertanyaan 5.6
    $pattern = '/go{2,3}d/';
    $text = 'god is good';

    if (preg_match($pattern, $text, $matches)) {
        echo"Cocokkan : " . $matches[0];
    } else {
        echo"Tidak ada yang cocok!";
    }
    
?>