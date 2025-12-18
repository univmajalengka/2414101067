<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM pemesanan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modifikasi Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- NAV -->
    <div style="margin-bottom:15px;">
        <a href="index.php" class="btn">← Kembali ke Beranda</a>
        <a href="pemesanan.php" class="btn">+ Tambah Pesanan</a>
    </div>

    <h2>Modifikasi Pesanan</h2>
    <p>Halaman ini digunakan untuk melihat, mengedit, dan menghapus data pesanan wisata.</p>

    <hr>

    <h3>Daftar Pesanan</h3>

    <table border="1" width="100%" cellpadding="8" cellspacing="0">
        <tr style="background:#e6e6e6;">
            <th>Nama</th>
            <th>Telp</th>
            <th>Peserta</th>
            <th>Hari</th>
            <th>Harga Paket</th>
            <th>Total Tagihan</th>
            <th>Aksi</th>
        </tr>

        <?php if(mysqli_num_rows($data) > 0){ ?>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['hp']; ?></td>
                <td><?= $row['peserta']; ?></td>
                <td><?= $row['hari']; ?></td>
                <td>Rp <?= number_format($row['harga']); ?></td>
                <td>Rp <?= number_format($row['total']); ?></td>
                <td>
                    <a href="edit_pesanan.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="hapus_pesanan.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Anda yakin akan menghapus pesanan ini?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7" style="text-align:center;">Belum ada data pesanan</td>
            </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>
