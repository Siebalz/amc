<?php
session_start();

//mengecek apakah ada session user yg aktif jika tidak diarahkan ke login.php
if(!isset($_SESSION['user'])){
    header('location:login.php'); //arahkan ke login.php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar membuat halaman login</title>

</head>
<body style="text-align : center">
    <h1>HALAMAN ADMINISTRATOR</h1>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <hr>
    <h3>Selamat datang, nama user</h3>
    Halaman ini akan tampil setelah user login
</body>
</html>
