<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nestly - Kedai Rumahan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .jumbotron { padding: 100px 20px; text-align: center; }
    footer { background: #212529; color: white; padding: 15px; text-align: center; }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Nestly</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="keranjang.php">Keranjang</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Jumbotron --> 
<section class="jumbotron d-flex align-items-center text-center text-white" 
         style="height: 100vh; background: url('img/bg.jpg') no-repeat center center/cover;">
  <div class="container" style="background: rgba(0,0,0,0.5); padding: 30px; border-radius: 10px;">
    <h1 class="display-4 fw-bold">Selamat Datang di Nestly</h1>
    <p class="lead">
      Nestly adalah kedai makanan rumahan yang menghadirkan cita rasa sederhana namun penuh makna, 
      seperti masakan di meja keluarga.  
      Setiap hidangan kami diracik dengan bahan segar dan sentuhan hati, bukan hanya untuk mengenyangkan, 
      tetapi juga untuk membawa rasa hangat dan nostalgia.
    </p>
    <a href="menu.php" class="btn btn-warning btn-lg mt-3">🍴 Lihat Menu</a>
  </div>
</section>
