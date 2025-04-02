<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if (isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query = mysqli_query($koneksi, "SELECT*FROM user where username= '$username' and password= '$password'");

            if(mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['user'] = $data;
                echo '<script>
                alert ("Selamat Datang, '.$data['username'].'");
                    location.href="index.php";
                    </script>';
            }else{
                echo '<script>alert("Username/password tidak sesuai.");</script>';
            }
        }
    ?>
    <form method="POST" action="">
    <div class="input-group">
        <input type="text" id="username" name="username" placeholder="Username" required>
    </div>

    <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="login-button">
        <button type="submit">Login Now</button>
    </div>
</form>
</body>
</html>