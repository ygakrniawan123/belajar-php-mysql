<?php
include 'koneksi.php';

$limit = 2;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset
$offset = ($page - 1) * $limit;

// Ambil data dari database dengan LIMIT dan OFFSET
$result = $conn->query("SELECT * FROM article LIMIT $offset, $limit");

// Tampilkan data
while ($row = $result->fetch_assoc()) {
    echo "<h2>{$row['judul']}</h2>";
    echo "<p>{$row['konten']}</p>";
}

// Hitung total halaman
$total_data = $conn->query("SELECT COUNT(*) AS total FROM article")->fetch_assoc()['total'];
$total_pages = ceil($total_data / $limit);

// Tampilkan navigasi pagination
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
?>




?>