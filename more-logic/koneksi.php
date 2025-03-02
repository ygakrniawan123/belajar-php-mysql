<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "more-form";


$conn = mysqli_connect($host, $user, $password, $db_name);


if(!$conn){
    echo "gagal konek";
}


?>