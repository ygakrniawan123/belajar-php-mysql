<?php
include 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM users");
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}



// cari pengguna
if (isset($_GET['keyword'])) {
  $keyword = '%' . $_GET['keyword'] . '%'; 

  // Query dengan prepare statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE nama LIKE ? OR email LIKE ?");
  $stmt->bind_param("ss", $keyword, $keyword);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();
}
?>



<style>


  body {
    background: rgb(195,191,34);
        background: -moz-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: -webkit-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c3bf22",endColorstr="#e6a51b",GradientType=1);
        height: 100vh;
  }
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn - Stmt - prepare statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="table">
      <div class="tittle mt-2">
        <h1 class="fw-bold text-warning  text-center">Data User</h1>
      </div>
      <div class="seacrh ms-5">
      <form class="d-flex" role="search" style="width: 20%;">
        <input class="form-control me-2" type="search" name="keyword" placeholder="golek opo??" aria-label="Search" autofocus>
        <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
      </form>

      </div>
        <div class="table-item p-5 mx-auto">
            <table class="table table-bordered table-striped table-hover shadow-lg">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Di Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                  <?php
                  $id = 1;
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>
                                  <td>$id</td>
                                  <td>{$row['nama']}</td>
                                  <td>{$row['email']}</td>
                                  <td>{$row['di_buat']}</td>
                                  <td>
                                    <a href='update-data.php?id={$row['id']}'>
                                      <button class='btn btn-primary'>Edit</button>
                                    </a>
                                    <a href='hapus-data.php?id={$row['id']}'>
                                      <button class='btn btn-danger'>Hapus</button>
                                    </a>
                                  </td>
                                </tr>";
                      $id++;
                      }
                  } else {
                      echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                  }
                  ?>
                </tbody>  
            </table>
            <a href="tambah-data.php" class="shadow-lg">
              <button class="btn btn-warning text-dark fw-bold ">Tambah Data</button>
              </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
