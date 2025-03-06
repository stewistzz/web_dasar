  <?php
  include('lib/Session.php');

  $session = new Session();
  if ($session->get('is_login') !== true) {
    header('Location: login.php');
  }
  echo "<br><br><br><br><br>";
  include('layouts/header.php');

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>

  </head>


  <body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <!-- <div class="content-wrapper"> -->
    <!-- navbar -->

    <!-- </div> -->
    <!-- /navbar -->
    <!-- Main Sidebar Container -->

    <!-- Brand Logo -->
    <!-- toggle -->

    <button id="toggle-sidebar" class="btn btn-primary btn-sm">
      <i class="fas fa-bars"></i> <!-- Icon Hamburger -->
    </button>
    <!-- Sidebar -->
    <?php include('layouts/sidebar.php'); ?>



    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    switch (strtolower($page)) {
      case 'beranda':
        include('pages.dashboard.php');
        break;
      case 'mahasiswa':
        include('pages/mahasiswa.php');
        break;
      case 'status':
        include('pages/admin.php');
        break;
      case 'admin':
        include('pages/admin.php');
        break;
      case 'akun':
        include('pages/akun.php');
        break;
      default:
        include('pages/dashboard.php');
        break;
    }
    ?>

    <!-- /.content -->
    <!-- </div> -->
    <!-- /.content-wrapper -->

    <?php include('layouts/footer.php'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- ./wrapper -->


    <!-- Bootstrap 4 -->
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Validation -->
    <script src="../adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="../adminlte/plugins/jquery-validation/localization/messages_id.min.js"></script>
    <!-- DataTables & Plugins -->
    <script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
    <script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="../adminlte/plugins/pdfmake/pdfmake.min.js.map"></script>
    <script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../adminlte/dist/js/demo.js"></script>
  </body>

  </html>