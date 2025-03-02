<?php
include 'konekssi.php';

// Proses mendapatkan id dan menampilkan pada url
$id_film = $_GET['id_film'] ?? NULL;
$id_deskripsi = $_GET['id_deskripsi'] ?? NULL;

// Query untuk mengambil deskripsi berdasarkan id_film dan id_deskripsi
if ($id_film && $id_deskripsi) {
    $descData = "SELECT  deskripsi.Judul_deskripsi, deskripsi.Sutradara, deskripsi.Mc
FROM film
INNER JOIN deskripsi ON film.Id_deskripsi = deskripsi.Id_deskripsi
WHERE film.Id_film = 1 AND deskripsi.Id_deskripsi = 1";

    $stmt = $conn->prepare($descData);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ada
    if ($result->num_rows > 0) {
        $rowData = $result->fetch_assoc();
    } else {
        $rowData = null;
    }
} else {
    $rowData = null;
}


// Query untuk menampilkan data film
$stmt = $conn->prepare("SELECT * FROM film");
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- table -->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $id = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $id++; ?></td> <!-- Menampilkan Id -->
                <td><?php echo $row['Nama']; ?></td> <!-- Menampilkan Nama -->
                <td>
                    <a href="desc.php?id_film=<?php echo $row['Id_film']; ?>&id_deskripsi=<?php echo $row['Id_deskripsi']; ?>" class="btn btn-warning text-dark" data-bs-target="#Modal" data-bs-toggle="modal">Lihat deskripsi</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deskripsi Film</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($rowData) { ?>
                        <h6>Judul deskripsi</h6>
                        <p><?php echo $rowData['Judul_deskripsi']; ?></p>

                        <h6>Sutradara</h6>
                        <p><?php echo $rowData['Sutradara']; ?></p>

                        <h6>Mc</h6>
                        <p><?php echo $rowData['Mc']; ?></p>
                    <?php } else { ?>
                        <p>Deskripsi tidak ditemukan.</p>
                    <?php } ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
