<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id='$id'")
);

if (isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];

    mysqli_query($koneksi, "UPDATE pelanggan SET
        nama='$nama',
        email='$email',
        alamat='$alamat',
        no_hp='$no_hp'
        WHERE id='$id'
    ");

    header("Location: pelanggan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>

<h2>Edit Pelanggan</h2>

<form method="post">
    Nama <br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>"><br><br>

    Email <br>
    <input type="email" name="email" value="<?= $data['email']; ?>"><br><br>

    Alamat <br>
    <textarea name="alamat"><?= $data['alamat']; ?></textarea><br><br>

    No HP <br>
    <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>"><br><br>

    <button name="update">Update</button>
    <a href="pelanggan.php">Kembali</a>
</form>

</body>
</html>
