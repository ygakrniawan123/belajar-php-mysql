<?php
// homepage.php
include 'session.php'; // Pastikan pengguna sudah login

if ($_SESSION['role'] != 'user') {
    echo "Anda tidak memiliki akses ke halaman ini!";
    exit();
}

echo "Selamat datang di halaman utama!";
?>
