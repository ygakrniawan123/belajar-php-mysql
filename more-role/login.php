<?php
include 'koneksi.php';
session_start(); // Memulai sesi

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan query dengan prepared statement
    $stmt = $conn->prepare("SELECT id, password, role FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Mengecek apakah username ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mengecek password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];
            
            // Redirect berdasarkan role
            if ($row['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
}
?>















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: background: rgb(195,34,80);
                background: -moz-linear-gradient(270deg, rgba(195,34,80,1) 0%, rgba(230,27,208,1) 100%);
                background: -webkit-linear-gradient(270deg, rgba(195,34,80,1) 0%, rgba(230,27,208,1) 100%);
                background: linear-gradient(270deg, rgba(195,34,80,1) 0%, rgba(230,27,208,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c32250",endColorstr="#e61bd0",GradientType=1);;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 14px;
            color: #333;
        }

        .form-container input,
        .form-container select {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #9c51a3;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #e992d3;
        }

        .form-container p {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login Pengguna</h2>
    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required size="20">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required size="20">
        <button type="submit" name="register">Login</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Register disini</a></p>
</div>

</body>
</html>
