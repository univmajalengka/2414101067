<?php
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM saran ORDER BY dibuat_pada DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Saran</title>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Kelola Saran</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Dashboard</a>

    <div class="row">
        <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <!-- Nama pengirim -->
                        <h5 class="card-title"><?= htmlspecialchars($row['nama']); ?></h5>
                        <!-- Email pengirim -->
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($row['email']); ?></h6>
                        <!-- Isi pesan -->
                        <p class="card-text mt-2"><?= nl2br(htmlspecialchars($row['pesan'])); ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <?= date('d M Y H:i', strtotime($row['dibuat_pada'])); ?>
                        </small>
                        <a href="hapus_saran.php?id=<?= $row['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Hapus saran ini?')">Hapus</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
