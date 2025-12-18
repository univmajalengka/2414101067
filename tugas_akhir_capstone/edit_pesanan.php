<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $hp      = mysqli_real_escape_string($koneksi, $_POST['hp']);
    $hari    = (int) $_POST['hari'];
    $peserta = (int) $_POST['peserta'];
    $harga   = (int) $_POST['harga'];
    $total   = (int) $_POST['total'];

    mysqli_query($koneksi, "UPDATE pemesanan SET
        nama='$nama',
        hp='$hp',
        hari='$hari',
        peserta='$peserta',
        harga='$harga',
        total='$total'
        WHERE id='$id'
    ");

    header("Location: edit_pesanan.php?id=$id&status=sukses");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-card">

    <div class="form-header">
        <h2>Modifikasi Pesanan</h2>
        <p>Perbarui data pemesanan paket wisata</p>

        <a href="index.php" class="btn">← Beranda</a>
        <a href="modifikasi_pesanan.php" class="btn">← Daftar Pesanan</a>
    </div>

    <?php if(isset($_GET['status'])){ ?>
        <div class="alert alert-success">
            ✅ Data pesanan berhasil diperbarui.

            <div style="margin-top:15px;">
                <a href="modifikasi_pesanan.php" class="btn">Lihat Daftar Pesanan</a>
                <a href="index.php" class="btn">Kembali ke Beranda</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            Silakan periksa data sebelum menyimpan perubahan.
        </div>
    <?php } ?>

    <form method="post" class="form-edit">

        <div class="form-grid">
            <div>
                <label>Nama Pemesan</label>
                <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
            </div>

            <div>
                <label>Nomor Telp</label>
                <input type="text" name="hp" value="<?= $row['hp']; ?>" required>
            </div>

            <div>
                <label>Jumlah Hari</label>
                <input type="number" name="hari" value="<?= $row['hari']; ?>" required oninput="hitungEdit()">
            </div>

            <div>
                <label>Jumlah Peserta</label>
                <input type="number" name="peserta" value="<?= $row['peserta']; ?>" required oninput="hitungEdit()">
            </div>

            <div>
                <label>Harga Paket</label>
                <input type="number" name="harga" value="<?= $row['harga']; ?>" required oninput="hitungEdit()">
            </div>

            <div>
                <label>Total Tagihan</label>
                <input type="number" name="total" value="<?= $row['total']; ?>" readonly required>
            </div>
        </div>

        <div class="form-action">
            <button type="submit" name="update" class="btn">
                Simpan Perubahan
            </button>
            <a href="modifikasi_pesanan.php" class="btn btn-secondary">
                Batal
            </a>
        </div>

    </form>

</div>

<!-- ================= JS AUTO HITUNG ================= -->
<script>
function hitungEdit() {
    let harga   = document.querySelector('input[name="harga"]').value || 0;
    let hari    = document.querySelector('input[name="hari"]').value || 0;
    let peserta = document.querySelector('input[name="peserta"]').value || 0;

    document.querySelector('input[name="total"]').value = harga * hari * peserta;
}

// AUTO HITUNG SAAT HALAMAN EDIT DIBUKA
window.onload = function () {
    hitungEdit();
};
</script>

</body>
</html>
