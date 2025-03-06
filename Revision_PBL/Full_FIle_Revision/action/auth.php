<?php
include('../lib/Connection.php');

session_start(); // Memulai session PHP

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    try {
        // Query untuk mengambil data berdasarkan username
        $sql = "SELECT * FROM Account WHERE username = ?";
        $params = [$username];
        $query = sqlsrv_query($db, $sql, $params);

        // Periksa apakah query berhasil
        if ($query === false) {
            throw new Exception('Error executing query: ' . print_r(sqlsrv_errors(), true));
        }

        // Ambil data dari hasil query
        if ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            // Verifikasi password
            if ($password == $row['password']) { // Gunakan password_hash/password_verify untuk keamanan lebih baik
                // Simpan informasi dasar ke dalam session
                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role_name'];

                // Query tambahan untuk mendapatkan account_id dari Mahasiswa atau Admin
                if ($row['role_name'] === 'Admin') {
                    $adminQuery = "SELECT admin_id, account_id FROM Admin WHERE account_id = ?";
                    $adminParams = [$row['account_id']];
                    $adminResult = sqlsrv_query($db, $adminQuery, $adminParams);

                    if ($adminData = sqlsrv_fetch_array($adminResult, SQLSRV_FETCH_ASSOC)) {
                        $_SESSION['account_id'] = $adminData['account_id'];
                        $_SESSION['user_id'] = $adminData['admin_id']; // Simpan ID spesifik admin
                        header('Location: ../index.php');
                        exit();
                    }
                } elseif ($row['role_name'] === 'Mahasiswa') {
                    $studentQuery = "SELECT mahasiswa_id, account_id FROM Mahasiswa WHERE account_id = ?";
                    $studentParams = [$row['account_id']];
                    $studentResult = sqlsrv_query($db, $studentQuery, $studentParams);

                    if ($studentData = sqlsrv_fetch_array($studentResult, SQLSRV_FETCH_ASSOC)) {
                        $_SESSION['account_id'] = $studentData['account_id'];
                        $_SESSION['user_id'] = $studentData['mahasiswa_id']; // Simpan ID spesifik mahasiswa
                        header('Location: ../index.php');
                        exit();
                    }
                } else {
                    $_SESSION['flash_status'] = false;
                    $_SESSION['flash_message'] = 'Role tidak dikenali.';
                    header('Location: ../login.php');
                    exit();
                }
            } else {
                $_SESSION['flash_status'] = false;
                $_SESSION['flash_message'] = 'Username atau password salah.';
                header('Location: ../login.php');
                exit();
            }
        } else {
            $_SESSION['flash_status'] = false;
            $_SESSION['flash_message'] = 'Username tidak ditemukan.';
            header('Location: ../login.php');
            exit();
        }

        sqlsrv_free_stmt($query);
    } catch (Exception $e) {
        // Tangani error
        $_SESSION['flash_status'] = false;
        $_SESSION['flash_message'] = 'Terjadi kesalahan: ' . $e->getMessage();
        header('Location: ../login.php');
        exit();
    }
} elseif ($act == 'logout') {
    // Hapus semua data session
    session_unset();
    session_destroy();
    header('Location: ../login.php');
    exit();
}
?>
