<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "../koneksi.php";

$id = $_GET['id'];
$koneksi->query("DELETE FROM menu WHERE id=$id");
header("Location: menu.php");
