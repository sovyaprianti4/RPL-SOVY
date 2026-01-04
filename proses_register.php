<?php
include "../config/koneksi.php";

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$alamat   = $_POST['alamat'];
$no_hp    = $_POST['no_hp'];

// cek email sudah ada atau belum
$cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar, silakan gunakan email lain";
    exit;
}

mysqli_query($koneksi, "
    INSERT INTO pelanggan (nama, email, password, alamat, no_hp)
    VALUES ('$nama', '$email', '$password', '$alamat', '$no_hp')
");

header("Location: login.php");
?>
