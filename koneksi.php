<?php
$host = "localhost";
$user = "root";
$password = "Balztea123-";
$db = "account_db";

$koneksi = mysqli_connect ($host, $user, $password, $db);

if (!$koneksi){
    die ("Database tidak terkoneksi : ". mysqli_connect_error());
}
?>