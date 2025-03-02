<?php
session_start();  // Memulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Arahkan ke halaman login jika belum login
    exit;
}

echo "Selamat datang, Anda sudah login!";

// Menambahkan tombol logout
echo '<br><a href="logout.php">Logout</a>';
?>
