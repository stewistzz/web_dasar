<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));

$query = "SELECT * FROM anggota WHERE id = ?";
$sql = $dbl->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();
$data = $result->fetch_assoc();

echo json_encode($data);

$dbl->close();
?>
