<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Array terindeks</h2>
    <!-- tag php -->
     <?php 
        // variabel
        $ListDosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

        echo $ListDosen[2] . "<br>";
        echo $ListDosen[0] . "<br>";
        echo $ListDosen[1] . "<br>";

        echo "====================";
        echo "<br>";
         //   perulangan untuk melakukan print
         foreach ($ListDosen as $list) {
            echo $list . "<br>";
         }
     ?>
</body>
</html>