<?php

include('koneksi.php');


if(isset($_POST['login'])){
    
}


?>






<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .login {
            width: 300px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000;
        }
        .login input[type="text"],
        .login input[type="password"] {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: #2ecc71;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="process_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" name="login">
        </form>
    </div>
</body>
</html>
