<?php
// ================================
// Fungsi hitungDiskon
// ================================
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        return $totalBelanja * 0.10; // 10%
    } elseif ($totalBelanja >= 50000) {
        return $totalBelanja * 0.05; // 5%
    } else {
        return 0; // tidak ada diskon
    }
}

// Contoh eksekusi
$totalBelanja = 120000;
$diskon = hitungDiskon($totalBelanja);
$totalBayar = $totalBelanja - $diskon;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <h2 class="judul">Perhitungan Diskon</h2>

    <form method="POST" class="form-box">
        <label>Total Belanja (Rp)</label>
        <input type="number" name="totalBelanja" required placeholder="Masukkan total belanja">
        <button type="submit" class="btn">Hitung Diskon</button>
    </form>

    <?php
    if (isset($_POST['totalBelanja'])) {
        $totalBelanja = $_POST['totalBelanja'];
        $diskon = hitungDiskon($totalBelanja);
        $totalBayar = $totalBelanja - $diskon;

        echo "<div class='hasil'>";
        echo "<h3>Hasil Perhitungan</h3>";
        echo "<p>Total Belanja : <b>Rp " . number_format($totalBelanja, 0, ',', '.') . "</b></p>";
        echo "<p>Diskon : <b>Rp " . number_format($diskon, 0, ',', '.') . "</b></p>";
        echo "<p>Total Bayar : <b>Rp " . number_format($totalBayar, 0, ',', '.') . "</b></p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
