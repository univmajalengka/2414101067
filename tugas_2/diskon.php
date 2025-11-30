<?php
// ================================
// 1. Fungsi hitungDiskon()
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

// ================================
// 2. Eksekusi saat tombol diklik
// ================================
$hasil = "";
if (isset($_POST['proses'])) {
    $totalBelanja = $_POST['totalBelanja'];
    $diskon = hitungDiskon($totalBelanja);
    $totalBayar = $totalBelanja - $diskon;

    // hasil tampil setelah submit
    $hasil = "
        <div class='mt-4 p-4 bg-green-100 border border-green-300 rounded'>
            <p><b>Total Belanja:</b> Rp " . number_format($totalBelanja, 0, ',', '.') . "</p>
            <p><b>Diskon:</b> Rp " . number_format($diskon, 0, ',', '.') . "</p>
            <p><b>Total Bayar:</b> Rp " . number_format($totalBayar, 0, ',', '.') . "</p>
        </div>
    ";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Diskon</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>

<body class="bg-gray-200">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4 text-center">Menghitung Diskon</h2>

            <!-- Form Input -->
            <form method="POST">
                <label class="font-semibold">Total Belanja (Rp):</label>
                <input type="number" name="totalBelanja" required 
                       class="w-full p-2 border rounded mb-4">

                <button type="submit" name="proses"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    PROSES
                </button>
            </form>

            <!-- Hasil -->
            <?= $hasil ?>
        </div>
    </div>
</body>
</html>
