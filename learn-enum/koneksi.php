<?php
$host = "localhost";
$usr = "root";
$pw = "";
$db= "users_db";


$conn = mysqli_connect($host, $usr, $pw, $db);

if(!$conn){
    echo "tidakkk konekk";
}


?>