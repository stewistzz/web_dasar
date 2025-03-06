<!DOCTYPE html>
<html lang="id">

<head>
    <style>
        body {
            background: url('../../assets/img/bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
            position: relative;
        }

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

<body>


    <aside class="main-sidebar sidebar-light-primary elevation-4">

        <div class="sidebar" style="overflow-y: auto;">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=tanggungan" class="nav-link">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>Cek Status Tanggungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=akun" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>Tambah Akun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=mahasiswa" class="nav-link">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>Tambah Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="index.php?page=admin" class="nav-link">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>Tambah Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../action/auth.php?act=logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </aside>
</body>

</html>