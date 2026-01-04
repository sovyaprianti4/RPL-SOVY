<?php
session_start();
include "../config/koneksi.php";

$layanan = mysqli_query($koneksi, "SELECT * FROM layanan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesan Jasa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Pesan Jasa Kebersihan</h2>

    <form action="" method="POST">
        <label>Pilih Layanan</label>
        <select name="id_layanan" required>
            <?php while ($l = mysqli_fetch_assoc($layanan)) { ?>
                <option value="<?= $l['id']; ?>">
                    <?= $l['nama_layanan']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <button type="submit" name="pesan">Pesan</button>
    </form>

    <div class="menu">
        <a href="dashboard.php">Kembali</a>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST['pesan'])) {
    mysqli_query($koneksi, "
        INSERT INTO pesanan (id_pelanggan, id_layanan, tanggal, alamat, status)
        VALUES (
            '$_SESSION[pelanggan]',
            '$_POST[id_layanan]',
            '$_POST[tanggal]',
            '$_POST[alamat]',
            'Menunggu'
        )
    ");

    echo "<script>alert('Pesanan berhasil dibuat'); location='dashboard.php';</script>";
}
?>
