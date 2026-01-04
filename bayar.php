<?php
include "../config/koneksi.php";

$id_pesanan = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT pesanan.*, layanan.nama_layanan, layanan.harga
    FROM pesanan
    JOIN layanan ON pesanan.id_layanan = layanan.id
    WHERE pesanan.id = '$id_pesanan'
");

$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>

<h2>Pembayaran</h2>

<p><b>Layanan:</b> <?= $row['nama_layanan']; ?></p>
<p><b>Total Bayar:</b> Rp <?= number_format($row['harga']); ?></p>

<form action="proses_bayar.php" method="POST">
    <input type="hidden" name="id_pesanan" value="<?= $row['id']; ?>">
    <button type="submit">Bayar Sekarang</button>
</form>

</body>
</html>
