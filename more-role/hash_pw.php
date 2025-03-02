<?php
include 'koneksi.php';

// Tentukan username yang ingin di-update
$username = "admin"; // Ganti dengan username admin Anda
$newPassword = "admin123"; // Ganti dengan password yang sudah ada sebelumnya

// Hash password
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Update password ke database
$stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashedPassword, $username);

if ($stmt->execute()) {
    echo "Password berhasil di-hash untuk username $username.";
} else {
    echo "Gagal meng-hash password: " . $conn->error;
}
?>
