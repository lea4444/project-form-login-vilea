<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
