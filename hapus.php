<?php
include "../config/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pesanan WHERE id='$id'");

header("Location: dashboard.php");
