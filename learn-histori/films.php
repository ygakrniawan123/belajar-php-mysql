<?php
session_start();
include "koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke login jika belum login
    exit;
}

$result = $conn->query("SELECT id, tittle FROM films");

echo "<h1>Daftar Film</h1>";

while ($movie = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($movie['tittle']) . "</h3>";
    echo "<a href='watch.php?movie_id=" . $movie['id'] . "'>Tonton</a>";
    echo "</div>";
}
?>
