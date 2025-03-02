<!-- <?php
// require "functions.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $Nama = $_POST["Nama"];
//     $NRP = $_POST["NRP"];
//     $Umur = $_POST["Umur"];

    // // Menggunakan prepared statement untuk keamanan
    // $stmt = $conn->prepare("INSERT INTO mahasiswa (Nama, NRP, Umur) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $Nama, $NRP, $Umur); // 's' untuk string, 'i' untuk integer

    // if ($stmt->execute()) {
  
    //     header("location: index.php");
    // } else {
        
    //     echo "Data Gagal Disimpan!";
    // }
    // $stmt->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="tambah">
      <div class="tambah-item p-5 text-center">
        <div class="form p-3">
          <form action="" method="post">
            <div class="mb-3">
              <label for="Nama" class="form-label">Nama</label>
              <input type="text" name="Nama" id="Nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="NRP" class="form-label">NRP</label>
              <input type="text" name="NRP" id="NRP" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="Umur" class="form-label">Umur</label>
              <input type="number" name="Umur" id="Umur" class="form-control" required>
            </div>
            <button class="btn btn-primary" type="submit">Tambah</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html> -->
