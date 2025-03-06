<?php
require_once __DIR__ . '/../lib/Connection.php';

function getAkun()
{
    global $db;
    $query = "SELECT account_id FROM Account WHERE role_name = 'Mahasiswa' ORDER BY account_id DESC ";
    $result = sqlsrv_query($db, $query);
    $akun = [];
    if ($result) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $akun[] = $row;
        }
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
    return $akun;
}


$akun = getAkun();
?>


<section class="content-header">
    <div class="container-fluid">

    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h2 class="text-center font-weight-bold" style="text-align: center;">Daftar Mahasiswa</h2>
                    </div>
                </div>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">
                        Tambah Mahasiswa
                    </button>
                </li>
            </ul>

        </nav>

        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Akun</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Email</th>
                        <th>Angkatan</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Form -->
<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
    <form action="action/mahasiswaAction.php?act=save" method="post" id="form-tambah" enctype="multipart/form-data">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Akun</label>
                            <select id="account_id" name="account_id" class="form-control">
                                <?php if (!empty($akun)): ?>
                                    <?php foreach ($akun as $k): ?>
                                        <option value="<?= htmlspecialchars($k['account_id']); ?>">
                                            <?= htmlspecialchars($k['account_id']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">Akun Tidak Ditemukan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" class="form-control" name="nim" id="nim">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas">
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" class="form-control" name="angkatan" id="angkatan">
                        </div>
                        <div class="form-group">
                            <label>Status Mahasiswa</label>
                            <input type="text" class="form-control" name="status" id="status" placeholder="Aktif/Tidak Aktif">

                            <!-- <input type=" radio" name="aktif" id="aktif" value="aktif" required="true">Aktif
                            <input type="radio" name="" id="" value="tidak aktif">Tidak Aktif -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function tambahData() {
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/mahasiswaAction.php?act=save');
        $('#account_id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#angkatan').val('');
        $('#nama_kelas').val('');
        $('#status').val('');
    }

    function editData(id) {
        $.ajax({
            url: 'action/mahasiswaAction.php?act=get&id=' + id,
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action', 'action/mahasiswaAction.php?act=update&id=' + id);
                $('#account_id').val(data.account_id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#angkatan').val(data.angkatan);
                $('#nama_kelas').val(data.nama_kelas);
                $('#status').val(data.status);
                // $('#buku_kode').val(data.buku_kode);
                // $('#buku_nama').val(data.buku_nama);
                // $('#kategori_id').val(data.kategori_id).trigger('change');
                // $('#jumlah').val(data.jumlah);
                // $('#deskripsi').val(data.deskripsi || '');
                // $('#gambar').val(data.gambar);
            }
        });
    }


    function deleteData(id) {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/mahasiswaAction.php?act=delete&id=' + id,
                method: 'post',
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status) {
                        tabelData.ajax.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        }
    }
    //sini
    // var tabelData;
    // $(document).ready(function() {
    //     tabelData = $('#table-data').DataTable({
    //         ajax: 'action/mahasiswaAction.php?act=load',
    //     });
    //     $('#form-tambah').validate({
    //         rules: {
    //             account_id: {
    //                 required: true
    //             },
    //             nama: {
    //                 required: true
    //             },
    //             nim: {
    //                 required: true
    //             },
    //             email: {
    //                 required: true
    //             },
    //             angkatan: {
    //                 required: true
    //             },
    //             prodi: {
    //                 required: true
    //             },
    //             status: {
    //                 required: true
    //             },
    //         },
    //         messages: {
    //             kategori_id: {
    //                 required: "Kategori harus dipilih."
    //             },
    //             deskripsi: {
    //                 required: "Deskripsi tidak boleh kosong."
    //             },
    //         },
    //         errorElement: 'span',
    //         errorPlacement: function(error, element) {
    //             error.addClass('invalid-feedback');
    //             element.closest('.form-group').append(error);
    //         },
    //         highlight: function(element) {
    //             $(element).addClass('is-invalid');
    //         },
    //         unhighlight: function(element) {
    //             $(element).removeClass('is-invalid');
    //         },
    //         submitHandler: function(form) {
    //             $.ajax({
    //                 url: $(form).attr('action'),
    //                 method: 'post',
    //                 data: new FormData(form),
    //                 processData: false,
    //                 contentType: false,
    //                 success: function(response) {
    //                     var result = JSON.parse(response);
    //                     if (result.status) {
    //                         $('#form-data').modal('hide');
    //                         tabelData.ajax.reload();
    //                     } else {
    //                         alert(result.message);
    //                     }
    //                 }
    //             });
    //         }
    //     });
    // });
    var tabelData;
    $(document).ready(function() {
        tabelData = $('#table-data').DataTable({
            "ajax": {
                url: 'action/mahasiswaAction.php?act=load',
                dataSrc: 'data', // Pastikan DataTables mencari data di dalam properti 'data' dari JSON yang diterima
                error: function(xhr, error, thrown) {
                    alert("Terjadi kesalahan saat memuat data: " + error);
                }
            }
        });

        $('#form-tambah').validate({
            rules: {
                account_id: {
                    required: true
                },
                nama: {
                    required: true
                },
                nim: {
                    required: true
                },
                email: {
                    required: true
                },
                angkatan: {
                    required: true
                },
                prodi: {
                    required: true
                },
                status: {
                    required: true
                },
            },
            messages: {
                kategori_id: {
                    required: "Kategori harus dipilih."
                },
                deskripsi: {
                    required: "Deskripsi tidak boleh kosong."
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'post',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('#form-data').modal('hide');
                            tabelData.ajax.reload();
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>