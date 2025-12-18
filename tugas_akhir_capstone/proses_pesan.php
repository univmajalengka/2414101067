<?php
include "koneksi.php";

$nama     = $_POST['nama'];
$hp       = $_POST['hp'];
$tanggal  = $_POST['tanggal'];
$hari     = $_POST['hari'];
$peserta  = $_POST['peserta'];
$harga    = $_POST['harga'];
$total    = $_POST['total'];

$query = "INSERT INTO pemesanan 
(nama, hp, tanggal, hari, peserta, harga, total)
VALUES
('$nama','$hp','$tanggal','$hari','$peserta','$harga','$total')";

mysqli_query($koneksi, $query);

echo "<script>
    alert('Pemesanan berhasil disimpan');
    window.location='pemesanan.php';
</script>";
?>
