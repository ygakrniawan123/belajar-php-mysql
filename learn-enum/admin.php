<?php
// dashboard_admin.php
include 'session.php'; // Pastikan pengguna sudah login

if ($_SESSION['role'] != 'admin') {
    echo "Anda tidak memiliki akses ke halaman ini!";
    exit();
}

echo "Selamat datang di Dashboard Admin!";
?>
