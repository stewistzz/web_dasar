<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dengan Validasi</title>

    <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
        <!-- span -->
         <span id="nama-error" style="color:red;"></span><br>
        <br>

        <label for="email">Email : </label>
        <input type="text" name="email" id="email">
        <span id="email-error" style="color:red;"></span><br>
        <br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil">
        <!-- Hasil akan ditampilkan di sini -->
    </div>
    
    <script>
        // gate
        $(document).ready(function() {
            $('#myForm').submit(function() {

                event.preventDefault();

                var nama = $('#nama').val();
                var email = $('#email').val();
                var valid = true;

                
                // kondisi nama
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }
                // kondisi email
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                // valid
                if (valid) {
                    

                    var formData = $("#myForm").serialize(); // Mengumpulkan data form
                    $.ajax({
                        url: "proses_validasi.php", // URL untuk mengirim data
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            $("#hasil").html(response);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>