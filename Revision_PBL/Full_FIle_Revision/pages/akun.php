<?php
// include('lib/Session.php');
require_once __DIR__ . '/../lib/Connection.php';
// include('lib/Connection.php');
?>

<style>
    .content {
        margin-top: 50px;
    }
</style>

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
                        <h2 class="text-center font-weight-bold" style="text-align: center;">Daftar Akun</h2>
                    </div>
                </div>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">
                        Tambah Akun
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
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
    <form action="action/akunAction.php?act=save" method="post" id="form-tambah" enctype="multipart/form-data">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Akun</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Mahasiswa/Admin">
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
        $('#form-tambah').attr('action', 'action/akunAction.php?act=save');
        $('#username').val('');
        $('#password').val('');
        $('#role_name').val('');
    }

    function editData(id) {
        $.ajax({
            url: 'action/akunAction.php?act=get&id=' + id,
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action', 'action/akunAction.php?act=update&id=' + id);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#role_name').val(data.role_name)
            }
        });
    }


    function deleteData(id) {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/akunAction.php?act=delete&id=' + id,
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

    var tabelData;
    $(document).ready(function() {
        tabelData = $('#table-data').DataTable({
            ajax: {
                url: 'action/akunAction.php?act=load',
                dataSrc: 'data', // Pastikan DataTables mencari data di dalam properti 'data' dari JSON yang diterima
                error: function(xhr, error, thrown) {
                    alert("Terjadi kesalahan saat memuat data: " + error);
                }
            }

            // modified
            // ajax:'action/akunAction.php?act=load',
            // {
            //     dataSrc: 'data', // Specifies the key in the JSON response that contains the data array
            //     error: function(xhr, error, thrown) {
            //         alert("Error loading data: " + error);
            //     }
            // }
        });

        // tabelData = $('#table-data').DataTable({
        //     ajax: 'action/akunAction.php?act=load',
        // });

        $('#form-tambah').validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                role_name: {
                    required: true
                },
            },
            messages: {
                role_name: {
                    required: "Role tidak boleh kosong."
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