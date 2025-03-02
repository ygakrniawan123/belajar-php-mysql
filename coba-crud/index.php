<?php
require "functions.php";

$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="table-title mb-3">
            <h3>Table Mahasiswa</h3>
        </div>
        <div class="action mb-3">
            <a href="tambah-2.php"><button class="btn btn-primary">Tambah Data</button></a>
        </div>
        <div class="table-item">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NRP</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    <?php foreach($mahasiswa as $row) { ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                            <td><?php echo htmlspecialchars($row["nrp"]); ?></td>
                            <td><?php echo htmlspecialchars($row["umur"]); ?></td>
                            <td> 
                                <div class="d-flex gap-1">
                                <div>
                            </div>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-danger">Hapus</button></a>
                            <a href="edit.php?id=<?php echo  $row['id'];  ?>"><button class="btn btn-primary">Edit</button></a>
                        </td>
                        </tr>
                        <?php $id++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
