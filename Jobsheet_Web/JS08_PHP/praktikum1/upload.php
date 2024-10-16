<?php 

    if (isset($_POST["submit"])) {
        $targetdir = "uploads/"; // destinasi directory
        $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);

        // ubahan1
        $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $maxsize = 5*1024*1024;

        // new condition
        if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"]<=$maxsize) {
            // kondisi
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
                echo "File berhasil diunggah";
                // tampilkan gambar upload
                echo '<img src="' . $targetfile . '" width="200" style="height:auto;">';
            } else {
                echo "File gagal diunggah";
            }
        } else {
            echo"File tidak valid atau melebihi ukuran maksumum yang diizinkan";        }
        
    }

?>