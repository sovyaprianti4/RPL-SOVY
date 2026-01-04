<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Status Pesanan</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            width: 380px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        button {
            flex: 1;
            padding: 10px;
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #0b5ed7;
        }

        a {
            flex: 1;
            text-align: center;
            padding: 10px;
            background: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        a:hover {
            background: #5c636a;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit Status Pesanan</h2>

    <form action="update_status.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label>Status</label>
        <select name="status" required>
            <option value="Menunggu" <?= $data['status']=='Menunggu'?'selected':''; ?>>Menunggu</option>
            <option value="Diproses" <?= $data['status']=='Diproses'?'selected':''; ?>>Diproses</option>
            <option value="Selesai" <?= $data['status']=='Selesai'?'selected':''; ?>>Selesai</option>
        </select>

        <div class="btn-group">
            <button type="submit">Simpan</button>
            <a href="dashboard.php">Kembali</a>
        </div>
    </form>
</div>

</body>
</html>
