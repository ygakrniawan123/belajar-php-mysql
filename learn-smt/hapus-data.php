<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('Data gagal dihapus!');</script>";
    }

    $stmt->close();
}

?>