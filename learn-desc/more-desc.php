<?php
// koneksi ke database
include 'konekssi.php';

// query untuk mendapatkan id dekripsi
$descData = null;
$Id_desc = $_GET['id_desc'] ?? NULL;
// menjalankan query ketika id berhasil di dapatkan
if($Id_desc){
    $stmt = $conn->prepare("SELECT * FROM deskripsi WHERE Id_deskripsi = ?");
    $stmt->bind_param("i", $Id_desc);
    $stmt->execute();
    $descData = $stmt->get_result()->fetch_assoc();
    if (!$descData) {
        echo "Data tidak ditemukan untuk ID: $Id_desc";
    }

}

// query untuk mendapatkan data film
$stmt = $conn->prepare("SELECT * FROM film");
$stmt->execute();
$rowFilm = $stmt->get_result();



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
    while ($row = $rowFilm->fetch_assoc()) { 
    ?>
    <tr>
        <td><?php echo $id++; ?></td>
        <td><?php echo $row['Nama']; ?></td>
        <td>
            <a href="more-desc.php?id_desc=<?php echo $row['Id_deskripsi']; ?>" 
               class="btn btn-light shadow-sm" 
               data-bs-target="#Modal" data-bs-toggle="modal">
               Lihat Deskripsi
            </a>
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
                  <div>
                    <h6>Judul Deksripsi</h6>
                    <p><?php  echo $descData['Judul_deskripsi'];?></p>
                  </div>
                  <div>
                    <h6>Sutradara</h6>
                    <p><?php  echo $descData['Sutradara'];?></p>
                  </div>
                  <div>
                    <h6>Mc</h6>
                    <p><?php  echo $descData['Mc'];?></p>
                  </div>
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
