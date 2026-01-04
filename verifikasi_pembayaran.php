<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$status = $_GET['s'];

mysqli_query($koneksi,"
UPDATE pembayaran SET status='$status' WHERE id='$id'
");

header("location:pembayaran.php");
