<?php
session_start();
// 1. Cek dulu apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // kalau belum, lempar ke login
    exit;
}
include "../koneksi.php"; // 2. Hubungkan ke database

// 3. Ambil ringkasan data dari database
$total_menu = $koneksi->query("SELECT COUNT(*) as c FROM menu")->fetch_assoc()['c'];
$total_pesanan = $koneksi->query("SELECT COUNT(*) as c FROM pesanan")->fetch_assoc()['c'];
$total_saran = $koneksi->query("SELECT COUNT(*) as c FROM saran")->fetch_assoc()['c'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <!-- 4. Load Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 5. Load CSS tambahan khusus admin -->
  <link href="admin.css" rel="stylesheet">
</head>
<body>
  <!-- 6. Navbar untuk admin -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Panel Admin - Nestly</span>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </nav>

  <!-- 7. Isi Dashboard -->
  <div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>
    <div class="row">
      <!-- Kotak ringkasan Menu -->
      <div class="col-md-4">
        <div class="card text-center shadow box">
          <div class="card-body">
            <h4>Total Menu</h4>
            <p class="display-6"><?= $total_menu ?></p>
            <a href="menu.php" class="btn btn-primary">Kelola Menu</a>
          </div>
        </div>
      </div>
      <!-- Kotak ringkasan Pesanan -->
      <div class="col-md-4">
        <div class="card text-center shadow box">
          <div class="card-body">
            <h4>Total Pesanan</h4>
            <p class="display-6"><?= $total_pesanan ?></p>
            <a href="pesanan.php" class="btn btn-success">Lihat Pesanan</a>
          </div>
        </div>
      </div>
      <!-- Kotak ringkasan Saran -->
      <div class="col-md-4">
        <div class="card text-center shadow box">
          <div class="card-body">
            <h4>Total Saran</h4>
            <p class="display-6"><?= $total_saran ?></p>
            <a href="saran.php" class="btn btn-warning">Lihat Saran</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
