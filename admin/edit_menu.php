<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "../koneksi.php";

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$gambar);
        $koneksi->query("UPDATE menu SET nama='$nama', harga='$harga', gambar='$gambar' WHERE id=$id");
    } else {
        $koneksi->query("UPDATE menu SET nama='$nama', harga='$harga' WHERE id=$id");
    }
    header("Location: menu.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Menu</title></head>
<body>
<h2>Edit Menu</h2>
<form method="post" enctype="multipart/form-data">
  Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
  Harga: <input type="number" name="harga" value="<?= $data['harga'] ?>"><br>
  Gambar: <input type="file" name="gambar"><br>
  <img src="../img/<?= $data['gambar'] ?>" width="70"><br>
  <button type="submit" name="update">Update</button>
</form>
</body>
</html>
