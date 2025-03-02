<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // Hash password
    $has_pw = password_hash($password, PASSWORD_DEFAULT);

    // Menyiapkan query dengan prepare statement untuk cek apakah username sudah ada di database atau belum
    $stmt = $conn->prepare("SELECT id FROM usr WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // jika usernmae sudah ada
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar! Coba username lain.');</script>";
    } else {
        // Jika username belum ada, proses registrasi
        $stmt = $conn->prepare("INSERT INTO usr(nama_pengguna, username, password, di_buat) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $nama_pengguna, $username, $has_pw);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal registrasi, coba lagi.');</script>";
        }
    }

    $stmt->close();
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi -  stmt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah-data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
        background: rgb(195,191,34);
        background: -moz-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: -webkit-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c3bf22",endColorstr="#e6a51b",GradientType=1);
        height: 100vh;
        display: flex;
        justify-content: center;

        align-items: center;
    }

    .tambah-data-item {
        height: 300px;
        width: 300px;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<body>
    <div class="tambah">
        <div class="tambah-data-item bg-light shadow-lg">
            <form action="" method="post">
                <div class="nama_pemgguna">
                    <label for="" class="fw-bold text-warning">Nama Pemgguna</label>
                    <input type="text" name="nama_pengguna" size="30" class="border border-warning form-control">
                </div>
                <div class="usrname mt-3">
                    <label for="" class="fw-bold text-warning">Username</label>
                    <input type="text" name="username" size="30" class="border border-warning form-control" autocomplete="off">
                </div>
                <div class="pw mt-3">
                    <label for="" class="fw-bold text-warning">password</label>
                    <input type="password" name="password" size="30" class="border border-warning form-control" autocomplete="off">
                </div>
                <div class="button mt-3">
                    <button class="btn btn-warning w-100">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>