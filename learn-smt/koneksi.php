<?php

$host = "localhost";
$user = "root";
$pw = "";
$db_name = "trn-stmt";


$conn = mysqli_connect($host, $user, $pw, $db_name);

if(!$conn){
    echo "gagal konekkk";
}


?>