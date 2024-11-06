<div class="container-fluid">
    <div class="row">
        <?php
        require 'admin/template/menu.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM jabatan WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Jabatan</h1>
            </div>
            <div class="card col-md-6">
                <div class="card-header">
                    Form Edit Jabatan
                </div>
                <div class="card-body">
                    <form action="fungsi/edit.php?jabatan=edit" method="POST" enctype="multipart/form-data"> 
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                        <div class="mb-3">
                            <label for="jabatan" class="forn-label">Jabatan</label>
                            <input type="text" class="form-control" value="<?php echo $row['jabatan']; ?>" name="jabatan" id="jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="forn-label">Keterangan</label>
                            <input type="text" class="form-control" value="<?php echo $row['keterangan']; ?>" name="keterangan" id="keterangan">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        <a href="index.php?page=jabatan" class="btn btn-secondary"><i class="fa fa-times" aria-hidden="true"></i> Batal</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>