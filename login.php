<?php 
session_start(); // Wajib ditambahkan untuk menggunakan session

$servername = "192.168.5.231";
$username = "root";
$password = "asddsawswsas123";
$dbname = "user_db";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pastikan input tidak kosong
if (empty($_POST['username']) || empty($_POST['password'])) {
    die("Username or password is missing!");
}

// Ambil data dari AJAX (hindari SQL Injection dengan prepared statement)
$username = trim($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0){
    $row = $result->fetch_assoc();

    // Debug: Cek password hash dari database
    // echo "Password Hash: " . $row['password'];

    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username; // Simpan session
        echo "Login successful";
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

$stmt->close();
$conn->close();
?>
