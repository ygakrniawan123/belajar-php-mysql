<?php
include 'koneksi.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);

        // prepare statemwnt
        $stmt = $conn->prepare("INSERT INTO users(nama, email) VALUES(?,?)");
        $stmt->bind_param("ss", $nama, $email);

        if ($stmt->execute()){
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Data gagal ditambahkan!');</script>";
        }
        $stmt->close();

}



?>



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
                <div class="nama">
                    <label for="" class="fw-bold text-warning">Nama</label>
                    <input type="text" name="nama" size="30" class="border border-warning form-control">
                </div>
                <div class="email mt-3">
                    <label for="" class="fw-bold text-warning">Email</label>
                    <input type="email" name="email" size="30" class="border border-warning form-control">
                </div>
                <div class="button mt-3">
                    <button class="btn btn-warning w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
