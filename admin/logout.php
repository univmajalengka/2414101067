<?php
session_start();
session_destroy(); // hapus session login
header("Location: login.php");
exit;
