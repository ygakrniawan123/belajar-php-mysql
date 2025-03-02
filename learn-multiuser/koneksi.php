<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "multiuser";

$conn = mysqli_connect($host, $user, $pw, $db);

if(!$conn){
    echo "konek berhasil";
}else {
    echo "konek gagal";
}

?>