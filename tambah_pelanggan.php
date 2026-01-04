<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $pass   = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];

    mysqli_query($koneksi, "INSERT INTO pelanggan 
    (nama,email,password,alamat,no_hp)
    VALUES ('$nama','$email','$pass','$alamat','$no_hp')");

    header("Location: pelanggan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
</head>
<body>

<h2>Tambah Pelanggan</h2>

<form method="post">
    Nama <br><input type="text" name="nama" required><br><br>
    Email <br><input type="email" name="email" required><br><br>
    Password <br><input type="password" name="password" required><br><br>
    Alamat <br><textarea name="alamat"></textarea><br><br>
    No HP <br><input type="text" name="no_hp"><br><br>

    <button name="simpan">Simpan</button>
    <a href="pelanggan.php">Kembali</a>
</form>

</body>
</html>
