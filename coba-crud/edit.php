<?php
include "koneksi.php";

// Mendapatkan ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';
$error = '';

// Validasi ID
if ($id == '') {
    $error = "ID tidak ditemukan.";
} else {
    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" untuk integer
    $stmt->execute();
    $result = $stmt->get_result();
    $r1 = $result->fetch_assoc();

    if (!$r1) {
        $error = "Data tidak ditemukan.";
    } else {
        $Nama = $r1['Nama'];
        $NRP = $r1['NRP'];
        $Umur = $r1['Umur'];
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="tambah">
        <div class="tambah-item p-5 text-center">
            <div class="tittle"> 
                <h3>Edit Data</h3>
                <a href="index.php">
                    <button class="btn btn-warning">Kembali</button>
                </a>
            </div>
            <br>
            <div class="form p-3">
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php else: ?>
                    <form action="update.php" method="post">
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="text" name="Nama" id="Nama" class="form-control" value="<?php echo htmlspecialchars($Nama); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="NRP" class="form-label">NRP</label>
                            <input type="text" name="NRP" id="NRP" class="form-control" value="<?php echo htmlspecialchars($NRP); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="Umur" class="form-label">Umur</label>
                            <input type="number" name="Umur" id="Umur" class="form-control" value="<?php echo htmlspecialchars($Umur); ?>" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
