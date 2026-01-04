<?php
include "../config/koneksi.php";

$id_pesanan = $_POST['id_pesanan'];

mysqli_query($koneksi, "
    UPDATE pesanan 
    SET status_pembayaran = 'Lunas' 
    WHERE id = '$id_pesanan'
");

header("Location: riwayat.php");
