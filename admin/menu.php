<?php
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Menu</title>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Kelola Menu</h2>
    <a href="tambah_menu.php" class="btn btn-primary mb-3">+ Tambah Menu</a>
    <a href="index.php" class="btn btn-secondary mb-3">Dashboard</a>

    <div class="row">
        <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- ✅ Tag gambar -->
                    <img src="../img/<?= $row['gambar']; ?>" 
                         class="card-img-top" 
                         alt="<?= $row['nama']; ?>" 
                         style="height:180px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama']; ?></h5>
                        <p class="card-text">Rp <?= number_format($row['harga'],0,',','.'); ?></p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="edit_menu.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_menu.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus menu ini?')">Hapus</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
