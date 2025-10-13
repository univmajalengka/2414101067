<?php
include "koneksi.php";

if(isset($_POST['kirim'])){
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $pesan  = $_POST['pesan'];

    $koneksi->query("INSERT INTO saran(nama,email,pesan) VALUES('$nama','$email','$pesan')");
    echo "<script>alert('Saran terkirim!'); window.location='kontak.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak - Nestly</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Nestly</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
        <li class="nav-item"><a class="nav-link active" href="kontak.php">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="keranjang.php">Keranjang</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container mt-4">
  <h2>Form Saran</h2>
  <form method="post">
    <div class="mb-3">
      <input type="text" name="nama" class="form-control" placeholder="Nama" required>
    </div>
    <div class="mb-3">
      <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="mb-3">
      <textarea name="pesan" class="form-control" placeholder="Pesan / Saran" required></textarea>
    </div>
    <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
  </form>
</div>

</body>
</html>
