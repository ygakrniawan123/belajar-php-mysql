<?php
include 'koneksi.php';

$stmt = $conn->prepare("SELECT id, nama_pengguna, username, password, di_buat FROM usr");
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User - smt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="table">
    <table class="table ">
        <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Password</th>
            <th>Tanggal Registrasi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_pengguna']); ?></td>
                <td><?= htmlspecialchars($row['username']); ?></td>
                <td><?= htmlspecialchars($row['password']); ?></td>
                <td><?= htmlspecialchars($row['di_buat']); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
