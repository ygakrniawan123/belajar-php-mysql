<?php

session_start();
include "koneksi.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();



    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
               echo "Login berhasil! Selamat datang, " . $user['username'] . ".";
        header("Location: films.php"); // Arahkan ke halaman daftar film
        exit;
    }else{
        echo "username atau password salah";
    }

    $stmt->close();
}







?>






















<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(34,195,180);
background: -moz-linear-gradient(270deg, rgba(34,195,180,1) 0%, rgba(27,31,230,1) 100%);
background: -webkit-linear-gradient(270deg, rgba(34,195,180,1) 0%, rgba(27,31,230,1) 100%);
background: linear-gradient(270deg, rgba(34,195,180,1) 0%, rgba(27,31,230,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#22c3b4",endColorstr="#1b1fe6",GradientType=1);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login {
            width: 300px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px #000;
            text-align: center;
        }
        .login input[type="text"],
        .login input[type="password"] {
            width: 90%;
            padding: 15px;
            margin: 15px 0;
            border: 2px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }
        .login input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            border: none;
            border-radius: 10px;
            background: #007bff; /* Changed to a more vibrant blue */
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

