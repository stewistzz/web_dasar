<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP</title>
</head>
<body>

<!-- php code -->
<h2>Form Input PHP</h2>
<!-- membuat form -->
 <form action="html_aman.php" method="post">
    <label for="inputData">Nama : </label>
    <input type="text" name="inputData" id="inputData">
    <br><br>
    <label for="email">Email : </label>
    <input type="text" name="email" id="email">
    <br><br>
    <input type="submit" value="Submit" nama="sumbit">
    <br><br>
 </form>
<?php 
    // cek apakah sudah submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['inputData'];
        // sanitasi untuk mencegah penyerangan XSS
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        if (empty($input)) {
            echo"Data yang dimasukkan tidak sesuai";
        } else {
            echo"Data yang dimasukkan sesuai : ". $input . "<br>";
        }

        // memeriksa apakah input adalah email yang valid
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Lanjutkan dengan pengolahan email yang tepat
            echo"Email yang dimasukkan : " . $email . "<br>";
        } else {
            // tangani input yang tidak valid
            echo"Email yang dimasukkan tidak valid";
        }
    }
    ?>
</body>
</html>