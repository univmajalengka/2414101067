<?php
session_start();

$menu = [
    ['id'=>1, 'nama'=>'Kwetiaw', 'harga'=>15000, 'gambar'=>'img/kwetiaw.jpg'],
    ['id'=>2, 'nama'=>'Sayur Lodeh', 'harga'=>12000, 'gambar'=>'img/sayur_lodeh.jpg'],
    ['id'=>3, 'nama'=>'Ayam Bakar', 'harga'=>20000, 'gambar'=>'img/ayam_bakar.jpg'],
    ['id'=>4, 'nama'=>'Pepes Ikan', 'harga'=>12000, 'gambar'=>'img/pepes_ikan.jpg'],
    ['id'=>5, 'nama'=>'Ceker Mercon', 'harga'=>15000, 'gambar'=>'img/ceker_mercon.jpg'],
    ['id'=>6, 'nama'=>'Teh Tarik', 'harga'=>7000, 'gambar'=>'img/teh_tarik.jpg'],
    ['id'=>7, 'nama'=>'Air', 'harga'=>5000, 'gambar'=>'img/air.jpg'],
    ['id'=>8, 'nama'=>'Es Teh', 'harga'=>5000, 'gambar'=>'img/es_teh.jpg'],
];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<?php include "navbar.php"; ?>
<h2>Menu Makanan & Minuman</h2>
<div class="row">
<?php foreach($menu as $m): ?>
  <div class="col-md-3">
    <div class="card mb-4">
      <img src="<?= $m['gambar'] ?>" class="card-img-top" style="height:200px;object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title"><?= $m['nama'] ?></h5>
        <p>Rp <?= number_format($m['harga'],0,",",".") ?></p>
        <form method="post" action="keranjang.php">
          <input type="hidden" name="id" value="<?= $m['id'] ?>">
          <input type="hidden" name="jumlah" value="1">
          <button type="submit" name="tambah" class="btn btn-primary">Tambah ke Keranjang</button>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
</body>
</html>
