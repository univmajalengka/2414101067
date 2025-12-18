<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-form">

    <div class="form-header">
        <h2>Form Pemesanan Paket Wisata</h2>
        <p>Silakan isi data pemesanan</p>
    </div>

    <form action="proses_pesan.php" method="post" onsubmit="return validasi()">

        <div class="form-grid">

            <div class="form-edit">
                <label>Nama Pemesan</label>
                <input type="text" name="nama" id="nama">
            </div>

            <div class="form-edit">
                <label>Nomor HP / Telp</label>
                <input type="text" name="hp" id="hp">
            </div>

            <div class="form-edit">
                <label>Tanggal Pesan</label>
                <input type="date" name="tanggal" id="tanggal">
            </div>

            <div class="form-edit">
                <label>Waktu Pelaksanaan (Hari)</label>
                <input type="number" name="hari" id="hari" min="1">
            </div>

            <div class="form-edit">
                <label>Jumlah Peserta</label>
                <input type="number" name="peserta" id="peserta" min="1">
            </div>

            <div class="form-edit">
                <label>Harga Paket Perjalanan</label>
                <input type="text" name="harga" id="harga" readonly>
            </div>

            <div class="form-edit">
                <label>Jumlah Tagihan</label>
                <input type="text" name="total" id="total" readonly>
            </div>

        </div>

        <div class="alert alert-info">
            <strong>Pelayanan:</strong><br>
            <label><input type="checkbox" class="layanan" value="1000000"> Penginapan (Rp 1.000.000)</label><br>
            <label><input type="checkbox" class="layanan" value="1200000"> Transportasi (Rp 1.200.000)</label><br>
            <label><input type="checkbox" class="layanan" value="500000"> Service / Makan (Rp 500.000)</label>
        </div>

        <div class="form-action">
    <a href="index.php" class="btn btn-secondary">
        ← Kembali ke Beranda
    </a>

    <button type="button" class="btn" onclick="hitung()">
        Hitung
    </button>

    <button type="submit" class="btn">
        Simpan
    </button>

    <a href="modifikasi_pesanan.php" class="btn">
    ✎ Edit Pesanan
    </a>
</div>


    </form>
</div>


<!-- ================= JAVASCRIPT ================= -->
<script>
function validasi() {
    let nama = document.getElementById("nama").value;
    let hp = document.getElementById("hp").value;
    let tanggal = document.getElementById("tanggal").value;
    let hari = document.getElementById("hari").value;
    let peserta = document.getElementById("peserta").value;
    let layanan = document.querySelectorAll(".layanan:checked");

    if (
        nama === "" ||
        hp === "" ||
        tanggal === "" ||
        hari === "" ||
        peserta === ""
    ) {
        alert("Semua data wajib diisi!");
        return false;
    }

    if (layanan.length === 0) {
        alert("Pilih minimal satu pelayanan!");
        return false;
    }

    return true;
}

function hitung() {
    let layanan = document.querySelectorAll(".layanan:checked");
    let harga = 0;

    layanan.forEach(function(item){
        harga += parseInt(item.value);
    });

    let hari = document.getElementById("hari").value;
    let peserta = document.getElementById("peserta").value;

    document.getElementById("harga").value = harga;
    document.getElementById("total").value = harga * hari * peserta;
}
</script>

</body>
</html>
