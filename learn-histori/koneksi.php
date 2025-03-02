<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "db_streaming";



$conn = mysqli_connect($host, $user, $pw, $db);


if(!$conn){
    echo "koneksi gagaallll";
}


?>