<table id="example" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('koneksi.php');
        $no = 1;
        $query = "SELECT * FROM anggota ORDER BY id DESC";
        $sql = $dbl->prepare($query);
        $sql->execute();
        $resl = $sql->get_result();

        if ($resl->num_rows > 0) {
            while ($row = $resl->fetch_assoc()) {
                $id = $row['id'];
                $nama = $row['nama'];
                $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                $alamat = $row['alamat'];
                $no_telp = $row['no_telp'];
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $nama ?></td>
            <td><?= $jenis_kelamin ?></td>
            <td><?= $alamat ?></td>
            <td><?= $no_telp ?></td>
            <td>
                <button id="<?= $id; ?>" class="btn btn-success btn-sm edit_data">
                    <i class="fa fa-edit"></i> Edit
                </button>
                <button id="<?= $id; ?>" class="btn btn-danger btn-sm hapus_data">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>
        <?php 
            } 
        } else { 
        ?>
        <tr>
            <td colspan="6">Tidak ada data ditemukan</td>
        </tr>
        <?php 
        } 
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
