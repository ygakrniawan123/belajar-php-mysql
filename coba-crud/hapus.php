<?php
include "koneksi.php";
require "functions.php";

// Periksa apakah parameter id dikirim
if (isset($_GET["id"])) {
    $id = ($_GET["id"]); // Konversi ID ke integer
    // Panggil fungsi hapus
    if (hapus($id) > 0) {
        echo "Data berhasil dihapus!";
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal dihapus!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
