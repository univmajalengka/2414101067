<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../img/".$gambar);

    $koneksi->query("INSERT INTO menu (nama,harga,gambar) VALUES('$nama','$harga','$gambar')");
    header("Location: menu.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Menu</title></head>
<body>
<h2>Tambah Menu</h2>
<form method="post" enctype="multipart/form-data">
  Nama: <input type="text" name="nama"><br>
  Harga: <input type="number" name="harga"><br>
  Gambar: <input type="file" name="gambar"><br>
  <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
