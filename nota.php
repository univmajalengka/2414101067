<?php
include "koneksi.php";
$id = $_GET['id'];
$pesanan = $koneksi->query("SELECT * FROM pesanan WHERE id=$id")->fetch_assoc();
$detail = $koneksi->query("SELECT dp.*, m.nama 
                           FROM detail_pesanan dp 
                           JOIN menu m ON dp.menu_id=m.id 
                           WHERE pesanan_id=$id");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Nota Pesanan</title>
</head>
<body onload="window.print()">
<h2>Nota Pesanan</h2>
<p>Nama: <?= $pesanan['nama_pemesan'] ?></p>
<p>HP: <?= $pesanan['no_hp'] ?></p>
<p>Tanggal: <?= $pesanan['tanggal_kunjungan'] ?></p>
<hr>
<table border="1" cellpadding="5">
  <tr><th>Menu</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th></tr>
  <?php while($r=$detail->fetch_assoc()): ?>
  <tr>
    <td><?= $r['nama'] ?></td>
    <td><?= $r['jumlah'] ?></td>
    <td><?= $r['harga'] ?></td>
    <td><?= $r['jumlah']*$r['harga'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>
<h3>Total: Rp <?= number_format($pesanan['total'],0,",",".") ?></h3>
</body>
</html>
