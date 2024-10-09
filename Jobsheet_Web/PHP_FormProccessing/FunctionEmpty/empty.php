<?php   
    $myArray = array(); //empty array
    if (empty($myArray)) {
        echo"Array tidak terdefinisi atau kosong.";
    } else {
        echo"Array terdefinisi dan tidak kosong";
    }
    echo"<br><hr>";
    if (empty($nonExistentVar)) {
        echo"Variabel tidak terdefinisi atau kosong";
    } else {
        echo"Variabel terdefinisi dan tidak kosong";
    }  
?>