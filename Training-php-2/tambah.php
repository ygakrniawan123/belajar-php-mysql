<?php
require 'koneksi.php';

if(isset($_POST["simpan"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $q2 = "INSERT INTO user(username,email) VALUES('$username','$email')";
    mysqli_query($conn, $q2);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>tambah data user</h1>
    <form action="" method="POST">
    <ul>
        <li>
            <label for="">username</label>
            <input type="text" name = "username">
        </li>
        <li>
            <label for="">email</label>
            <input type="email" name = "email">
        </li>
        <button type = "submit" name = "simpan">simpan</button>
    </ul>


    </form>
</body>

<style>
    li {
        text-decoration :none;
        list-style-type :none;
    }
</style>
</html>