<?php
include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; padding:30px; }
        .container { background:#fff; padding:20px; border-radius:10px; }
        table { width:100%; border-collapse:collapse; margin-top:15px; }
        th, td { border:1px solid #ddd; padding:10px; text-align:left; }
        th { background:#0d6efd; color:#fff; }
        a.btn { padding:6px 10px; border-radius:5px; color:#fff; text-decoration:none; }
        .add { background:#198754; }
        .edit { background:#0d6efd; }
        .hapus { background:#dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pelanggan</h2>
    <a href="tambah_pelanggan.php" class="btn add">+ Tambah Pelanggan</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($p=mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $p['nama']; ?></td>
            <td><?= $p['email']; ?></td>
            <td><?= $p['alamat']; ?></td>
            <td><?= $p['no_hp']; ?></td>
            <td>
                <a href="edit_pelanggan.php?id=<?= $p['id']; ?>" class="btn edit">Edit</a>
                <a href="hapus_pelanggan.php?id=<?= $p['id']; ?>" class="btn hapus"
                   onclick="return confirm('Hapus pelanggan?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
