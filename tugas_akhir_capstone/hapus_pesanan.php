<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id='$id'");

header("Location: modifikasi_pesanan.php");
?>
