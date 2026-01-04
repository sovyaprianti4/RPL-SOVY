<?php
include "../config/koneksi.php";

$query = mysqli_query($koneksi,"
SELECT pesanan.*, pelanggan.nama, layanan.nama_layanan 
FROM pesanan
JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id
JOIN layanan ON pesanan.id_layanan = layanan.id
");
?>

<h2>Data Pesanan</h2>
<table border="1">
<tr>
    <th>Pelanggan</th>
    <th>Layanan</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nama_layanan']; ?></td>
    <td><?= $row['tanggal']; ?></td>
    <td><?= $row['status']; ?></td>
</tr>
<?php } ?>
</table>
