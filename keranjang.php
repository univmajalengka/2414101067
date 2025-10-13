<?php
session_start();
include "koneksi.php";

// kalau keranjang belum ada, buat kosong
if(!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Tambah ke keranjang
if(isset($_POST['tambah'])){
    $id = $_POST['id'];
    $jumlah = (int)$_POST['jumlah'];
    $_SESSION['keranjang'][$id] = ($_SESSION['keranjang'][$id] ?? 0) + $jumlah;
    header("Location: keranjang.php");
    exit;
}

// Kurangi jumlah
if(isset($_POST['kurang'])){
    $id = $_POST['id'];
    if(isset($_SESSION['keranjang'][$id])){
        $_SESSION['keranjang'][$id]--;
        if($_SESSION['keranjang'][$id] <= 0){
            unset($_SESSION['keranjang'][$id]);
        }
    }
    header("Location: keranjang.php");
    exit;
}

// Hapus item
if(isset($_POST['hapus'])){
    $id = $_POST['id'];
    unset($_SESSION['keranjang'][$id]);
    header("Location: keranjang.php");
    exit;
}

// Simpan pesanan
if(isset($_POST['checkout'])){
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $tanggal = $_POST['tanggal'];

    $total = 0;
    foreach($_SESSION['keranjang'] as $id=>$jumlah){
        $q = $koneksi->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
        $total += $q['harga'] * $jumlah;
    }

    $koneksi->query("INSERT INTO pesanan(nama_pemesan,no_hp,tanggal_kunjungan,total) 
                     VALUES('$nama','$hp','$tanggal',$total)");
    $pesanan_id = $koneksi->insert_id;

    foreach($_SESSION['keranjang'] as $id=>$jumlah){
        $q = $koneksi->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
        $harga = $q['harga'];
        $koneksi->query("INSERT INTO detail_pesanan(pesanan_id,menu_id,jumlah,harga) 
                         VALUES($pesanan_id,$id,$jumlah,$harga)");
    }

    $_SESSION['keranjang'] = [];
    header("Location: nota.php?id=".$pesanan_id);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Keranjang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<?php include "navbar.php"; ?>
<h2>Keranjang</h2>
<form method="post">
<table class="table">
  <tr><th>Nama Menu</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th><th>Aksi</th></tr>
  <?php
  $total=0;
  if(!empty($_SESSION['keranjang'])):
    foreach($_SESSION['keranjang'] as $id=>$jumlah):
      $q=$koneksi->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
      $sub=$q['harga']*$jumlah;
      $total+=$sub;
  ?>
  <tr>
    <td><?= $q['nama'] ?></td>
    <td>
      <form method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" name="kurang" class="btn btn-sm btn-warning">-</button>
      </form>
      <?= $jumlah ?>
      <form method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="jumlah" value="1">
        <button type="submit" name="tambah" class="btn btn-sm btn-success">+</button>
      </form>
    </td>
    <td><?= number_format($q['harga'],0,",",".") ?></td>
    <td><?= number_format($sub,0,",",".") ?></td>
    <td>
      <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" name="hapus" class="btn btn-sm btn-danger">Hapus</button>
      </form>
    </td>
  </tr>
  <?php endforeach; else: ?>
    <tr><td colspan="5" class="text-center">Keranjang masih kosong</td></tr>
  <?php endif; ?>
</table>

<h4>Total: Rp <?= number_format($total,0,",",".") ?></h4>

<?php if(!empty($_SESSION['keranjang'])): ?>
<div class="mb-3"><input class="form-control" name="nama" placeholder="Nama Pemesan" required></div>
<div class="mb-3"><input class="form-control" name="hp" placeholder="Nomor HP" required></div>
<div class="mb-3"><input type="date" class="form-control" name="tanggal" required></div>
<button type="submit" name="checkout" class="btn btn-primary">Checkout & Cetak Nota</button>
<?php endif; ?>
</form>
</body>
</html>
