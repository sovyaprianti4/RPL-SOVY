<?php
session_start();
if (!isset($_SESSION['pelanggan'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pelanggan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Halo, <?= $_SESSION['nama']; ?></h2>

    <div class="menu">
        <a href="pesan.php">Pesan Jasa</a>
        <a href="riwayat.php">Riwayat Pesanan</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
