<?php
session_start();
include "../config/koneksi.php";

$id_pelanggan = $_SESSION['id_pelanggan'];

$query = mysqli_query($koneksi, "
    SELECT pesanan.*, layanan.nama_layanan, layanan.harga 
    FROM pesanan 
    JOIN layanan ON pesanan.id_layanan = layanan.id
    WHERE pesanan.id_pelanggan = '$id_pelanggan'
    ORDER BY pesanan.tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Riwayat Pesanan</h2>

<table class="table">
    <tr>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Pembayaran</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $row['nama_layanan']; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td>
            <span class="status"><?= $row['status']; ?></span>
        </td>
        <td>
            <span class="badge <?= $row['status_pembayaran'] == 'Lunas' ? 'success' : 'danger'; ?>">
                <?= $row['status_pembayaran']; ?>
            </span>
        </td>
        <td>
            <?php if ($row['status_pembayaran'] == 'Belum') { ?>
                <a href="bayar.php?id=<?= $row['id']; ?>" class="btn">Bayar</a>
            <?php } else { ?>
                -
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
