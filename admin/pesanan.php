<?php
include '../koneksi.php'; // pastikan koneksi benar

$query = mysqli_query($koneksi, "SELECT * FROM pesanan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Pesanan</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Dashboard</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>No HP</th>
                <th>Tanggal Kunjungan</th>
                <th>Total</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_pemesan']; ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td><?= $row['tanggal_kunjungan']; ?></td>
                    <td><?= $row['total']; ?></td>
                    <td><?= $row['dibuat_pada']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
