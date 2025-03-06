<!DOCTYPE html>
<html lang="id">

<head>
    <style>
        /* body {
            background: url('../../assets/img/bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
            position: relative;
        } */

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: azure (0.5);
            z-index: -1;
        }

        .sidebar {
            background-color: rgba(255, 255, 255, 0.6);
        }

        .main-sidebar,
        .content-wrapper {
            margin-top: 140px;
            /* Jarak 200px dari header */
        }

        .sidebar .nav-link,
        .sidebar .nav-link p {
            font-size: 14px;
            color: #000;
        }

        .table td {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Main Sidebar Container -->



        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand navbar-white navbar-light">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                            </li>
                        </ul>

                        <div class="row mb-2">
                            <div class="col-sm-12">
                                    <h1 class="text-center font-weight-bold" style="text-align: center;">Sistem Bebas Tanggungan</h1>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dashboard Admin</h3>
                        </div>
                        <div class="card-body">
                            <input type="text" placeholder="Cari Mahasiswa..." class="form-control mb-3 w-50">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Status Foto</th>
                                        <th>Status UKT</th>
                                        <th>Status SKKM</th>
                                        <th>File</th>
                                        <th>Waktu Pengajuan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2341760188</td>
                                        <td>Rahmalia Mutia Farda</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Valid
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Valid</a>
                                                    <a class="dropdown-item" href="#">Tidak Valid</a>
                                                </div>
                                            </div>
                                            <i class="fas fa-eye"></i>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Valid
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Valid</a>
                                                    <a class="dropdown-item" href="#">Tidak Valid</a>
                                                </div>
                                            </div>
                                            <i class="fas fa-eye"></i>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Tidak Valid
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Valid</a>
                                                    <a class="dropdown-item" href="#">Tidak Valid</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fas fa-edit text-primary"></i></td>
                                        <td>14/06/2024 08:41:54</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn bg-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Menunggu Verifikasi
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Valid</a>
                                                    <a class="dropdown-item" href="#">Tidak Valid</a>
                                                    <a class="dropdown-item" href="#">Menunggu Verifikasi</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3">
                                <span>Menampilkan 1 dari 280 data</span>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Sebelum</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>