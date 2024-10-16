<?php 

    if (isset($_POST["submit"])) {
        $targetdir = "uploads/"; // destinasi directory
        $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);

        // kondisi
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File berhasil diunggah";
        } else {
            echo "File gagal diunggah";
        }
    }

?>