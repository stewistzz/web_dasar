<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form input PHP</title>
</head>
<body>

<h2>Form Input PHP</h2>
<?php 
    // inisialisasi variabel
    $namaErr = "";
    $nama = "";

    // cek apakah sudah submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // validasi nama
        if (empty($_POST["nama"])) {
            $namaErr = "nama harus diisi";
        } else {
            $nama = $_POST["nama"];
            echo"Data berhasil disimpan";
        }
    }
?>

<!-- membuat form -->
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" value="<?php echo $nama;?>">

    <span class="error"><?php echo $namaErr;?></span><br><br>

    <input type="submit" value="Submit" nama="sumbit">
 </form>
    
</body>
</html>