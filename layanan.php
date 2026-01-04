<?php
include "../config/koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM layanan");
?>

<h2>Data Layanan</h2>
<table border="1">
<tr>
    <th>Nama Layanan</th>
    <th>Harga</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['nama_layanan']; ?></td>
    <td><?= $row['harga']; ?></td>
</tr>
<?php } ?>
</table>
