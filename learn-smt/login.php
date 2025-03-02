<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit;
}

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menyiapkan query dengan prepare
    $stmt = $conn->prepare("SELECT id,password FROM usr WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['user_id'] = $row['id'];
            // header("Location: dashboard.php");
            echo "<script>alert('login berhasil kamu akan di lempar ke dashboard'); window.location.href='dashboard.php';</script>";
            exit;
        }else{
            echo  "Password salah";
        }
    }else{
        echo "Username tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
        background: rgb(195,191,34);
        background: -moz-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: -webkit-linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        background: linear-gradient(0deg, rgba(195,191,34,1) 0%, rgba(230,165,27,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c3bf22",endColorstr="#e6a51b",GradientType=1);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-form {
        height: 300px;
        width: 300px;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<body>
    <div class="login">
        <div class="login-form bg-light shadow-lg">
            <form action="" method="post">
                <div class="username mt-3">
                    <label for="" class="fw-bold text-warning">Username</label>
                    <input type="text" name="username" size="30" class="border border-warning form-control" autocomplete="off">
                </div>
                <div class="password mt-3">
                    <label for="" class="fw-bold text-warning">Password</label>
                    <input type="password" name="password" size="30" class="border border-warning form-control" autocomplete="off">
                </div>
                <div class="button mt-3">
                    <button class="btn btn-warning w-100" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>