<?php
// Mengecek jika formulir sudah disubmit
if (isset($_POST['submit'])) {
    // Mendapatkan informasi file yang di-upload
    $file = $_FILES['fileToUpload'];

    // Menentukan folder tempat menyimpan file yang di-upload
    $uploadDirectory = 'upload/';
    $targetFile = $uploadDirectory . basename($file['name']);
    $uploadOk = true;  // Menandakan apakah file bisa di-upload

    // Mendapatkan ekstensi file
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Cek apakah file sudah ada
    if (file_exists($targetFile)) {
        echo "File sudah ada, silakan pilih file lain.<br>";
        $uploadOk = false;
    }

    // Cek ukuran file (maksimal 5MB)
    if ($file['size'] > 5000000) {
        echo "File terlalu besar, maksimal 5MB.<br>";
        $uploadOk = false;
    }

    // Cek jenis file (hanya gambar)
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Hanya file gambar yang diperbolehkan: JPG, JPEG, PNG, GIF.<br>";
        $uploadOk = false;
    }

    // Jika tidak ada kesalahan, coba upload file
    if ($uploadOk) {
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "File berhasil di-upload: " . htmlspecialchars(basename($file['name'])) . "<br>";
            echo "<h3>Gambar yang di-upload:</h3>";
            echo "<img src='$targetFile' alt='Uploaded Image' style='max-width: 100%; height: auto;'><br>";
        } else {
            echo "Terjadi kesalahan saat meng-upload file.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
</head>
<body>
    <h1>Upload Gambar</h1>

    <!-- Form untuk upload file -->
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Pilih gambar untuk di-upload:</label><br><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        <input type="submit" value="Upload Gambar" name="submit">
    </form>
</body>
</html>
