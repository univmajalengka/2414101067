# Laporan Deteksi Error & Perbaikan Program  

---

## 1. Error pada form-daftar.php
File: form-daftar.php

Jenis Error: Syntax Error (HTML)

Dampak: Browser masuk mode “quirks” dan tidak membaca HTML5 dengan benar.

Perbaikan: Mengubah DOCTYPE menjadi format HTML5 standar.

## 2. ERROR: Tag <option> tanpa atribut value
File: form-daftar.php

Jenis Error: Konsistensi Data

Dampak: Nilai yang dikirim tidak terdefinisi secara jelas.

Perbaikan: Menambahkan atribut value pada setiap opsi.

Bagian select hanya berisi beberapa agama (Islam, Kristen, Hindu, Budha, Atheis).

Sekarang sudah diperbaiki menjadi 6 agama resmi:
Islam, Kristen, Katolik, Hindu, Budha, Konghucu.

## 3. ERROR: Variabel PHP tanpa simbol dolar ($)
File: proses-pendaftaran-2.php

Kode Awal: sekolah = $_POST['sekolah_asal'];

Jenis Error: Fatal Syntax Error

Dampak: kode berhenti jalan karena salah penulisan.

Perbaikan: Menambahkan simbol dolar pada variabel.

Kode Benar: $sekolah = $_POST['sekolah_asal'];

## 4. ERROR: Keyword SQL Salah (VALUE harus VALUES)
File: proses-pendaftaran-2.php

Kode Awal:
... sekolah_asal) VALUE ('$nama', '$alamat', ...)

Jenis Error: SQL Syntax Error

Dampak: Query gagal dieksekusi sehingga data tidak masuk ke database.

Perbaikan: Mengubah VALUE menjadi VALUES.

Kode Benar:
... sekolah_asal) VALUES ('$nama', '$alamat', ...)

## 5. ERROR: Query SQL tidak aman (rentan SQL Injection)
File: proses-pendaftaran-2.php

Jenis Error: Security Vulnerability

Dampak: Dampak: Data bisa diubah atau diakses orang lain karena input user tidak aman. Jika tidak diperbaiki, database bisa disusupi.

Perbaikan: Mengganti query biasa menjadi Prepared Statement.

Kode Benar:
$sql = "INSERT INTO calon_siswa (...) VALUES (?, ?, ?, ?, ?)";
mysqli_stmt_bind_param(...);

## 6. ERROR: Typo pada redirect
File: proses-pendaftaran-2.php

Kode Awal: header('Location: indek.ph?status=gagal');

Jenis Error: Typo / Logic Error

Dampak: Browser diarahkan ke file yang tidak ada → Error 404.

Perbaikan: Memperbaiki nama file tujuan.

Kode Benar: header('Location: index.php?status=gagal');

## 7. ERROR: Placeholder Prepared Statement tidak lengkap
File: proses-pendaftaran-2.php

Jenis Error: Logic Error

Dampak: mysqli_stmt_prepare gagal karena placeholder tidak sesuai jumlah kolom.

Perbaikan: Menambahkan 5 tanda tanya agar cocok dengan jumlah kolom.

Kode Benar:
VALUES (?, ?, ?, ?, ?)

## 8. Struktur SQL (calon_siswa.sql)
Struktur tabel sudah benar, tidak ditemukan error sintaks.
Tidak diperlukan perbaikan besar.

## SELESAI
Semua error telah diperbaiki dan aplikasi dapat berjalan normal.
