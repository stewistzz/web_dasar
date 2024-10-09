<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    echo"nama : " . $nama . "<br>";
    echo"Email : " . $email;
}
?>