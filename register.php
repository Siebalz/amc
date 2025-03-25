<?php
$servername = "localhost";
$username = "root";
$password = "asddsawswsas123";
$dbname = "user_db";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pastikan data POST tersedia
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Cek apakah user sudah ada
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User already exists";
    } else {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        
        if ($stmt->execute()) {
            echo "Register successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
} else {
    echo "Please fill all fields!";
}

// Tutup koneksi database
$conn->close();
?>
