<?php 
    $loremIpsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quam numquam saepe, eveniet dolores esse corporis ipsa delectus, quos accusantium est, autem harum animi quia et maiores perspiciatis illum? Obcaecati?";

    echo"<p>{$loremIpsum}";
    echo"Panjang karakter: " . strlen($loremIpsum) . "<br>";
    echo"Panjang kata: " . str_word_count($loremIpsum) . "<br>";
    echo"<p>" . strtoupper($loremIpsum) . "</p>";
    echo"<p>" . strtolower($loremIpsum) . "</p>";
?>