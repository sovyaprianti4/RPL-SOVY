<?php
session_start();
include "../config/koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['id_pelanggan'] = $data['id'];   // ← WAJIB ADA
    $_SESSION['nama'] = $data['nama'];

    header("Location: dashboard.php");
} else {
    echo "Login gagal";
}
