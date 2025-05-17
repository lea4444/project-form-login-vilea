<?php
session_start();

$host = "localhost";
$db = "login_db";
$user = "root";
$pass = "1234"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = hash('sha256', $password);

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;  
    header("Location: dashboard.php");
    exit();
} else {
    echo "Login gagal. Username atau password salah.";
}

$stmt->close();
$conn->close();
?>
