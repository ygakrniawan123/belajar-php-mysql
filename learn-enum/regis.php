
<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];


    $stmt = $conn->prepare("INSERT INTO usr_db(username, password, role) VALUES(?,?,?)");
    $stmt->bind_param("sss", $username, $password, $role);


    if($stmt->execute()){
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login.php';</script>";
    }else{
        echo "<script>alert('Pendaftaran gagall');</script>";
    }
} 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
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
    <h2>Registrasi Pengguna</h2>
    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required size="20">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required size="20">
        <select name="role" id="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
</div>

</body>
</html>
