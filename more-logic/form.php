<?php
// menangani files pada form
if(isset($_POST['gambar'])){
    $fileName = $_FILES['gambar']['name'];
    $fileErr = $_FILES['gambar']['error'];
    $fileSize= $_FILES['gambar']['size'];
    $fileTmp = $_FILES['gambar']['tmp_name'];

    // melakukan pengecekan jika gambar kosong
    if($fileErr == 4){
        echo "gambar tidak ada";
    }

    // menentukan hanya gambar yang dapat di upload
    $fileType = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $fileName);
    $extensiGambar = strtolower(end($extensiGambar));
    if(!in_array($extensiGambar, $fileType)){
        echo "Tipe file tidak diizinkan";
    }

    // memindahkan gambar ke direktori

    $newName = uniqid();
    $direktori = "cover/";
    $newNameFile = $direktori . $newName . '.' . $extensiGambar;

    if(move_uploaded_file($fileTmp, $newNameFile)){
        if($_SERVER['REQUEST_METHOD'] == "POST")
    }

}

?>















<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>more form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="nama">
                    <label for="">Nama :</label>
                    <input type="text" name="nama">
                </div>
                <div class="nisn">
                    <label for="">Nisn :</label>
                    <input type="text" name="nisn">
                </div>
                <div class="nama">
                    <label for="">gambar :</label>
                    <input type="file" name="gambar">
                </div>
                <div class="button">
                    <button class="btn btn-primary"  type="submit" name="simpan">SImpan</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>