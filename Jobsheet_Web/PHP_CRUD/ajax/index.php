<?php
include('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo $_SESSION['csrf_token']; ?>">
    
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Data Anggota</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: white;">Crud Dengan Ajax <i class="fas fa-users"></i></a>
    </nav>

    <div class="container">
        <h2 class="text-center mt-4">Data Anggota</h2>
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true">
                        <label for="jenkel1">Laki-laki</label>
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true">
                        <label for="jenkel2">Perempuan</label>
                    </div>
                    <p class="text-danger" id="err_jenkel"></p>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>

            <div class="form-group">
                <label>No. Telp</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                <p class="text-danger" id="err_no_telp"></p>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" name="simpan" id="simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button onclick="hapusData(<?php echo $id; ?>)" class="btn btn-danger">Hapus</button>
            </div>
        </form>
        <hr>

        <!-- simpan data tabel -->
        <div class="data"></div>
        
    </div>
    <div class="text-center">&copy; <?php echo date('Y'); ?> Copyright -
        <a href="https://google.com">Desain Dan Pemrograman Web</a>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // Mengirim token keamanan
        $.ajaxSetup({
            headers: {
                'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('.data').load("data.php");
    });

    $("#simpan").click(function() {
    var data = $('.form-data').serialize();
    var jenkel1 = document.getElementById("jenkel1").value;
    var jenkel2 = document.getElementById("jenkel2").value;
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var no_telp = document.getElementById("no_telp").value;

    // Cek apakah nama kosong
    if (nama == "") {
        document.getElementById("err_nama").innerHTML = "Nama Tidak Boleh Kosong";
    } else {
        document.getElementById("err_nama").innerHTML = "";
    }

    // Cek apakah alamat kosong
    if (alamat == "") {
        document.getElementById("err_alamat").innerHTML = "Alamat Tidak Boleh Kosong";
    } else {
        document.getElementById("err_alamat").innerHTML = "";
    }

    // Cek apakah jenis kelamin sudah dipilih
    if (document.getElementById("jenkel1").checked == false && document.getElementById("jenkel2").checked == false) {
        document.getElementById("err_jenkel").innerHTML = "Jenis Kelamin Tidak Boleh Kosong";
    } else {
        document.getElementById("err_jenkel").innerHTML = "";
    }

    // Cek apakah No. Telp kosong
    if (no_telp == "") {
        document.getElementById("err_no_telp").innerHTML = "No. Telp Tidak Boleh Kosong";
    } else {
        document.getElementById("err_no_telp").innerHTML = "";
    }

    // Jika semua field sudah diisi dengan benar
    if (nama != "" && alamat != "" && (document.getElementById("jenkel1").checked == true || document.getElementById("jenkel2").checked == true) && no_telp != "") {
        $.ajax({
            type: 'POST',
            url: "form_action.php",
            data: data,
            dataType: 'json',
            success: function() {
                $('.data').load("data.php");
                document.getElementById("id").value = "";
                document.getElementById("form-data").reset();
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    }
});
    </script>

</body>
</html>